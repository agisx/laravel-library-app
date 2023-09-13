# Laravel Library App

Laravel library app adalah sebuah aplikasi web yang memungkinkan pengguna untuk meminjam buku dari perpustakaan secara online dengan menggunakan framework Laravel. Aplikasi ini memiliki fitur autentikasi laravel, yaitu proses verifikasi identitas pengguna sebelum mengakses fitur-fitur tertentu. Salah satu fitur utama dari aplikasi ini adalah loan buku, yaitu fitur yang memungkinkan pengguna untuk memilih buku yang ingin dipinjam, melihat jumlah buku yang tersedia, dan mengembalikan buku sesuai dengan batas waktu yang ditentukan. Aplikasi ini juga menggunakan seeder dan factory untuk migrate database lebih mudah, serta menggunakan blade, alpinejs, dan tailwinds untuk tampilan antarmuka pengguna.

## Instalasi

Untuk menjalankan aplikasi ini, anda memerlukan:

- PHP versi 8.0 atau lebih tinggi
- Composer
- MySQL
- Node.js dan NPM

Langkah-langkah instalasi adalah sebagai berikut:

1. Clone repositori ini ke direktori lokal anda dengan perintah `git clone https://github.com/username/laravel-library-app.git`
2. Masuk ke direktori aplikasi dengan perintah `cd laravel-library-app`
3. Jalankan perintah `composer install` untuk menginstal dependensi PHP
4. Jalankan perintah `cp .env.example .env` untuk membuat file konfigurasi
5. Edit file .env sesuai dengan konfigurasi database anda
6. Jalankan perintah `php artisan key:generate` untuk membuat kunci aplikasi
7. Jalankan perintah `php artisan migrate --seed` untuk membuat tabel database dan mengisi data awal
8. Jalankan perintah `npm install` untuk menginstal dependensi JavaScript
9. Jalankan perintah `npm run dev` untuk mengkompilasi aset
10. Jalankan perintah `php artisan serve` untuk menjalankan server lokal

## Penggunaan

Setelah menjalankan server lokal, anda dapat mengakses aplikasi di http://localhost:8000
Untuk sementara ini fitur user saja yang masih tersedia.
Contohnya anda dapat login sebagai user dengan menggunakan email dan password berikut:

- User: user@example.com / password

Sebagai user, anda dapat melakukan hal-hal berikut:

- Melihat daftar buku yang tersedia di perpustakaan
- Meminjam buku dengan memasukkan jumlah buku dan tanggal pengembalian
- Melihat daftar buku yang dipinjam
- Mengembalikan buku yang sudah dipinjam
- Melihat profil dan mengubah password

## Lisensi
Aplikasi ini dilisensikan di bawah [MIT License].
