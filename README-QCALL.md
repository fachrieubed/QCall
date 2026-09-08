# QCall Laravel - User & Admin

Project ini melanjutkan website QCall sebelumnya dan sekarang memiliki 2 role:

- **User/Peserta**: melihat dashboard, data program, profil, dan status pendaftaran.
- **Admin**: melihat statistik pendaftar dan mengubah status pendaftaran.

## Akun demo

### User

Email: `user@qcall.test`
Password: `user12345`

User demo sudah memiliki pendaftaran Cinta Quran Call dengan status **Menunggu Konfirmasi**.

### Admin

Email: `admin@qcall.com`
Password: `admin12345`

## Menjalankan project

1. Pastikan PHP dan Composer tersedia.
2. Atur `.env` sesuai database yang dipakai.
3. Jalankan:

```bash
php artisan migrate
php artisan db:seed
php artisan serve
```

Buka `http://127.0.0.1:8000`.

Jika database masih kosong dan ingin mengulang seluruh database:

```bash
php artisan migrate:fresh --seed
```

## Alur

Beranda -> **Daftar Sekarang - Gratis** -> Form pendaftaran -> data masuk ke database.

Login menggunakan akun demo akan otomatis diarahkan sesuai role:

- `user` -> `/dashboard`
- `admin` -> `/admin`

Admin dapat mengubah status pendaftaran menjadi **Menunggu / Diterima / Ditolak**.

## Catatan

Tampilan dibuat tanpa ketergantungan frontend Node/Vite untuk halaman website utama. CSS Blade sudah dibuat responsif untuk desktop, tablet, dan mobile.

## Akun & Registrasi

### Admin (otomatis dibuat saat `php artisan migrate`)

- Email: `admin@qcall.com`
- Password: `admin12345`

### User baru

User tidak perlu dibuat manual lewat phpMyAdmin. Isi halaman **Daftar Sekarang - Gratis** dengan:

- Nama
- Email
- Password
- Konfirmasi Password
- Nomor WhatsApp
- Data pendaftaran lainnya

Laravel akan otomatis membuat akun di tabel `users` dan data program di tabel `registrations`. Password hanya disimpan di `users` dalam bentuk hash.

### Login

Login menggunakan **email + password**. Setelah login, Laravel otomatis mengarahkan:

- `role = admin` → `/admin`
- `role = user` → `/dashboard`

### Setup MySQL XAMPP

Pastikan `.env` memakai MySQL, contoh:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=qcall
DB_USERNAME=root
DB_PASSWORD=
```

Buat database `qcall` di phpMyAdmin, lalu jalankan:

```bash
php artisan migrate
```

Tidak wajib menjalankan `php artisan db:seed` untuk akun admin karena admin dibuat oleh migration. Seeder masih tersedia untuk membuat data demo user jika diperlukan.
