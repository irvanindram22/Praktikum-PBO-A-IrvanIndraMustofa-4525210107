# LAPORAN PRAKTIKUM PEMROGRAMAN BERBASIS OBJEK

| Informasi Praktikan | Keterangan |
| :--- | :--- |
| **Nama** | Irvan Indra Mustofa |
| **NPM** | 4525210107 |
| **Kelas** | A |
| **Mata Kuliah** | Pemrograman Berbasis Objek (PBO) |
| **Pertemuan** | 05 - Polimorfisme |
| **Tanggal** | Kamis 1 Oktober 2026 |

---

## 1. Implementasi Java

### 1.1. File: `Main.java`

**Penjelasan Kode:**
> Menguji objek bangun datar lewat tipe induk, sehingga method yang dijalankan mengikuti kelas objek yang sebenarnya.

**Bukti Eksekusi (Screenshot):**
- **Before** ![Sebelum](images/MainSebelumJAVA.png)
- **After** ![Sesudah](images/MainSesudahJAVA.png

### 1.2. File: `AntiPattern.java`

**Penjelasan Kode:**
> Contoh desain yang kurang baik sebagai pembanding polimorfisme, karena harus memeriksa tipe untuk setiap bentuk.

**Bukti Eksekusi (Screenshot):**
- **Before** ![Sebelum](images/PatterSebelumJAVA.png)
- **After** ![Sesudah](images/PatterSesudahJAVA.png)

### 1.3. File: `BangunDatar.java`

**Penjelasan Kode:**
> Kelas abstraksi bangun datar yang mendefinisikan perilaku umum, seperti menghitung luas, untuk diimplementasikan kelas turunan.

**Bukti Eksekusi (Screenshot):**
- **Before** ![Sebelum](images/BangunDatarSebelumJAVA.jpeg)
- **After** ![Sesudah](images/BangunDatarSesudahJAVA.png)

### 1.4. File: `Lingkaran.java`

**Penjelasan Kode:**
> Kelas turunan dari bangun datar yang mewakili lingkaran, dengan perhitungan luas berdasarkan panjang jari-jarinya.

**Bukti Eksekusi (Screenshot):**
- **Before** ![Sebelum](images/LingkaranSebelumJAVA.png)
- **After** ![Sesudah](images/LingkaranSesudahJAVA.png)

### 1.5. File: `Persegi.java`

**Penjelasan Kode:**
> Kelas turunan dari bangun datar yang mewakili persegi, dengan perhitungan luas berdasarkan panjang sisinya.

**Bukti Eksekusi (Screenshot):**
- **Before** ![Sebelum](images/PersegirSebelumJAVA.png)
- **After** ![Sesudah](images/PersegiSesudahJAVA.png)

### Output

**Output Program:**

![Output](images/OutputJAVA.png)

---

## 2. Implementasi PHP

### 2.1. File: `main.php`

**Penjelasan Kode:**
> Program PHP yang membuktikan penerapan polimorfisme pada bangun datar dengan menampilkan hasil pemanggilan method dari masing-masing objek.

**Bukti Eksekusi (Screenshot):**
- **Before** ![Sebelum](images/MainSebelumPHP.png)
- **After** ![Sesudah](images/MainSesudahPHP.png)

### 2.2. File: `BangunDatar.php`

**Penjelasan Kode:**
> Kelas abstrak bangun datar pada PHP yang menetapkan perilaku umum, sehingga seluruh kelas bentuk memiliki cara pemanggilan yang seragam.

**Bukti Eksekusi (Screenshot):**
- **Before** ![Sebelum](images/BangunDatarSebelumPHP1.png)
- **Before** ![Sebelum](images/BangunDatarSebelumPHP2.png)
- **After** ![Sesudah](images/BangunDatar1.png)
- **After** ![Sesudah](images/BangunDatar2.png)
- **After** ![Sesudah](images/BangunDatar3.png)

### 2.3. File: `notifikasi.php`

**Penjelasan Kode:**
>Contoh tambahan polimorfisme pada notifikasi, di mana pemanggil cukup memakai perilaku umum tanpa tahu detail implementasinya.

**Bukti Eksekusi (Screenshot):**
- **Before** ![Sebelum](images/NotifikasiSesudahPHP.png)
- **After** ![Sesudah](images/NotifikasiSesudahPHP.png)

### Output

**Output Program:**

![Output](images/OutputPHP.png)

---

## 3. Kesimpulan

Polimorfisme membuat objek dari kelas yang berbeda dapat dipakai lewat tipe atau kontrak yang sama, namun tetap menjalankan method sesuai kelasnya. Dengan begitu, pengecekan tipe berkurang dan kelas baru lebih mudah ditambahkan.