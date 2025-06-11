<?php

namespace App\Console\Commands;

use App\Models\Kegiatan;
use App\Services\GoogleSheetExportService;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class ExportKegiatanToSheet extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'export:kegiatan-to-sheet {kegiatan_id}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Mengekspor data dari kegiatan tertentu ke Google Sheet yang terasosiasi';

    /**
     * Execute the console command.
     */
    public function handle(GoogleSheetExportService $exporter)
    {
        $kegiatanId = $this->argument('kegiatan_id');

        $this->info("Mencari kegiatan dengan ID: {$kegiatanId}...");

        $kegiatan = Kegiatan::find($kegiatanId);

        if (!$kegiatan) {
            $this->error("Kegiatan dengan ID '{$kegiatanId}' tidak ditemukan.");
            Log::error("Gagal ekspor: Kegiatan '{$kegiatanId}' tidak ditemukan.");
            return 1; // Kode error
        }

        $this->info("Memulai proses ekspor untuk kegiatan: '{$kegiatan->nama}'");
        Log::channel('single')->info("Memulai ekspor via Artisan untuk kegiatan: {$kegiatan->id}");

        try {
            $result = $exporter->export($kegiatan);
            $this->info($result['message']);
            Log::channel('single')->info("Selesai ekspor via Artisan: {$result['message']}");
            return 0; // Kode sukses
        } catch (\Exception $e) {
            $this->error("Terjadi kesalahan: " . $e->getMessage());
            Log::channel('single')->error("Gagal ekspor via Artisan untuk kegiatan {$kegiatan->id}: " . $e->getMessage());
            return 1;
        }
    }
}
