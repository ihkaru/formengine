<?php

namespace App\Services;

use App\Models\Resident;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class DesaDataService
{
    // URL langsung ke file CSV dari Google Drive
    protected string $csvUrl = 'https://drive.google.com/uc?id=1es8Qug17LdauG5szFuTr7JU8sQM2yfVH&export=download'; // Ganti dengan URL CSV Anda

    /**
     * Peta untuk mengubah header CSV menjadi nama kolom database.
     */
    private function getColumnMapping(): array
    {
        return [
            'wid' => 'wid',
            'Nomor SLS' => 'nomor_sls',
            'NAMA RT' => 'nama_rt',
            'Koordinat' => 'koordinat',
            'Nama Desa' => 'nama_desa',
            'Kecamatan' => 'kecamatan_id',
            'Nama Kecamatan' => 'nama_kecamatan',
            'Desa' => 'desa_id',
            'Art_Tani' => 'art_tani',
            'Desk' => 'deskripsi',
            'Nama Kepala Keluarga' => 'nama_kepala_keluarga',
            'Jumlah Kartu Keluarga' => 'jumlah_kartu_keluarga',
            'Jumlah Orang Laki-Laki di Rumah' => 'jumlah_laki_laki',
            'Jumlah Orang Perempuan di Rumah' => 'jumlah_perempuan',
            'Jumlah orang yang tidak ada (meninggal) tapi masih tercatat di Kartu Keluarga' => 'jumlah_meninggal',
            'Nama orang yang tidak ada (meninggal) tapi masih tercatat di Kartu Keluarga' => 'nama_meninggal',
            'Banyak Anggota Keluarga Putus Sekolah (8-17 tahun)' => 'banyak_putus_sekolah',
            'Nama Anggota Keluarga Putus Sekolah (8-17 tahun)' => 'nama_putus_sekolah',
            'Banyak orang dengan Disabilitas' => 'banyak_disabilitas',
            'Nama Anggota Disabilitas' => 'nama_disabilitas',
            'Foto' => 'foto_url',
            'Gambar_Rumah' => 'gambar_rumah_url',
            'Pekerjaan Utama ' => 'pekerjaan_utama', // Perhatikan spasi di akhir
            'Apa bahan utama dinding rumah? ' => 'bahan_dinding', // Perhatikan spasi di akhir
            'Apa bahan utama lantai terluas rumah?' => 'bahan_lantai',
            'Apa bahan atap terluas rumah?' => 'bahan_atap',
            'Apakah rumah ini memiliki fasilitas buang air besar sendiri?' => 'fasilitas_bab',
            'Bagaimana cara keluarga membuang sampah rumah tangga?' => 'cara_buang_sampah',
            'Petugas' => 'petugas',
        ];
    }

    /**
     * Jalankan proses sinkronisasi data dari Google Sheet.
     */
    public function syncFromGoogleSheet(): void
    {
        try {
            $response = Http::timeout(60)->get($this->csvUrl);

            if (!$response->successful()) {
                Log::error('Gagal mengambil data dari Google Sheet. Status: ' . $response->status());
                return;
            }

            $csvData = $response->body();
            $rows = explode(PHP_EOL, trim($csvData)); // pecah menjadi baris
            $headers = str_getcsv(array_shift($rows)); // ambil header

            $columnMap = $this->getColumnMapping();
            $records = [];

            foreach ($rows as $row) {
                if (empty(trim($row))) continue; // Lewati baris kosong

                $data = str_getcsv($row);
                // Pastikan jumlah kolom data sama dengan header untuk menghindari error
                if (count($headers) !== count($data)) {
                    Log::warning('Jumlah kolom tidak cocok pada baris:', ['row_data' => $data]);
                    continue;
                }
                $records[] = array_combine($headers, $data);
            }

            foreach ($records as $record) {
                $this->updateOrCreateResident($record, $columnMap);
            }

            Log::info('Sinkronisasi data desa berhasil diselesaikan.');
        } catch (\Exception $e) {
            Log::error('Terjadi error saat sinkronisasi: ' . $e->getMessage());
        }
    }

    /**
     * Membuat atau memperbarui data penduduk.
     */
    private function updateOrCreateResident(array $record, array $columnMap): void
    {
        $mappedData = [];
        foreach ($columnMap as $csvHeader => $dbColumn) {
            // Trim header dari record untuk mencocokkan jika ada spasi ekstra
            $trimmedCsvHeader = trim($csvHeader);
            if (isset($record[$trimmedCsvHeader])) {
                $value = $record[$trimmedCsvHeader];
                // Ganti nilai kosong dengan null agar konsisten di database
                $mappedData[$dbColumn] = ($value === '' || $value === null) ? null : $value;
            }
        }

        // Hapus spasi dari beberapa kolom yang mungkin memiliki spasi di akhir pada CSV
        $mappedData['pekerjaan_utama'] = trim($record['Pekerjaan Utama ']);
        $mappedData['bahan_dinding'] = trim($record['Apa bahan utama dinding rumah? ']);

        // Pastikan 'wid' ada sebelum melanjutkan
        if (empty($mappedData['wid'])) {
            Log::warning('Data dilewati karena tidak memiliki WID.', ['record' => $record]);
            return;
        }

        Resident::updateOrCreate(
            ['wid' => $mappedData['wid']], // Kunci untuk mencari data
            $mappedData // Data untuk diupdate atau dibuat
        );
    }
}
