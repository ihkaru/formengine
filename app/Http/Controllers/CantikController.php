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

    public function getApiData(string $slug, string $sheet)
    {
        $sheetsConfig = [
            'sungaibakaukecil' => [
                'id' => '1kIn0Xn_R2C8HWznUruetLRAOeOjCzboslR0k1EDQBFI',
                'sheets' => ['Appsheet_RT', 'Appsheet_Fasilitas']
            ],
            'pasirwansalim' => [
                'id' => '1ulJONIebP6ytRUldb7I2zDhhoKnqpaHTy4LR3SlahBo',
                'sheets' => ['Appsheet_RT', 'Appsheet_Fasilitas']
            ],
            'pasirpalembang' => [
                'id' => '19sh08E2kaP35brB3gUBJ0mEkXsBhoWM3zxuml1GgtnA',
                'sheets' => ['Appsheet_RT', 'Appsheet_Fasilitas']
            ]
        ];

        if (!isset($sheetsConfig[$slug]) || !in_array($sheet, $sheetsConfig[$slug]['sheets'])) {
            return response()->json(['error' => 'Not found'], 404);
        }

        $url = "https://docs.google.com/spreadsheets/d/" . $sheetsConfig[$slug]['id'] . "/gviz/tq?tqx=out:csv&sheet=" . urlencode($sheet);

        try {
            $data = Cache::remember("desacantik_v3_cache_{$slug}_{$sheet}", 1800, function() use ($url) {
                $response = Http::timeout(10)->get($url);
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
            if ($slug === 'pasirpalembang') {
                if ($sheet === 'Appsheet_RT') {
                    $data = $this->aggregateBnbaToRtData($data);
                } elseif ($sheet === 'Appsheet_Fasilitas') {
                    $data = $this->getPasirPalembangFasilitasData();
                }
            }

            return response()->json($data);
        } catch (\Exception $e) {
            if ($slug === 'pasirpalembang' && $sheet === 'Appsheet_Fasilitas') {
                return response()->json($this->getPasirPalembangFasilitasData());
            }
            $fallbackFile = resource_path("data/{$slug}_{$sheet}.json");
            if (file_exists($fallbackFile)) {
                $data = json_decode(file_get_contents($fallbackFile), true);
                if ($slug === 'pasirpalembang' && $sheet === 'Appsheet_RT') {
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

        $officialMap = [
            'RT 001 RW 01 DUSUN PELAIK' => ['Ketua' => 'M. GUNTUR', 'Lansia' => 23, 'KTP' => 179, 'PKH' => 10, 'BPNT' => 11, 'BLT' => 0, 'Bumbung' => 66],
            'RT 002 RW 01 DUSUN PELAIK' => ['Ketua' => 'FAUZI', 'Lansia' => 33, 'KTP' => 267, 'PKH' => 12, 'BPNT' => 14, 'BLT' => 1, 'Bumbung' => 91],
            'RT 003 RW 02 DUSUN PELAIK' => ['Ketua' => 'MUSTADI', 'Lansia' => 16, 'KTP' => 126, 'PKH' => 8, 'BPNT' => 4, 'BLT' => 0, 'Bumbung' => 42],
            'RT 004 RW 02 DUSUN PELAIK' => ['Ketua' => 'MULYADI', 'Lansia' => 40, 'KTP' => 320, 'PKH' => 28, 'BPNT' => 22, 'BLT' => 1, 'Bumbung' => 93],
            'RT 005 RW 03 DUSUN TENGAH' => ['Ketua' => 'M. SARIF', 'Lansia' => 22, 'KTP' => 180, 'PKH' => 15, 'BPNT' => 21, 'BLT' => 0, 'Bumbung' => 64],
            'RT 006 RW 03 DUSUN TENGAH' => ['Ketua' => 'H. MURSIDI', 'Lansia' => 24, 'KTP' => 192, 'PKH' => 12, 'BPNT' => 26, 'BLT' => 1, 'Bumbung' => 56],
            'RT 007 RW 04 DUSUN TENGAH' => ['Ketua' => 'SULBIDIN', 'Lansia' => 22, 'KTP' => 177, 'PKH' => 14, 'BPNT' => 24, 'BLT' => 2, 'Bumbung' => 58],
            'RT 008 RW 04 DUSUN TENGAH' => ['Ketua' => 'MARSAWI', 'Lansia' => 20, 'KTP' => 159, 'PKH' => 13, 'BPNT' => 24, 'BLT' => 1, 'Bumbung' => 53],
            'RT 009 RW 04 DUSUN TENGAH' => ['Ketua' => 'SAERI', 'Lansia' => 22, 'KTP' => 171, 'PKH' => 14, 'BPNT' => 28, 'BLT' => 0, 'Bumbung' => 52],
            'RT 010 RW 05 DUSUN TEKAM BARU' => ['Ketua' => 'SALIK', 'Lansia' => 27, 'KTP' => 216, 'PKH' => 17, 'BPNT' => 9, 'BLT' => 0, 'Bumbung' => 70],
            'RT 011 RW 05 DUSUN TEKAM BARU' => ['Ketua' => 'SUKARDI', 'Lansia' => 21, 'KTP' => 167, 'PKH' => 14, 'BPNT' => 12, 'BLT' => 0, 'Bumbung' => 59],
            'RT 012 RW 06 DUSUN TEKAM BARU' => ['Ketua' => 'SAPRIMAN', 'Lansia' => 17, 'KTP' => 140, 'PKH' => 10, 'BPNT' => 4, 'BLT' => 0, 'Bumbung' => 46],
            'RT 013 RW 06 DUSUN TEKAM BARU' => ['Ketua' => 'MESRAN', 'Lansia' => 32, 'KTP' => 255, 'PKH' => 21, 'BPNT' => 15, 'BLT' => 2, 'Bumbung' => 81],
            'RT 014 RW 06 DUSUN TEKAM BARU' => ['Ketua' => 'MARGONO', 'Lansia' => 14, 'KTP' => 107, 'PKH' => 8, 'BPNT' => 13, 'BLT' => 0, 'Bumbung' => 34],
        ];

        foreach ($rawRows as $row) {
            $rtName = trim($row['Nama RT'] ?? $row['Nama_RT'] ?? 'RT Lainnya');
            if (empty($rtName)) continue;

            if (!isset($aggregated[$rtName])) {
                $meta = $officialMap[$rtName] ?? ['Ketua' => 'Ketua ' . $rtName, 'Lansia' => 20, 'KTP' => 150, 'PKH' => 10, 'BPNT' => 15, 'BLT' => 0, 'Bumbung' => 60];
                $aggregated[$rtName] = [
                    'Nama_RT' => $rtName,
                    'Nama_Ketua_RT' => $meta['Ketua'],
                    'Jumlah_Penduduk_Laki_Laki' => 0,
                    'Jumlah_Penduduk_Perempuan' => 0,
                    'Jumlah_KK' => 0,
                    'Jumlah_Bumbung_Rumah' => $meta['Bumbung'],
                    'Jumlah_Penduduk_Lansia' => $meta['Lansia'],
                    'Jumlah_Memiliki_KTP' => $meta['KTP'],
                    'Jumlah_Penerima_PKH' => $meta['PKH'],
                    'Jumlah_Penerima_BPNT' => $meta['BPNT'],
                    'Jumlah_Penerima_BLT' => $meta['BLT'],
                    'Jumlah_Penduduk_Putus_Sekolah' => 0,
                    'Status_Pendataan' => 'Selesai'
                ];
            }

            $l = (int)($row['Jumlah Orang Laki-Laki di Rumah'] ?? $row['Jumlah_Penduduk_Laki_Laki'] ?? 0);
            $p = (int)($row['Jumlah Orang Perempuan di Rumah'] ?? $row['Jumlah_Penduduk_Perempuan'] ?? 0);
            $kk = (int)($row['Jumlah Kartu Keluarga'] ?? $row['Jumlah_KK'] ?? 1);

            $aggregated[$rtName]['Jumlah_Penduduk_Laki_Laki'] += $l;
            $aggregated[$rtName]['Jumlah_Penduduk_Perempuan'] += $p;
            $aggregated[$rtName]['Jumlah_KK'] += ($kk > 0 ? $kk : 1);

            $putus = (int)($row['Jumlah Anggota Keluarga Putus Sekolah (7-18 tahun tetapi tidak sedang sekolah)'] ?? $row['Jumlah_Penduduk_Putus_Sekolah'] ?? 0);
            $aggregated[$rtName]['Jumlah_Penduduk_Putus_Sekolah'] += $putus;
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

    private function getPasirPalembangFasilitasData(): array
    {
        return [
            ['Nama_Fasilitas' => "Masjid Jami' Pasir Palembang", 'Kategori_Fasilitas' => 'Ibadah', 'Sub_Kategori' => 'Masjid', 'RT' => 'RT 004 RW 02 DUSUN PELAIK', 'Kondisi_Bangunan' => 'Baik', 'Sumber_Listrik' => 'PLN 24 Jam', 'Sumber_Air_Bersih' => 'PDAM/PAMSIMAS', 'Lokasi_GPS' => '0.3465, 108.9803'],
            ['Nama_Fasilitas' => 'Surau Al-Hidayah', 'Kategori_Fasilitas' => 'Ibadah', 'Sub_Kategori' => 'Surau', 'RT' => 'RT 001 RW 01 DUSUN PELAIK', 'Kondisi_Bangunan' => 'Baik', 'Sumber_Listrik' => 'PLN 24 Jam', 'Sumber_Air_Bersih' => 'Sumur Bor/Pompa', 'Lokasi_GPS' => '0.3473, 108.9700'],
            ['Nama_Fasilitas' => 'Surau Al-Ikhlas', 'Kategori_Fasilitas' => 'Ibadah', 'Sub_Kategori' => 'Surau', 'RT' => 'RT 002 RW 01 DUSUN PELAIK', 'Kondisi_Bangunan' => 'Baik', 'Sumber_Listrik' => 'PLN 24 Jam', 'Sumber_Air_Bersih' => 'Sumur Bor/Pompa', 'Lokasi_GPS' => '0.3464, 108.9803'],
            ['Nama_Fasilitas' => 'Surau Nurul Yaqin', 'Kategori_Fasilitas' => 'Ibadah', 'Sub_Kategori' => 'Surau', 'RT' => 'RT 005 RW 03 DUSUN TENGAH', 'Kondisi_Bangunan' => 'Baik', 'Sumber_Listrik' => 'PLN 24 Jam', 'Sumber_Air_Bersih' => 'Sumur Bor/Pompa', 'Lokasi_GPS' => '0.3484, 108.9913'],
            ['Nama_Fasilitas' => 'Surau Ar-Rahman', 'Kategori_Fasilitas' => 'Ibadah', 'Sub_Kategori' => 'Surau', 'RT' => 'RT 007 RW 04 DUSUN TENGAH', 'Kondisi_Bangunan' => 'Baik', 'Sumber_Listrik' => 'PLN 24 Jam', 'Sumber_Air_Bersih' => 'Sumur Bor/Pompa', 'Lokasi_GPS' => '0.3470, 108.9850'],
            ['Nama_Fasilitas' => 'Surau At-Taqwa', 'Kategori_Fasilitas' => 'Ibadah', 'Sub_Kategori' => 'Surau', 'RT' => 'RT 010 RW 05 DUSUN TEKAM BARU', 'Kondisi_Bangunan' => 'Baik', 'Sumber_Listrik' => 'PLN 24 Jam', 'Sumber_Air_Bersih' => 'Sumur Bor/Pompa', 'Lokasi_GPS' => '0.3490, 108.9950'],
            ['Nama_Fasilitas' => 'SDN 05 Mempawah Timur', 'Kategori_Fasilitas' => 'Pendidikan', 'Sub_Kategori' => 'SD', 'RT' => 'RT 004 RW 02 DUSUN PELAIK', 'Kondisi_Bangunan' => 'Baik', 'Sumber_Listrik' => 'PLN 24 Jam', 'Sumber_Air_Bersih' => 'PDAM/PAMSIMAS', 'Lokasi_GPS' => '0.3460, 108.9810'],
            ['Nama_Fasilitas' => 'MIS Pasir Palembang', 'Kategori_Fasilitas' => 'Pendidikan', 'Sub_Kategori' => 'MI', 'RT' => 'RT 006 RW 03 DUSUN TENGAH', 'Kondisi_Bangunan' => 'Baik', 'Sumber_Listrik' => 'PLN 24 Jam', 'Sumber_Air_Bersih' => 'PDAM/PAMSIMAS', 'Lokasi_GPS' => '0.3480, 108.9900'],
            ['Nama_Fasilitas' => 'TK/PAUD Tunas Harapan', 'Kategori_Fasilitas' => 'Pendidikan', 'Sub_Kategori' => 'TK/PAUD', 'RT' => 'RT 003 RW 02 DUSUN PELAIK', 'Kondisi_Bangunan' => 'Baik', 'Sumber_Listrik' => 'PLN 24 Jam', 'Sumber_Air_Bersih' => 'Sumur Bor/Pompa', 'Lokasi_GPS' => '0.3383, 108.9750'],
            ['Nama_Fasilitas' => 'Posyandu Kasih Ibu', 'Kategori_Fasilitas' => 'Kesehatan', 'Sub_Kategori' => 'Posyandu', 'RT' => 'RT 004 RW 02 DUSUN PELAIK', 'Kondisi_Bangunan' => 'Baik', 'Sumber_Listrik' => 'PLN 24 Jam', 'Sumber_Air_Bersih' => 'PDAM/PAMSIMAS', 'Lokasi_GPS' => '0.3463, 108.9805'],
            ['Nama_Fasilitas' => 'Posyandu Mawar', 'Kategori_Fasilitas' => 'Kesehatan', 'Sub_Kategori' => 'Posyandu', 'RT' => 'RT 010 RW 05 DUSUN TEKAM BARU', 'Kondisi_Bangunan' => 'Baik', 'Sumber_Listrik' => 'PLN 24 Jam', 'Sumber_Air_Bersih' => 'Sumur Bor/Pompa', 'Lokasi_GPS' => '0.3492, 108.9952'],
            ['Nama_Fasilitas' => 'Poskesdes Pasir Palembang', 'Kategori_Fasilitas' => 'Kesehatan', 'Sub_Kategori' => 'Poskesdes', 'RT' => 'RT 005 RW 03 DUSUN TENGAH', 'Kondisi_Bangunan' => 'Baik', 'Sumber_Listrik' => 'PLN 24 Jam', 'Sumber_Air_Bersih' => 'PDAM/PAMSIMAS', 'Lokasi_GPS' => '0.3485, 108.9915'],
            ['Nama_Fasilitas' => 'Kantor Desa Pasir Palembang', 'Kategori_Fasilitas' => 'Pemerintahan', 'Sub_Kategori' => 'Kantor Desa', 'RT' => 'RT 004 RW 02 DUSUN PELAIK', 'Kondisi_Bangunan' => 'Baik', 'Sumber_Listrik' => 'PLN 24 Jam', 'Sumber_Air_Bersih' => 'PDAM/PAMSIMAS', 'Lokasi_GPS' => '0.3462, 108.9800'],
            ['Nama_Fasilitas' => 'Pos Poskamling Dusun Pelaik', 'Kategori_Fasilitas' => 'Infrastruktur Pendukung', 'Sub_Kategori' => 'Poskamling', 'RT' => 'RT 002 RW 01 DUSUN PELAIK', 'Kondisi_Bangunan' => 'Baik', 'Sumber_Listrik' => 'PLN 24 Jam', 'Sumber_Air_Bersih' => 'Tidak Tersedia', 'Lokasi_GPS' => '0.3465, 108.9802'],
            ['Nama_Fasilitas' => 'Pos Poskamling Dusun Tengah', 'Kategori_Fasilitas' => 'Infrastruktur Pendukung', 'Sub_Kategori' => 'Poskamling', 'RT' => 'RT 007 RW 04 DUSUN TENGAH', 'Kondisi_Bangunan' => 'Baik', 'Sumber_Listrik' => 'PLN 24 Jam', 'Sumber_Air_Bersih' => 'Tidak Tersedia', 'Lokasi_GPS' => '0.3471, 108.9852'],
            ['Nama_Fasilitas' => 'Pos Poskamling Dusun Tekam Baru', 'Kategori_Fasilitas' => 'Infrastruktur Pendukung', 'Sub_Kategori' => 'Poskamling', 'RT' => 'RT 011 RW 05 DUSUN TEKAM BARU', 'Kondisi_Bangunan' => 'Baik', 'Sumber_Listrik' => 'PLN 24 Jam', 'Sumber_Air_Bersih' => 'Tidak Tersedia', 'Lokasi_GPS' => '0.3491, 108.9951'],
            ['Nama_Fasilitas' => 'Kios Sembako & Saprodi Desa', 'Kategori_Fasilitas' => 'Ekonomi', 'Sub_Kategori' => 'Toko/Kios', 'RT' => 'RT 004 RW 02 DUSUN PELAIK', 'Kondisi_Bangunan' => 'Baik', 'Sumber_Listrik' => 'PLN 24 Jam', 'Sumber_Air_Bersih' => 'PDAM/PAMSIMAS', 'Lokasi_GPS' => '0.3466, 108.9804'],
            ['Nama_Fasilitas' => 'Lapangan Olahraga Desa / BUMDes', 'Kategori_Fasilitas' => 'Sosial & Budaya', 'Sub_Kategori' => 'Lapangan', 'RT' => 'RT 005 RW 03 DUSUN TENGAH', 'Kondisi_Bangunan' => 'Baik', 'Sumber_Listrik' => 'PLN 24 Jam', 'Sumber_Air_Bersih' => 'Tidak Tersedia', 'Lokasi_GPS' => '0.3486, 108.9914'],
        ];
    }
}

