<?php

namespace App\Services;

use App\Models\Assignment;
use App\Models\Kegiatan;
use App\Models\Template;
use App\Supports\Constants;
use Illuminate\Support\Facades\Log;
use Revolution\Google\Sheets\Facades\Sheets;

class GoogleSheetExportService
{
    /**
     * Mengekspor semua data assignment dari sebuah kegiatan ke Google Sheet yang ditentukan.
     *
     * @param Kegiatan $kegiatan
     * @return array
     * @throws \Exception
     */
    public function export(Kegiatan $kegiatan): array
    {
        // 1. Validasi prasyarat
        if (empty($kegiatan->google_sheet_id)) {
            throw new \Exception("Kegiatan '{$kegiatan->nama}' tidak memiliki Google Sheet ID yang terkonfigurasi.");
        }

        $template = $kegiatan->templates()
            ->where('label_versi', Constants::VERSI_TEMPLATE_LATEST)
            ->first();

        if (!$template) {
            throw new \Exception("Template terbaru untuk kegiatan '{$kegiatan->nama}' tidak ditemukan.");
        }

        // 2. Generate Headers (Static + Dinamis dari Template)
        $headersInfo = $this->generateHeaders($template);
        $headerLabels = $headersInfo['labels'];
        $headerKeys = $headersInfo['keys'];

        // 3. Ambil dan siapkan data
        $assignments = Assignment::where('kegiatan_id', $kegiatan->id)
            ->with('respondens', 'petugasLevel1') // Eager load relasi
            ->get();

        $rows = [];
        foreach ($assignments as $assignment) {
            $rows[] = $this->prepareRow($assignment, $headerKeys);
        }

        // 4. Kirim data ke Google Sheets
        try {
            $sheet = Sheets::spreadsheet($kegiatan->google_sheet_id);
            $worksheetName = $kegiatan->nama; // Menggunakan nama kegiatan sebagai nama worksheet

            // Bersihkan sheet sebelum menulis data baru
            $sheet->clear($worksheetName);

            // Tulis header
            $sheet->sheet($worksheetName)->append([$headerLabels]);

            // Tulis baris data jika ada
            if (!empty($rows)) {
                $sheet->sheet($worksheetName)->append($rows);
            }

            $message = "Ekspor berhasil. {$assignments->count()} baris data dikirim ke sheet '{$worksheetName}'.";
            Log::info($message);
            return ['success' => true, 'message' => $message, 'rows_exported' => $assignments->count()];
        } catch (\Exception $e) {
            Log::error("Gagal mengirim data ke Google Sheets: " . $e->getMessage());
            throw $e; // Re-throw agar bisa ditangkap oleh pemanggil (controller/command)
        }
    }

    /**
     * Membuat header kolom berdasarkan template.
     *
     * @param Template $template
     * @return array ['labels' => [], 'keys' => []]
     */
    private function generateHeaders(Template $template): array
    {
        // Header statis yang selalu ada
        $staticHeaders = [
            'assignment_id' => 'Assignment ID',
            'pencacah_id' => 'Pencacah ID',
            'pencacah_nama' => 'Nama Pencacah',
            'responden_id' => 'Responden ID',
            'last_status' => 'Status Terakhir',
            'terakhir_diisi' => 'Waktu Terakhir Diisi',
            'assignment_created_at' => 'Waktu Assignment Dibuat',
        ];

        $labels = array_values($staticHeaders);
        $keys = array_keys($staticHeaders);

        // Header dinamis dari JSON template
        $templateStructure = json_decode($template->template, true);
        if (json_last_error() === JSON_ERROR_NONE && isset($templateStructure['sections'])) {
            foreach ($templateStructure['sections'] as $section) {
                if (isset($section['questions'])) {
                    foreach ($section['questions'] as $question) {
                        $labels[] = $question['label'] ?? $question['id']; // Fallback ke ID jika label tidak ada
                        $keys[] = $question['id'];
                    }
                }
            }
        }

        return ['labels' => $labels, 'keys' => $keys];
    }

    /**
     * Menyiapkan satu baris data untuk dikirim ke sheet.
     *
     * @param Assignment $assignment
     * @param array $headerKeys
     * @return array
     */
    private function prepareRow(Assignment $assignment, array $headerKeys): array
    {
        $responden = $assignment->respondens;
        $row = [];

        // Periksa data dari responden, atasi masalah double-encoding jika ada.
        $respondenData = $responden->data ?? '[]';
        if (is_string($respondenData)) {
            // Coba decode. Jika gagal, gunakan array kosong.
            $answers = json_decode($respondenData, true) ?? [];
        } else {
            $answers = $respondenData; // Sudah dalam bentuk array
        }

        // Atasi jika 'data' adalah string JSON yang di-escape seperti di contoh Anda
        if (is_string($answers)) {
            $answers = json_decode($answers, true) ?? [];
        }


        foreach ($headerKeys as $key) {
            $value = '';
            switch ($key) {
                case 'assignment_id':
                    $value = $assignment->id;
                    break;
                case 'pencacah_id':
                    $value = $assignment->pencacah_id;
                    break;
                case 'pencacah_nama':
                    $value = $assignment->petugasLevel1->name ?? 'N/A'; // asumsikan ada kolom 'name' di model User
                    break;
                case 'responden_id':
                    $value = $responden->id ?? 'N/A';
                    break;
                case 'last_status':
                    $value = $responden->last_riwayat_status ?? 'N/A';
                    break;
                case 'terakhir_diisi':
                    $value = $responden->terakhir_diisi ? $responden->terakhir_diisi->format('Y-m-d H:i:s') : 'N/A';
                    break;
                case 'assignment_created_at':
                    $value = $assignment->created_at->format('Y-m-d H:i:s');
                    break;
                default:
                    // Ambil nilai dari JSON 'data'
                    $answerValue = $answers[$key] ?? null;

                    // Jika nilai adalah array (dari repeater/checkbox) atau object (geolocation),
                    // ubah menjadi string JSON agar muat dalam satu sel.
                    if (is_array($answerValue) || is_object($answerValue)) {
                        $value = json_encode($answerValue, JSON_UNESCAPED_UNICODE);
                    } else {
                        $value = $answerValue;
                    }
                    break;
            }
            $row[] = (string) $value; // Pastikan semua data adalah string
        }

        return $row;
    }

