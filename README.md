# Praktikum 7: PHP Dasar - Pemrograman Web
 
Repository ini dibuat untuk memenuhi tugas **Praktikum 7 Pemrograman Web** di **Universitas Pelita Bangsa**.
 
## Identitas Mahasiswa
 
| Keterangan | Data |
|---|---|
| **Nama** | Rafli Putra Sudrajat |
| **Kelas** | I251B |
| **NIM** | 312510326 |
| **Mata Kuliah** | Pemrograman Web |
 
---
 
## 1. Tujuan Praktikum
 
Tujuan dari praktikum ini adalah sebagai berikut:
 
1. Menjalankan PHP di server lokal dan membuka hasilnya di browser.
2. Menggunakan variabel, operator, percabangan (`if / elseif / else`), array, dan `foreach`.
3. Membuat dan memanggil `function` dengan parameter dan nilai kembalian.
4. Memproses input form dengan metode GET dan POST, termasuk validasi dan pengamanan output dengan `htmlspecialchars()`.
5. Mengembangkan program secara mandiri melalui lima eksperimen mandiri.
---
 
## 2. Perangkat yang Digunakan
 
Perangkat yang digunakan pada praktikum ini adalah sebagai berikut:
 
| Kebutuhan | Keterangan |
|---|---|
| **PHP** | Interpreter PHP (paket XAMPP atau instalasi PHP mandiri) |
| **Web Server** | Apache dari XAMPP, atau server bawaan PHP (`php -S`) |
| **Editor** | Visual Studio Code |
| **Browser** | Google Chrome |
 
---
 
## 3. Cara Menjalankan Server Lokal
 
### Opsi 1: XAMPP (Apache)
 
1. Salin folder proyek ke `htdocs`, misalnya `C:\xampp\htdocs\Lab7_php`.
2. Buka XAMPP Control Panel, lalu klik **Start** pada modul **Apache**.
3. Buka alamat berikut di browser:
   - `http://localhost/Lab7_php/` untuk `index.php`
   - `http://localhost/Lab7_php/MiniProject/form_mahasiswa.php` untuk formulir mahasiswa
### Opsi 2: Server Bawaan PHP
 
```bash
cd Lab7_php
php -S localhost:8000
```
 
Lalu buka `http://localhost:8000/` dan `http://localhost:8000/MiniProject/form_mahasiswa.php`.
 
---
 
## 4. Struktur File
 
Struktur file pada praktikum ini adalah sebagai berikut:
 
```text
Lab7_php/
├── index.php                  # Materi 1-7 dan eksperimen 1-3
├── MiniProject/
│   └── form_mahasiswa.php     # Form data mahasiswa, eksperimen 4-5
├── images/                    # Tangkapan layar untuk README
└── README.md
```
 
---
 
## 5. Ringkasan Hasil
 
### 5.1 Halaman PHP Pertama
 
`index.php` menampilkan teks dan waktu server menggunakan `echo` dan `date()`.
 
<img width="906" height="473" alt="image" src="https://github.com/user-attachments/assets/ff3fe678-a0b9-477e-91d2-088773d67c06" />

 
<img width="456" height="258" alt="image" src="https://github.com/user-attachments/assets/81bdc2f3-7926-422c-bdb2-92db2b75aeb2" />

 
### 5.2 Variabel dan Percabangan: Nilai Akhir dan Predikat
 
Nilai akhir dihitung dari bobot tugas, UTS, dan UAS, kemudian predikat ditentukan dengan `if / elseif / else` (A ≥ 85, B ≥ 75, C ≥ 60, selain itu D). Bobot diubah-ubah untuk melihat pengaruhnya terhadap hasil:
 
| Bobot (Tugas / UTS / UAS) | Nilai Akhir | Predikat |
|---|---|---|
| 0,30 / 0,30 / 0,40 | 84,90 | B |
| 0,20 / 0,10 / 0,30 | 51,80 | D |
| 0,35 / 0,50 / 0,30 | 95,75 | A |
| 0,25 / 0,30 / 0,30 (awal) | 71,65 | C |
 
**Kesimpulan:** perubahan bobot mengubah nilai akhir dan predikat, karena kondisi `if` dievaluasi ulang setiap halaman dijalankan.
----

### Sebelum diganti bobot nilainya 

<img width="655" height="209" alt="image" src="https://github.com/user-attachments/assets/4f587f19-d32c-403c-a2cd-d555eade131b" />

Sesudah bobobt nilainya di ganti

<img width="748" height="266" alt="image" src="https://github.com/user-attachments/assets/d7681076-32a6-48f3-bed8-6b4f8c1876c1" />

<img width="771" height="275" alt="image" src="https://github.com/user-attachments/assets/6c19f28d-d697-4508-93de-f0b8b1f8d3a2" />
 
### 5.3 Array dan `foreach`
 
Daftar mahasiswa disimpan dalam array dan ditampilkan sebagai daftar bernomor (`<ol>`) menggunakan `foreach`.
 
<img width="975" height="285" alt="image" src="https://github.com/user-attachments/assets/7840e89a-355e-4490-8438-65f222d38971" />

 
### 5.4 Function
 
Tiga function dibuat dan dipanggil:
 
- `hitungDiskon()` menghasilkan Rp135.000 untuk harga 150.000 dengan diskon 10%.
- `hitungLuasPersegiPanjang()` menghasilkan 50 untuk panjang 10 dan lebar 5.
- `cekKelulusan()` menghasilkan "Lulus" untuk nilai 80.
  
