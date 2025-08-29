# 📦 Aplikasi Manajemen Armada & Pengiriman  

## 📂 Fitur
### 1. Armada Management (CRUD)
- Tambah, edit, hapus, dan lihat detail armada.
- Field: `nomor_armada`, `jenis_kendaraan`, `kapasitas`, `ketersediaan`.
- Search + filter berdasarkan **jenis kendaraan** & **status ketersediaan**.

### 2. Pengiriman (Shipments)
- CRUD pengiriman barang.
- Nomor pengiriman auto-generate format:  
contoh: `SHIP-2025-X7TQ-7a2fbc`.
- Field: `tanggal_pengiriman`, `lokasi_asal`, `lokasi_tujuan`, `status`, `detail_barang`, `armada_id`.
- Status default: `tertunda`, bisa diubah ke `dalam_perjalanan` / `tiba`.
- Search berdasarkan **nomor pengiriman** / **lokasi tujuan**, filter berdasarkan status.

### 3. Pemesanan Armada (Bookings)
- CRUD pemesanan armada oleh customer.
- Field: `tanggal_pemesanan`, `customer_name`, `detail_barang`, `armada_id`.
- Setelah pemesanan berhasil, armada otomatis jadi **tidak tersedia**.

### 4. Laporan Pengiriman
- Laporan jumlah pengiriman yang **sedang dalam perjalanan** per armada.
- Query menggunakan `JOIN` + `GROUP BY`.
- Ditampilkan dalam tabel laporan.

---

## 🗃️ Struktur Database (ERD)
- **armadas**  
`id`, `nomor_armada`, `jenis_kendaraan`, `kapasitas`, `ketersediaan`  

- **shipments**  
`id`, `nomor_pengiriman (uuid)`, `tanggal_pengiriman`, `lokasi_asal`, `lokasi_tujuan`, `status`, `detail_barang`, `armada_id`  

- **bookings**  
`id`, `armada_id`, `tanggal_pemesanan`, `customer_name`, `detail_barang`  

- **checkins**  
`id`, `armada_id`, `latitude`, `longitude`, `checked_at`  

---

## 📖 Cara Menjalankan
1. Install dependency
composer install
npm install && npm run dev

2. Buat file .env, sesuaikan konfiurasi database:
DB_DATABASE=fs_bcl
DB_USERNAME=root
DB_PASSWORD=

3. Migrasi & seed data
php artisan migrate:fresh --seed

4. Jalankan server
php artisan serve
