<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;

class CantikController extends Controller
{
    public function index()
    {
        return view("cantik.index");
    }
    public function kelPulauPedalaman()
    {
        return view("cantik.pedalaman");
    }
    public function desWajokHilir()
    {
        return view("cantik.wajokhilir");
    }
    public function desSejegi()
    {
        return view("cantik.sejegi");
    }
    public function pasirWanSalim()
    {
        return view("cantik.pasirwansalim");
    }
    public function pasirPalembang()
    {
        return view("cantik.pasirpalembang");
    }
    public function sungaiBakauKecil()
    {
        return view("cantik.sungaibakaukecil");
    }
    public function desaSambora()
    {
        return view("cantik.sambora");
    }

    public function getApiData(\Illuminate\Http\Request $request, string $slug, string $sheet)
    {
        $sheetsConfig = [
            'sungaibakaukecil' => [
                'id' => '1kIn0Xn_R2C8HWznUruetLRAOeOjCzboslR0k1EDQBFI',
                'sheets' => [
                    'Appsheet_RT' => 'sheet=' . urlencode('Appsheet_RT'),
                    'Appsheet_Fasilitas' => 'sheet=' . urlencode('Appsheet_Fasilitas')
                ]
            ],
            'pasirwansalim' => [
                'id' => '1ulJONIebP6ytRUldb7I2zDhhoKnqpaHTy4LR3SlahBo',
                'sheets' => [
                    'Appsheet_RT' => 'gid=0',
                    'Appsheet_Fasilitas' => 'sheet=' . urlencode('Fasilitas')
                ]
            ],
            'pasirpalembang' => [
                'id' => '19sh08E2kaP35brB3gUBJ0mEkXsBhoWM3zxuml1GgtnA',
                'sheets' => [
                    'Appsheet_RT' => 'sheet=' . urlencode('Appsheet_RT'),
                    'Appsheet_Fasilitas' => 'gid=285433477'
                ]
            ]
        ];

        if (!isset($sheetsConfig[$slug]) || !isset($sheetsConfig[$slug]['sheets'][$sheet])) {
            return response()->json(['error' => 'Not found'], 404);
        }

        $cacheKey = "desacantik_v3_cache_{$slug}_{$sheet}";
        if ($request->has('refresh') || $request->has('force') || $request->query('refresh') == '1') {
            Cache::forget($cacheKey);
        }

        $param = $sheetsConfig[$slug]['sheets'][$sheet];
        $url = "https://docs.google.com/spreadsheets/d/" . $sheetsConfig[$slug]['id'] . "/gviz/tq?tqx=out:csv&" . $param;

        $cacheTtl = (config('app.env') === 'local' || config('app.debug', true)) ? 5 : 1800;

        try {
            $data = Cache::remember($cacheKey, $cacheTtl, function() use ($url) {
                $response = Http::timeout(15)->get($url);
                if (!$response->successful()) {
                    throw new \Exception("Failed to fetch from Google Sheets");
                }
                $csvText = $response->body();
                $lines = preg_split('/\r\n|\r|\n/', trim($csvText));
                if (empty($lines)) {
                    throw new \Exception("Empty CSV from Google Sheets");
                }
                $header = str_getcsv(array_shift($lines));
                $header = array_map('trim', $header);
                $data = [];
                foreach ($lines as $line) {
                    if (trim($line) === '') continue;
                    $row = str_getcsv($line);
                    if (count($row) < count($header)) {
                        $row = array_pad($row, count($header), '');
                    } elseif (count($row) > count($header)) {
                        $row = array_slice($row, 0, count($header));
                    }
                    $data[] = array_combine($header, $row);
                }
                return $data;
            });

            if (($slug === 'pasirpalembang' || $slug === 'pasirwansalim') && $sheet === 'Appsheet_RT') {
                $data = $this->aggregateBnbaToRtData($data);
            }

            if ($sheet === 'Appsheet_Fasilitas') {
                if (!empty($data) && is_array($data)) {
                    $firstRowKeys = array_map('strtolower', array_keys($data[0]));
                    $hasFasKey = false;
                    foreach ($firstRowKeys as $k) {
                        $cleanK = str_replace(['_', ' '], '', $k);
                        if (str_contains($cleanK, 'namafasilitas') || str_contains($cleanK, 'idfasilitas') || str_contains($cleanK, 'namasarana')) {
                            $hasFasKey = true;
                            break;
                        }
                    }
                    if (!$hasFasKey) {
                        $data = [];
                    }
                }
            }

            return response()->json($data);
        } catch (\Exception $e) {
            $fallbackFile = resource_path("data/{$slug}_{$sheet}.json");
            if (file_exists($fallbackFile)) {
                $data = json_decode(file_get_contents($fallbackFile), true);
                if (($slug === 'pasirpalembang' || $slug === 'pasirwansalim') && $sheet === 'Appsheet_RT') {
                    $data = $this->aggregateBnbaToRtData($data);
                }
                return response()->json($data);
            }
            return response()->json(['error' => 'Data not available', 'message' => $e->getMessage()], 500);
        }
    }

