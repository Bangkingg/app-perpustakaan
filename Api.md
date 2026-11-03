# Dokumentasi Endpoint API

| No. | Method | URL | Body (jika ada) | Status Sukses | Status Gagal |
|---:|---|---|---|---|---|
| 1 | GET | `/api/books` | - | 200 OK | 500 |
| 2 | GET | `/api/books/{id}` | - | 200 OK | 404, 500 |
| 3 | POST | `/api/books` | JSON data buku | 201 Created | 422, 500 |
| 4 | PUT | `/api/books/{id}` | JSON data buku | 200 OK | 404, 422, 500 |
| 5 | DELETE | `/api/books/{id}` | - | 200 OK | 404, 500 |
| 6 | GET | `/api/members` | - | 200 OK | 500 |
| 7 | GET | `/api/members/{id}` | - | 200 OK | 404, 500 |
| 8 | GET | `/api/loans` | - | 200 OK | 500 |
| 9 | POST | `/api/loans` | JSON data peminjaman | 201 Created | 422, 500 |
| 10 | PUT | `/api/loans/{id}/kembalikan` | - | 200 OK | 404, 500 |
| 11 | GET | `/api/stats` | - | 200 OK | 500 |

> Catatan: Status code di atas merupakan status yang diharapkan. Cocokkan kembali dengan hasil pengujian aktual melalui Postman.