    /**
     * Menyinkronkan satu baris assignment (membuat atau memperbarui) ke Google Sheet.
     *
     * @param Assignment $assignment
     * @return array
     * @throws \Exception
     */
    public function syncRow(Assignment $assignment): array
    {
        $assignment->load(['kegiatan', 'respondens', 'petugasLevel1']);
        $kegiatan = $assignment->kegiatan;

        if (empty($kegiatan->google_sheet_id)) {
            // Jika kegiatan tidak punya sheet ID, lewati saja tanpa error.
            Log::info("Skipping Google Sheet sync for assignment {$assignment->id}: Kegiatan {$kegiatan->id} has no configured sheet ID.");
            return ['success' => true, 'message' => 'Skipped: No sheet ID configured.'];
        }

        $template = $kegiatan->templates()
            ->where('label_versi', Constants::VERSI_TEMPLATE_LATEST)
            ->first();

        if (!$template) {
            throw new \Exception("Template terbaru untuk kegiatan '{$kegiatan->nama}' tidak ditemukan.");
        }

        $headersInfo = $this->generateHeaders($template);
        $worksheetName = $kegiatan->nama;

        // Pastikan header di sheet sudah benar, jika belum maka buat.
        $this->ensureHeadersAreCorrect($kegiatan, $worksheetName, $headersInfo['labels']);

        // Siapkan data baris yang akan dikirim
        $rowData = $this->prepareRow($assignment, $headersInfo['keys']);

        // Cari baris yang ada berdasarkan assignment_id
        $rowIndex = $this->findRowByAssignmentId($kegiatan->google_sheet_id, $worksheetName, $assignment->id);

        $sheet = Sheets::spreadsheet($kegiatan->google_sheet_id)->sheet($worksheetName);

        if ($rowIndex) {
            // --- UPDATE ---
            // Baris ditemukan, perbarui datanya. Range-nya adalah A{rowIndex}:Z{rowIndex} (asumsi kolom tidak lebih dari Z)
            $range = "A{$rowIndex}";
            $sheet->update($range, [$rowData]);
            $message = "Baris untuk assignment {$assignment->id} berhasil diperbarui di Google Sheet pada baris {$rowIndex}.";
        } else {
            // --- INSERT (APPEND) ---
            // Baris tidak ditemukan, tambahkan baris baru di akhir.
            $sheet->append([$rowData]);
            $message = "Baris baru untuk assignment {$assignment->id} berhasil ditambahkan ke Google Sheet.";
        }

        Log::info($message);
        return ['success' => true, 'message' => $message];
    }

    /**
     * Mencari nomor baris di sheet berdasarkan assignment ID di kolom pertama (A).
     *
     * @param string $spreadsheetId
     * @param string $worksheetName
     * @param string $assignmentId
     * @return int|null
     */
    private function findRowByAssignmentId(string $spreadsheetId, string $worksheetName, string $assignmentId): ?int
    {
        try {
            // Ambil semua nilai dari kolom A (kolom Assignment ID)
            $columnA = Sheets::spreadsheet($spreadsheetId)->sheet($worksheetName)->get('A:A');
            $ids = collect($columnA)->flatten()->all();

            // Cari index dari assignmentId. Ingat, array 0-based, sheet 1-based.
            $key = array_search($assignmentId, $ids);

            return ($key !== false) ? $key + 1 : null;
        } catch (\Exception $e) {
            // Mungkin sheet/worksheet belum ada, anggap saja tidak ditemukan.
            Log::warning("Could not search for row in Google Sheet: " . $e->getMessage());
            return null;
        }
    }

    /**
     * Memastikan header di worksheet sudah benar. Jika kosong, akan diisi.
     *
     * @param Kegiatan $kegiatan
     * @param string $worksheetName
     * @param array $headerLabels
     * @return void
     */
    private function ensureHeadersAreCorrect(Kegiatan $kegiatan, string $worksheetName, array $headerLabels): void
    {
        try {
            $sheet = Sheets::spreadsheet($kegiatan->google_sheet_id);
            // Cek apakah worksheet ada, jika tidak, buat
            $worksheetList = collect($sheet->sheetList())->flatten()->all();
            if (!in_array($worksheetName, $worksheetList)) {
                $sheet->addSheet($worksheetName);
            }

            // Cek baris pertama
            $firstRow = $sheet->sheet($worksheetName)->get('A1:Z1'); // Ambil range yg cukup lebar
            if (empty($firstRow)) {
                $sheet->sheet($worksheetName)->update('A1', [$headerLabels]);
                Log::info("Header baru dibuat untuk worksheet '{$worksheetName}' di sheet ID {$kegiatan->google_sheet_id}.");
            }
        } catch (\Exception $e) {
            Log::error("Gagal memastikan header di Google Sheet: " . $e->getMessage());
            throw $e; // Throw lagi agar proses utama tahu ada masalah
        }
    }
}
