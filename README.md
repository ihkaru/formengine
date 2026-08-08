# Portal & Showcase Data Pembinaan Desa Cantik (Desa Cinta Statistik)
**BPS Kabupaten Mempawah**

Aplikasi web berbasis **Laravel 13** dan **Blade Templates** yang dikembangkan sebagai portal informasi, dokumentasi kegiatan, serta penyajian hasil pendataan dan pembinaan **Desa Cinta Statistik (Desa Cantik)** BPS Kabupaten Mempawah.

---

## 📖 Latar Belakang & Arsitektur Sistem

Repositori ini bertugas sebagai **showcase portal dan integrasi tampilan data** bagi platform **[CERDAS Survey Engine](/home/ihza/Projects/cerdas/)** (*Cerdas Survey Management*).

### Skema Pendataan Lapangan:
1. **Desa Binaan 2025 & 2026 (AppSheet Collection)**:
   Dikarenakan CERDAS Survey Engine dalam tahap validasi dan pengujian, operasional pendataan Desa Cantik 2025–2026 dilaksanakan menggunakan solusi **AppSheet** yang diintegrasikan dengan Google Sheets & Looker Studio.
   - **Desa Binaan 2026**: Kelurahan Pasir Wan Salim, Desa Pasir Palembang, dan Desa Sungai Bakau Kecil.
   - **Desa Binaan 2025**: Kelurahan Pulau Pedalaman dan Desa Sejegi.
   - **Desa Binaan 2024**: Desa Wajok Hilir.

2. **Pra Desa Cantik 2026 (Uji Lapangan CERDAS Survey Engine)**:
   **Desa Sambora, Kecamatan Toho, Kabupaten Mempawah** dipilih sebagai lokasi uji lapangan (*field test*) pertama bagi **CERDAS Survey Engine**. Kegiatan pencacahan kuesioner mandiri ini baru saja selesai dilaksanakan secara sukses bersama SMK Taruna Muhammadiyah dengan fitur utama:
   - **Offline-First & Auto-Scrubbing**: Pendataan lancar tanpa internet, pembersihan otomatis data tersembunyi.
   - **Interactive Geotagging Map View**: Pinning lokasi rumah secara presisi berbasis GPS `Lokasi_Geotagging`.
   - **Validasi Kondisional & UX Hint**: Dukungan logika `required_if_fn` dan petunjuk ODK/KoBoToolbox.

---

## 🌟 Fitur Utama Portal
1. **Landing Page Cerdas-SM**: Gambaran umum program, fitur engine, dan ekosistem digital.
2. **Hub Portal Desa Cantik**: Pusat navigasi interaktif desa/kelurahan binaan dengan badging metode pendataan.
3. **Showcase Pra Desa Cantik 2026 (Sambora, Kec. Toho)**: Halaman khusus hasil uji lapangan CERDAS Survey Engine.
4. **Dev Environment Siap Pakai (Docker & Idempotent Script)**:
   - MySQL 8.0 & phpMyAdmin via Docker Compose.
   - Script `./dev.sh` idempoten dengan pemilihan port otomatis dan eksekusi migrasi database.

---

## 🚀 Getting Started

### Prasyarat
- **PHP**: `^8.2` atau lebih baru (Laravel 13 Compatible)
- **Composer**: `^2.0`
- **Docker & Docker Compose** *(opsional, untuk MySQL 8.0 & phpMyAdmin)*

---

### 🛠️ Cara Menjalankan Dev Server (`./dev.sh`)

1. **Clone Repositori & Masuk ke Proyek**:
   ```bash
   git clone <repository-url>
   cd formengine
   ```

2. **Jalankan Script Dev (`dev.sh`)**:
   ```bash
   ./dev.sh
   ```

   Script `./dev.sh` akan secara otomatis:
   - Membuat file `.env` dari `.env.example` (jika belum ada).
   - Menghasilkan `APP_KEY` dan symlink `public/storage`.
   - Menyalakan kontainer Docker (MySQL 8.0 & phpMyAdmin).
   - Menjalankan migrasi database otomatis (`php artisan migrate --graceful`).
   - Membersihkan cache rute & Blade view.
   - Menjalankan dev server Laravel (`http://127.0.0.1:8765`).

---

## 🌐 Alamat Akses Layanan Lokal

| Layanan | URL | Kredensial / Catatan |
| :--- | :--- | :--- |
| **Web Portal Utama** | `http://127.0.0.1:8765` | Landing Page & Overview Cerdas-SM |
| **Hub Desa Cantik** | `http://127.0.0.1:8765/desacantik` | Navigasi Desa Binaan & Pra-Desa |
| **Pra Desa Cantik Sambora** | `http://127.0.0.1:8765/pra-desa-cantik/desasambora` | **Showcase Uji Lapangan CERDAS Engine** |
| **phpMyAdmin** | `http://localhost:8085` | **User**: `formengine` / `root`, **Password**: `secret` |

---

## ⚙️ Kustomisasi Konfigurasi (`.env`)

Port dan variabel lingkungan dapat diatur pada file `.env`:

```env
APP_HOST=127.0.0.1
APP_PORT=8765

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3308
DB_DATABASE=formengine
DB_USERNAME=formengine
DB_PASSWORD=secret

PHPMYADMIN_PORT=8085
```

---

## 📂 Peta Rute Utama

- `/` ➔ Landing Page Utama (`welcome.blade.php`)
- `/desacantik` ➔ Hub Portal Desa Cantik (`cantik/index.blade.php`)
- `/pra-desa-cantik/desasambora` ➔ **Pra Desa Cantik 2026: Desa Sambora (Uji CERDAS Engine)**
- `/desa-cantik/kelurahanpasirwansalim` ➔ Desa Binaan 2026: Kel. Pasir Wan Salim
- `/desa-cantik/desapasirpalembang` ➔ Desa Binaan 2026: Desa Pasir Palembang
- `/desa-cantik/desasungaibakaukecil` ➔ Desa Binaan 2026: Desa Sungai Bakau Kecil
- `/desa-cantik/kelurahanpulaupedalaman` ➔ Desa Binaan 2025: Kel. Pulau Pedalaman
- `/desa-cantik/desasejegi` ➔ Desa Binaan 2025: Desa Sejegi
- `/desa-cantik/desawajokhilir` ➔ Desa Binaan 2024: Desa Wajok Hilir

---

## 📄 Lisensi
Dikembangkan untuk mendukung kegiatan pembinaan **Desa Cantik BPS Kabupaten Mempawah** dan riset pengembangan **CERDAS Survey Engine**.