    private function aggregateBnbaToRtData(array $rawRows): array
    {
        $aggregated = [];

        foreach ($rawRows as $row) {
            $rtName = trim($row['Nama RT'] ?? $row['Nama_RT'] ?? $row['Nomor_SLS'] ?? '');
            if (empty($rtName)) continue;

            if (!isset($aggregated[$rtName])) {
                $aggregated[$rtName] = [
                    'Nama_RT' => $rtName,
                    'Nama_Ketua_RT' => trim($row['Nama_Ketua_RT'] ?? $row['Ketua_RT'] ?? ('Ketua ' . $rtName)),
                    'Jumlah_Penduduk_Laki_Laki' => 0,
                    'Jumlah_Penduduk_Perempuan' => 0,
                    'Jumlah_KK' => 0,
                    'Jumlah_Bumbung_Rumah' => 0,
                    'Jumlah_Penduduk_Lansia' => 0,
                    'Jumlah_Memiliki_KTP' => 0,
                    'Jumlah_Penerima_PKH' => 0,
                    'Jumlah_Penerima_BPNT' => 0,
                    'Jumlah_Penerima_BLT' => 0,
                    'Jumlah_UMKM' => 0,
                    'Jumlah_BPJS' => 0,
                    'Jumlah_Penduduk_Putus_Sekolah' => 0,
                    'Status_Pendataan' => 'Selesai'
                ];
            }

            $aggregated[$rtName]['Jumlah_Bumbung_Rumah'] += 1;

            $l = (int)($row['Jumlah Orang Laki-Laki di Rumah'] ?? $row['Jumlah_Penduduk_Laki_Laki'] ?? $row['Jumlah_Orang_Laki_Dirumah'] ?? 0);
            $p = (int)($row['Jumlah Orang Perempuan di Rumah'] ?? $row['Jumlah_Penduduk_Perempuan'] ?? $row['Jumlah_Orang_Perempuan_Dirumah'] ?? 0);
            $kk = (int)($row['Jumlah Kartu Keluarga'] ?? $row['Jumlah_Kartu_Keluarga'] ?? $row['Jumlah_KK'] ?? 1);

            $aggregated[$rtName]['Jumlah_Penduduk_Laki_Laki'] += $l;
            $aggregated[$rtName]['Jumlah_Penduduk_Perempuan'] += $p;
            $aggregated[$rtName]['Jumlah_KK'] += ($kk > 0 ? $kk : 1);

            $lansia = (int)($row['Jumlah Penduduk Berusia 65-74'] ?? $row['Jumlah_Penduduk_Lansia'] ?? 0)
                    + (int)($row['Jumlah Penduduk Berusia 75+'] ?? 0);
            $aggregated[$rtName]['Jumlah_Penduduk_Lansia'] += $lansia;

            $putus = (int)($row['Jumlah Anggota Keluarga Putus Sekolah (7-18 tahun tetapi tidak sedang sekolah)'] ?? $row['Jumlah_Penduduk_Putus_Sekolah'] ?? 0);
            $aggregated[$rtName]['Jumlah_Penduduk_Putus_Sekolah'] += $putus;

            $pkh = (int)($row['Jika menerima bantuan, berapa jumlah keluarga penerima bantuan PKH'] ?? $row['Jml_Penerima_Terdaftar_PKH'] ?? 0);
            $bpnt = (int)($row['Jika menerima bantuan, berapa jumlah keluarga penerima bantuan BPNT'] ?? $row['Jml_Penerima_Terdaftar_Sembako_BPNT'] ?? $row['Jml_Penerima_Terdaftar_Sembako/BPNT'] ?? 0);
            $blts = (int)($row['Jika menerima bantuan, berapa jumlah keluarga penerima bantuan BLTS'] ?? 0);
            $bltdd = (int)($row['Jika menerima bantuan, berapa jumlah keluarga penerima bantuan BLTDD'] ?? 0);
            $bcp = (int)($row['Jika menerima bantuan, berapa jumlah keluarga penerima bantuan BCP'] ?? 0);

            $aggregated[$rtName]['Jumlah_Penerima_PKH'] += $pkh;
            $aggregated[$rtName]['Jumlah_Penerima_BPNT'] += $bpnt;
            $aggregated[$rtName]['Jumlah_Penerima_BLT'] += ($blts + $bltdd + $bcp);

            $umkm = (int)($row['Jumlah_UMKM_Dalam_Keluarga'] ?? $row['Jumlah_UMKM'] ?? 0);
            $aggregated[$rtName]['Jumlah_UMKM'] += $umkm;

            $bpjs = (int)($row['Jumlah_ART_Memiliki_BPJS'] ?? $row['Jumlah_BPJS'] ?? 0);
            $aggregated[$rtName]['Jumlah_BPJS'] += $bpjs;
        }

        $finalResult = [];
        foreach ($aggregated as $rtName => $item) {
            $finalResult[] = $item;
        }

        usort($finalResult, function($a, $b) {
            return strnatcmp($a['Nama_RT'], $b['Nama_RT']);
        });

        return $finalResult;
    }
}