<img width="975" height="285" alt="image" src="https://github.com/user-attachments/assets/f9d00389-d530-42c1-8bba-935995d4d6e6" />

 
### 5.5 Form GET
 
Kata kunci dikirim melalui URL (`?kata=Buku`) dan dibaca dengan `$_GET`. Data GET terlihat pada address bar browser.
 
<img width="975" height="214" alt="image" src="https://github.com/user-attachments/assets/ebab2650-6bc2-4723-968f-dca9e9ebfd2a" />

 
### 5.6 Form POST dan Keamanan Output
 
Form nama dan program studi dikirim dengan `POST`, lalu divalidasi agar tidak kosong. Input berisi tag HTML (`<"halo">`) ditampilkan apa adanya sebagai teks karena dilewatkan ke `htmlspecialchars()`, sehingga tidak dieksekusi sebagai HTML (pencegahan XSS).
 
<img width="975" height="275" alt="image" src="https://github.com/user-attachments/assets/156c3ea8-4840-43b4-bdd6-3a0ee48a7023" />

 
<img width="975" height="275" alt="image" src="https://github.com/user-attachments/assets/609b0eab-323c-499c-9aed-2791506716e2" />

 
### 5.7 Form Subtotal dan Validasi
 
Subtotal dihitung dari harga × jumlah dan ditampilkan dengan `number_format()` (contoh 2500,50 × 2 = Rp5.001). Jumlah 0 atau negatif ditolak oleh validasi browser (`min="1"`), dan PHP tetap memeriksa ulang di sisi server.
 
<img width="975" height="279" alt="image" src="https://github.com/user-attachments/assets/54e1b3a3-eb7a-43b7-ad24-787243bf5def" />

 
<img width="975" height="283" alt="image" src="https://github.com/user-attachments/assets/cdadfdbf-6eaf-4e44-97f5-86f9c87b14c1" />

<img width="975" height="140" alt="image" src="https://github.com/user-attachments/assets/41e2cabf-63e2-4621-835e-e138a9ececc9" />

 
### 5.8 Mini Project: Formulir Data Mahasiswa
 
`MiniProject/form_mahasiswa.php` menerima nama, NIM, program studi, semester (1-14), dan email. Data divalidasi di server, lalu ditampilkan jika semua valid.
 
<img width="975" height="523" alt="image" src="https://github.com/user-attachments/assets/92b24c0a-1c14-43c6-a23c-14f157bf9055" />

 
---
 
## 6. Eksperimen Mandiri
 
Ringkasan lima eksperimen mandiri adalah sebagai berikut:
 
| No | Eksperimen | File | Hasil |
|---|---|---|---|
| 1 | Rata-rata tiga komponen nilai | `index.php` | `($tugas + $uts + $uas) / 3`, ditampilkan di bawah nilai akhir |
| 2 | GET mencari nama dari array | `index.php` | `array_filter()` + `stripos()`, tidak membedakan huruf besar/kecil |
| 3 | Function format Rupiah | `index.php` | `formatRupiah()` dipakai untuk harga diskon dan subtotal (contoh Rp25.000) |
| 4 | Validasi NIM | `form_mahasiswa.php` | Hanya angka dan tepat 10 digit (`$panjangNim`), dicek di PHP dan HTML |
| 5 | Tombol reset | `form_mahasiswa.php` | `<button type="reset">`, mengosongkan isian tanpa request ke server |
 
### 6.1 Eksperimen 1: Rata-rata Nilai
 
<img width="794" height="375" alt="image" src="https://github.com/user-attachments/assets/a2b70033-bd63-4765-99c6-89310456cbfd" />

 
### 6.2 Eksperimen 2: Pencarian Nama dengan GET
 
<img width="975" height="317" alt="image" src="https://github.com/user-attachments/assets/b5e0ad80-e24f-440d-a068-deb3ed744529" />

 
### 6.3 Eksperimen 3: Function Format Rupiah
 
<img width="975" height="81" alt="image" src="https://github.com/user-attachments/assets/f9684f43-7d8a-4fc2-bb01-dbfec201fa55" />

 
### 6.4 Eksperimen 4: Validasi NIM
 
<img width="600" height="367" alt="image" src="https://github.com/user-attachments/assets/5303c9ae-5ed5-4758-9f96-90ca12908d35" />


 
### 6.5 Eksperimen 5: Tombol Reset
 
<img width="711" height="374" alt="image" src="https://github.com/user-attachments/assets/ab79e6ea-26fa-4bf7-8314-9bff189be2f7" />

 
**Perbedaan tombol Reset dan pemrosesan ulang di server:**
 
| | Reset | Kirim (pemrosesan di server) |
|---|---|---|
| Tempat kerja | Browser (sisi klien) | Server PHP |
| Request ke server | Tidak ada | Ada (HTTP POST) |
| Efek | Isian form kembali ke nilai awal | Data divalidasi, halaman dibuat ulang |
| Hasil di bawah form | Tidak berubah | Diperbarui |
 
Menekan Reset hanya mengosongkan isian. Pesan hasil atau error yang sudah dibuat server pada request sebelumnya tetap tampil sampai halaman dimuat ulang atau form dikirim lagi.
 
---
 
## 7. Catatan
 
- Semua output dari input pengguna dilewatkan ke `htmlspecialchars()`.
- Validasi di browser (`required`, `min`, `pattern`) hanya membantu pengguna. Validasi yang menentukan tetap dilakukan di PHP.
