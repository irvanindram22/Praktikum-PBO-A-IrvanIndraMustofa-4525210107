# LAPORAN PRAKTIKUM PEMROGRAMAN BERBASIS OBJEK

| Informasi Praktikan | Keterangan |
| :--- | :--- |
| **Nama** | Irvan Indra Mustofa |
| **NPM** | 4525210107 |
| **Kelas** | A |
| **Mata Kuliah** | Pemrograman Berbasis Objek (PBO) |
| **Pertemuan** | 09 -  Package, Namespace, dan Build Tool |
| **Tanggal** | Kamis 29 Oktober 2026 |

# Panduan Praktikum Sesi 9: Package, Namespace, dan Build Tool

**Sub-CPMK-P6: Mahasiswa dapat menata proyek memakai package/namespace dan mengelola dependensi dengan Maven serta Composer. (P3)**

**Materi teori terkait:** Pertemuan 9 (Package, Namespace, dan Build Tool)  
**Waktu pelaksanaan:** 170 menit (1 SKS praktikum) · **Porsi nilai:** 5% dari total nilai praktikum  
**Bahasa pemrograman:** Java 25 dan PHP 8.4 ke atas

> Modul ini juga tersedia dalam format Word: [`Modul-Praktikum-09-package-namespace-dan-build-tool.docx`](Modul-Praktikum-09-package-namespace-dan-build-tool.docx). Kode awal yang disediakan ada di folder [`starter/`](starter/).

---

## A. Sasaran pembelajaran

1. Mengubah proyek yang masih berantakan menjadi proyek Maven dan proyek Composer yang tersusun dengan benar.
2. Memakai penamaan package berpola domain terbalik serta autoload PSR-4.
3. Memasang satu pustaka eksternal di tiap proyek dan benar-benar menggunakannya.
4. Menjaga agar tidak ada hasil build yang ikut tersimpan di repositori.

## B. Perlengkapan yang dibutuhkan

- Maven versi 3.9 ke atas dan Composer 2.x, yang sudah dipasang pada sesi 1.
- Kode Sistem Perpustakaan dari sesi 7, yang akan ditata ulang pada sesi ini.
- Koneksi internet untuk mengunduh dependensi. Bila laboratorium tidak memiliki akses, pakai cermin lokal dari asisten.

## C. Berkas kerangka (starter)

Salin berkas-berkas ini ke folder tugas Anda dan **jangan** mengubah aslinya. Setiap komentar `TODO` wajib Anda selesaikan sendiri, sebab kode hasil salinan dari orang lain akan ketahuan saat demo.

| Berkas | Isi |
|---|---|
| `starter/java/pom.xml` | pom.xml yang masih memiliki TODO pada groupId, artifactId, dan dependensi. |
| `starter/java/struktur.txt` | Gambaran susunan folder Maven yang perlu Anda buat. |
| `starter/php/composer.json` | composer.json dengan TODO pada bagian autoload PSR-4. |
| `starter/.gitignore` | Versi lengkap, sudah mencakup target/ dan vendor/. |

## D. Tahapan pengerjaan

Ikuti urutannya. Jangan lanjut ke tahap berikutnya sebelum checkpoint tahap sekarang tercapai.

### Tahap 1: Menyusun folder standar Maven

- Buat folder sesi-09/java/, lalu bentuk susunan folder baku Maven di dalamnya. Ingat baik-baik susunan ini, karena Spring Boot di sesi 14 memakai pola yang persis sama.
- Pindahkan kode Perpustakaan dari sesi 7 ke src/main/java/ dengan package id.ac.univpancasila.perpustakaan, beserta sub-package model, service, dan exception.
- Nama package wajib identik dengan jalur foldernya. Ini aturan bahasa pemrograman, bukan sekadar kebiasaan.

**Susunan folder**

```
sesi-09/java/
├── pom.xml
└── src/main/java/id/ac/univpancasila/perpustakaan/
    ├── App.java
    ├── model/     (Buku.java, Anggota.java, Peminjaman.java)
    └── service/   (LibraryService.java)
```

> **Checkpoint:** Setiap berkas .java dibuka dengan baris package yang sesuai dengan letaknya.

### Tahap 2: Melengkapi pom.xml lalu membangun proyek

- Isi bagian TODO di pom.xml, yaitu groupId, artifactId, versi, dan maven.compiler.release.
- Bangun proyek, lalu jalankan programnya.

