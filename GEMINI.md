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

---

## 🏛️ Blade Architecture & Reusable Village Component Rules (2026)

### 1. Component-First Layouts & Reusability
* **Master Layout Component**: Gunakan `<x-layouts.app>` (menggantikan `@extends`) dengan slot `$slot` dan `$title` agar scopoling view terisolasi secara bersih.
* **Multivillage Reusability**: Seluruh modul tampilan Desa Binaan (seperti Desa Sungai Bakau Kecil, Kel. Pasir Wan Salim, Desa Pasir Palembang, Desa Sambora, dll.) **wajib menggunakan komponen terpadu** yang fleksibel dan menerima properti/parameter dinamis.

### 2. Intent-Based Directory Structure (`resources/views/components/`)
* **`components/ui/`**: Komponen presentasi UI generik:
  * `<x-ui.kpi-card>`: Kartu statistik KPI (populasi, KK, lansia, bansos, fasilitas).
  * `<x-ui.image-modal>`: Modal preview gambar resolusi tinggi.
* **`components/widgets/`**: Modul interaktif tingkat tinggi:
  * `<x-widgets.flashcard-deck>`: Gimmick trivia 3D flip flashcard 20+ fakta data desa yang updateable saat sync.
  * `<x-widgets.sdi-metadata-tab>`: Tab metadata kegiatan, variabel, dan 8 indikator SDI.
  * `<x-widgets.village-tables>`: Tabel potensi RT & Fasilitas umum desa dengan fitur filter & sort.
  * `<x-widgets.dukungan-pemkab>`: Card komitmen pembinaan sektoral Pemkab & BPS.

### 3. Clean Logic & Responsive Design Rules
* **Logic-less Views**: View Blade bertugas murni untuk rendering HTML. Pengolahan array/data dilakukan di JS Service/Controller atau Class-Based Component.
* **Mobile-First Responsiveness**: Selalu sertakan `overflow-x-auto text-nowrap` pada tabel/tabs dan `flex-wrap` pada badge/buttons agar tidak terjadi kerusakkan tampilan (*horizontal overflow*) di layar HP 375px (iPhone SE).

