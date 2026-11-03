# Panduan Demo Aplikasi Perpustakaan

Dokumen ini berisi urutan demonstrasi fitur aplikasi perpustakaan.

## 1. Menjalankan Aplikasi

Buka dua terminal pada folder project.

**Terminal 1 — Aplikasi utama**
```bash
php artisan serve --port=8000
```

**Terminal 2 — Server internal API**
```bash
php artisan serve --port=8011
```

Pastikan konfigurasi berikut tersedia di file `.env`:
```env
INTERNAL_API_URL=http://127.0.0.1:8011
```

Akses aplikasi utama melalui:
```text
http://127.0.0.1:8000
```

## 2. Login

1. Buka halaman login.
2. Masukkan email dan password akun yang tersedia.
3. Klik tombol **Login**.
4. Pastikan berhasil masuk ke halaman Dashboard.

## 3. Dashboard

1. Tampilkan halaman Dashboard.
2. Jelaskan ringkasan informasi yang tersedia, seperti jumlah buku, anggota, dan peminjaman (sesuai data yang tampil pada aplikasi).

## 4. Menambahkan Kategori

1. Buka menu **Kategori** menggunakan akun admin.
2. Klik tombol **Tambah Kategori**.
3. Isi nama kategori.
4. Simpan data dan pastikan kategori muncul pada daftar.

## 5. Menambahkan Buku

1. Buka menu **Buku**.
2. Klik tombol **Tambah Buku**.
3. Isi data buku, termasuk judul, penulis, kategori, penerbit, tahun terbit, dan stok sesuai kolom yang tersedia.
4. Simpan dan pastikan buku muncul pada daftar.

## 6. Menambahkan Anggota

1. Buka menu **Anggota**.
2. Klik tombol **Tambah Anggota**.
3. Isi data anggota sesuai formulir.
4. Simpan dan pastikan anggota muncul pada daftar.

## 7. Membuat Peminjaman

1. Buka menu **Peminjaman**.
2. Klik tombol **Tambah Peminjaman**.
3. Pilih anggota dan buku yang akan dipinjam.
4. Isi tanggal peminjaman dan tanggal jatuh tempo sesuai formulir.
5. Simpan peminjaman.
6. Pastikan data peminjaman tampil pada daftar.

## 8. Melihat Peminjaman Aktif

1. Buka daftar **Peminjaman**.
2. Tunjukkan data peminjaman yang masih berstatus aktif atau belum dikembalikan.
3. Jelaskan informasi anggota, buku, dan tanggal peminjaman yang ditampilkan.

## 9. Mengembalikan Buku

1. Pilih data peminjaman yang akan dikembalikan.
2. Klik tombol **Kembalikan**.
3. Pastikan status peminjaman berubah menjadi **Dikembalikan**.
4. Periksa apakah stok buku bertambah kembali sesuai implementasi aplikasi.

## 10. Melihat Laporan

1. Buka menu **Laporan**.
2. Tampilkan data laporan peminjaman.
3. Jelaskan informasi yang tersedia dan gunakan filter jika fitur tersebut tersedia.

## 11. Pengujian API Menggunakan Postman

Pastikan server internal berjalan pada port `8011`. Gunakan base URL:

```text
http://127.0.0.1:8011
```

Uji endpoint berikut sesuai konfigurasi API pada project:

| No. | Method | Endpoint | Keterangan |
|---:|---|---|---|
| 1 | GET | `/api/books` | Menampilkan seluruh buku |
| 2 | GET | `/api/books/{id}` | Menampilkan detail buku |
| 3 | POST | `/api/books` | Menambahkan buku |
| 4 | PUT | `/api/books/{id}` | Mengubah data buku |
| 5 | DELETE | `/api/books/{id}` | Menghapus buku |
| 6 | GET | `/api/members` | Menampilkan seluruh anggota |
| 7 | GET | `/api/members/{id}` | Menampilkan detail anggota |
| 8 | GET | `/api/loans` | Menampilkan data peminjaman |
| 9 | POST | `/api/loans` | Membuat peminjaman |
| 10 | PUT | `/api/loans/{id}/kembalikan` | Mengembalikan buku |
| 11 | GET | `/api/stats` | Menampilkan statistik |

Untuk setiap endpoint:
1. Pilih method dan masukkan URL.
2. Isi tab **Body** dengan format JSON untuk request yang membutuhkan data.
3. Klik **Send**.
4. Periksa status code dan response JSON.
5. Cocokkan hasil pengujian dengan dokumentasi pada `Api.md`.

> Catatan: Sesuaikan nama field JSON, format response, dan port server dengan implementasi route serta controller API pada project. Tidak semua endpoint memerlukan Body.