**Terminal**

```bash
cd sesi-09/java
mvn clean compile
mvn exec:java -Dexec.mainClass=id.ac.univpancasila.perpustakaan.App
```

> **Checkpoint:** Muncul BUILD SUCCESS dan program dapat berjalan dari hasil kompilasi di target/classes.

### Tahap 3: Menambah dependensi eksternal (Java)

- Pilih satu pustaka yang sungguh-sungguh Anda gunakan. Contohnya pustaka kecil untuk menampilkan tabel di terminal atau pustaka untuk mengolah tanggal.
- Seusai menambahkannya, jalankan mvn dependency:tree dan simpan hasilnya ke sesi-09/dependency-tree.txt.
- Panggil setidaknya satu fungsi pustaka tersebut di App.java. Dependensi yang dipasang tetapi tidak digunakan tidak akan dinilai.

**Terminal**

```bash
mvn dependency:tree > ../dependency-tree.txt
mvn clean compile
```

> **Checkpoint:** dependency-tree.txt memperlihatkan pustaka pilihan Anda, dan App.java memang memanggilnya.

### Tahap 4: Membuat proyek Composer dengan autoload PSR-4

- Buat folder sesi-09/php/ berisi src/Model/, src/Service/, dan src/Exception/.
- Selesaikan TODO di composer.json dengan memetakan namespace Perpustakaan\ ke src/.
- Buang SEMUA pemanggilan require_once. Begitu PSR-4 aktif, cukup satu baris require vendor/autoload.php di titik masuk program.

**Terminal**

```bash
cd ../php
composer install
php main.php
```

> **Checkpoint:** Program berjalan tanpa require_once apa pun, kecuali vendor/autoload.php.

### Tahap 5: Menambah dependensi eksternal (PHP)

- Pasang satu pustaka dan manfaatkan fungsinya. Usulan: nesbot/carbon untuk mengelola tanggal peminjaman dan batas pengembalian.
- Amati berkas composer.lock yang terbentuk dan baca sebagian isinya.

**Terminal**

```bash
composer require nesbot/carbon
php main.php
```

> **Checkpoint:** Tanggal jatuh tempo dihitung dengan pustaka eksternal, bukan dengan perhitungan tanggal manual.

### Tahap 6: Eksperimen merusak pemetaan namespace

- Buat berkas sesi-09/percobaan.md.
- Ganti namespace sebuah kelas dari Perpustakaan\Model menjadi Perpustakaan\Domain TANPA memindahkan berkasnya, lalu jalankan program. Salin pesan error yang muncul.
- Setelah itu betulkan dengan memindahkan berkas ke folder yang cocok, dan tuliskan langkah perbaikannya.
- Ulangi eksperimen serupa di Java: ubah baris package satu kelas tanpa memindahkan berkasnya, lalu catat pesan dari compiler.

> **Checkpoint:** percobaan.md berisi dua pesan error asli lengkap dengan cara memperbaikinya.

### Tahap 7: Memastikan repositori bersih

- Ganti .gitignore Anda dengan versi lengkap dari folder starter.
- Jalankan git status. Folder target/ dan vendor/ TIDAK boleh tampak.
- Bila keduanya telanjur ter-commit, lepaskan dengan git rm -r --cached.
- composer.lock WAJIB ikut di-commit. Terangkan alasannya di percobaan.md.

**Terminal**

```bash
git status
git add .
git commit -m "Sesi 9: restrukturisasi Maven dan Composer"
git push
```

> **Checkpoint:** Repositori daring tidak memuat target/ dan vendor/, namun memuat composer.lock.

## E. Latihan tambahan di lab

_Silakan dikerjakan jika tahap-tahap di atas selesai lebih cepat. Tidak diwajibkan, tetapi bisa menambah nilai pada aspek penerapan konsep._

1. Ubah penanda versi dependensi PHP dari ^2.0 menjadi ~2.0, jalankan composer update, lalu bandingkan perubahan pada composer.lock.
2. Buat sub-package util berisi satu kelas pembantu untuk memformat rupiah, lalu panggil dari App. Perhatikan baris import/use yang perlu ditambahkan.

## F. Pekerjaan rumah

