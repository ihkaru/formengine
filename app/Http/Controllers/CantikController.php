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
            ]
        ];

        if (!isset($sheetsConfig[$slug]) || !in_array($sheet, $sheetsConfig[$slug]['sheets'])) {
            return response()->json(['error' => 'Not found'], 404);
        }

        $url = "https://docs.google.com/spreadsheets/d/" . $sheetsConfig[$slug]['id'] . "/gviz/tq?tqx=out:csv&sheet=" . urlencode($sheet);

        try {
            $data = Cache::remember("desacantik_cache_{$slug}_{$sheet}", 1800, function() use ($url) {
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
            return response()->json($data);
        } catch (\Exception $e) {
            $fallbackFile = resource_path("data/{$slug}_{$sheet}.json");
            if (file_exists($fallbackFile)) {
                $data = json_decode(file_get_contents($fallbackFile), true);
                return response()->json($data);
            }
            return response()->json(['error' => 'Data not available', 'message' => $e->getMessage()], 500);
        }
    }
}

