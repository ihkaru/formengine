# GEMINI / Antigravity Development Instructions

## Dev Server & Environment Workflow (`dev.sh`)
- Proyek ini menggunakan script pemula idempoten `./dev.sh` untuk menyalakan lingkungan pengembangan.
- **Service Docker Compose**: Docker menyalakan kontainer MySQL 8.0 (Port `3308`) dan phpMyAdmin (Port `8085`).
- **Laravel Dev Server**: Dijalankan via `./dev.sh` pada port bebas (default `8765`).

## Debugging & Cache Clearing Checklist
Saat melakukan penyesuaian/debugging rute, tampilan Blade, atau variabel lingkungan (`.env`):
1. **Periksa Proses `./dev.sh`**: Pastikan server yang melayani rute adalah instance `./dev.sh` terbaru.
2. **Pembersihan Cache**: Selalu jalankan `php artisan optimize:clear` untuk membersihkan cache view, config, dan route.
3. **Restart Server Dev**: Jika menghentikan server, selalu gunakan `./dev.sh` agar kontainer Docker dan alokasi port terkoordinasi secara aman dan idempoten.