1. Tata ulang SELURUH kode Anda dari sesi 2 hingga 7 ke dalam kedua proyek ini. Mulai sesi 9, hanya susunan inilah yang dipakai sampai semester berakhir.
2. Tulis sesi-09/README.md yang menjelaskan cara membangun dan menjalankan kedua proyek, seakan-akan untuk pembaca yang belum pernah melihat proyek Anda.

## G. Hasil yang harus dikumpulkan

Semua hasil dikumpulkan lewat repositori Git pribadi Anda. Riwayat commit harus memperlihatkan proses pengerjaan yang bertahap, bukan satu commit besar di akhir.

| Berkas / folder | Isi |
|---|---|
| `sesi-09/java/` | Proyek Maven utuh dengan pom.xml dan susunan src/main/java. |
| `sesi-09/php/` | Proyek Composer dengan composer.json, composer.lock, dan autoload PSR-4. |
| `sesi-09/dependency-tree.txt` | Hasil perintah mvn dependency:tree. |
| `sesi-09/percobaan.md` | Dua eksperimen merusak pemetaan namespace/package beserta perbaikannya. |
| `sesi-09/README.md` | Panduan membangun dan menjalankan proyek. |

## I. Daftar pertanyaan demo

> Pertanyaan di bawah ini akan ditanyakan saat Anda mendemokan hasil kerja. Daftarnya sengaja dibuka supaya Anda menyiapkan **pemahaman**, bukan hafalan. Alat bantu apa pun boleh dipakai selama mengerjakan, tetapi kode yang tidak bisa Anda jelaskan sendiri tidak akan dinilai.

1. Tunjukkan satu berkas Java Anda. Dari baris pertamanya saja, bagaimana saya bisa tahu berkas itu seharusnya berada di folder mana?
2. Apa yang dikerjakan Composer saat saya menulis new Perpustakaan\Model\Buku()? Uraikan satu per satu.
3. Kenapa vendor/ dan target/ tidak boleh di-commit, sedangkan composer.lock justru harus?
4. Tunjukkan dependensi eksternal yang Anda tambahkan, lalu tunjukkan baris kode yang memanfaatkannya.
5. Apa maksud penanda versi ^2.0 di composer.json Anda? Apakah versi 3.0 ikut terpasang?
6. Jika folder vendor/ Anda saya hapus sekarang, apa yang perlu dilakukan supaya program kembali berjalan?
7. Mengapa susunan src/main/java ini penting dipahami sekarang, padahal Spring Boot baru dipakai di sesi 14?

## J. Masalah yang sering muncul

| Gejala | Penyebab umum | Solusi |
|---|---|---|
| ClassNotFoundException ketika Java dijalankan | Nama package tidak sama dengan susunan folder, atau penulisan mainClass keliru. | Sesuaikan package dengan folder. Tulis mainClass lengkap dengan nama package-nya. |
| PHP: Class "Perpustakaan\Model\Buku" not found | Pemetaan PSR-4 salah, atau autoload belum dibangun ulang. | Cek composer.json lalu jalankan composer dump-autoload. Perhatikan huruf besar-kecil nama folder, karena di Linux hal itu berpengaruh. |
| mvn: BUILD FAILURE, source option 25 is no longer supported | JAVA_HOME mengarah ke JDK versi lama. | Betulkan JAVA_HOME, buka terminal baru, lalu cek dengan mvn -v. |
| composer install gagal karena tidak ada internet | Laboratorium tidak punya akses keluar. | Pakai cermin lokal dari asisten, atau jalankan composer dump-autoload --no-scripts untuk membuat autoload tanpa dependensi eksternal. |
| target/ atau vendor/ masih tampil di git status | Keduanya sudah ter-commit sebelum .gitignore dipasang. | Jalankan git rm -r --cached target vendor, lalu commit ulang. |

## Lembar verifikasi demo

Diisi oleh dosen atau asisten ketika demo berlangsung. Tugas yang tidak memiliki lembar terverifikasi tidak akan dinilai.

|  |  |
|---|---|
| Nama / NIM |  |
| Tanggal demo |  |
| Nilai sesi ini |  |
| Catatan penguji |  |
| Paraf penguji |  |

---

_Modul ini ditulis pada 10 September 2026. Versi teknologi yang disebut (Java 25 LTS, PHP 8.4/8.5, Laravel 13, Spring Boot 4.1) dicek pada tanggal tersebut dan perlu diverifikasi lagi sebelum semester dimulai._
