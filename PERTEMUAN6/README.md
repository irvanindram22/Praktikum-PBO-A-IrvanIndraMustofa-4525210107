# LAPORAN PRAKTIKUM PEMROGRAMAN BERBASIS OBJEK

| Informasi Praktikan | Keterangan |
| :--- | :--- |
| **Nama** | Irvan Indra Mustofa |
| **NPM** | 4525210107 |
| **Kelas** | A |
| **Mata Kuliah** | Pemrograman Berbasis Objek (PBO) |
| **Pertemuan** | 06 - Abstract Class, Interface, dan Enum |
| **Tanggal** | Kamis 8 Oktober 2026 |

---

## 1. Implementasi Java

### 1.1. File: `Main.java`

**Penjelasan Kode:**
> Program ini menguji sekumpulan objek bertipe `Movable`, melakukan pengisian bahan bakar melalui kontrak `Fuelable`, serta memperlihatkan perilaku enum `TipeBahanBakar`. Pemanggilan `isiPenuh` pada `Sepeda` digunakan sebagai contoh kesalahan tipe, sebab `Sepeda` tidak mengimplementasikan `Fuelable`.

**Bukti Eksekusi (Screenshot):**
- **Before** ![Sebelum](images/mainSebelumJAVA.png)
- **After** ![Sesudah](images/mainSesudahJAVA.png)

### 1.2. File: `Kendaraan.java`

**Penjelasan Kode:**
> Kelas abstrak yang menampung data umum kendaraan dan perilaku bersama, serta mewajibkan kelas turunan menentukan jumlah rodanya.

**Bukti Eksekusi (Screenshot):**
- **Before** ![Sebelum](images/kendaraanSebelumJAVA.png)
- **After** ![Sesudah](images/kendaraanSesudahJAVA.png)

### 1.3. File: `Mobil.java`

**Penjelasan Kode:**
>Kelas turunan dari `Kendaraan` yang memenuhi kontrak `Movable` dan `Fuelable`, dengan informasi tambahan berupa kapasitas tangki dan jenis bahan bakar yang digunakan.

**Bukti Eksekusi (Screenshot):**
- **Before** ![Sebelum](images/mobilSebelumJAVA.png)
- **After** ![Sesudah](images/mobilSesudahJAVA.png)

### 1.4. File: `Sepeda.java`

**Penjelasan Kode:**
> Kelas turunan dari `Kendaraan` yang menerapkan kontrak `Movable`. `Sepeda` mampu bergerak, namun tidak mengimplementasikan `Fuelable` karena tidak memerlukan bahan bakar.

**Bukti Eksekusi (Screenshot):**
- **After** ![Sesudah](images/sepedaSesudahJAVA.png)

### 1.5. File: `Movable.java`

**Penjelasan Kode:**
> Interface yang mendefinisikan kemampuan bergerak beserta kecepatan maksimum, serta menyediakan default method yang menghasilkan ringkasan gerak.

**Bukti Eksekusi (Screenshot):**
- **Before** ![Sebelum](images/movableSebelumJAVA.png)
- **After** ![Sesudah](images/movableSesudahJAVA.png)

### 1.6. File: `Fuelable.java`

**Penjelasan Kode:**
>Interface yang mendefinisikan kemampuan diisi bahan bakar, dengan ketentuan bahwa kelas pengimplementasinya menyediakan kapasitas tangki dan tipe bahan bakar.

**Bukti Eksekusi (Screenshot):**
- **Before** ![Sebelum](images/lableSebelumJAVA.png)
- **After** ![Sesudah](images/lableSesudahJAVA.png)

### 1.7. File: `TipeBahanBakar.java`

**Penjelasan Kode:**
>Enum yang mendaftarkan jenis bahan bakar yang diperbolehkan, dengan atribut label dan harga per satuan, serta method untuk menghitung biaya pengisian dan menunjukkan apakah bahan bakar tersebut ramah lingkungan.

**Bukti Eksekusi (Screenshot):**
- **Before** ![Sebelum](images/bbmSebelumJAVA.png)
- **After** ![Sesudah](images/bbmSesudahJAVA.png)

### Output

**Output Program:**

![Output](images/OutputJAVA.png)

---

## 2. Implementasi PHP

### 2.1. File: `main.php`

**Penjelasan Kode:**
>Program PHP ini menjalankan beberapa objek kendaraan, lalu mengisi bahan bakar pada objek yang bertipe `Fuelable`. Setelah itu, program menampilkan perilaku enum dan contoh penggunaan trait.

**Bukti Eksekusi (Screenshot):**
- **Before** ![Sebelum](images/mainSebelumPHP.png)
- **After** ![Sesudah](images/mainSesudahPHP.png)

### 2.2. File: `abstraksi.php`

**Penjelasan Kode:**
> Memuat interface `Movable` dan `Fuelable`, enum `TipeBahanBakar`, serta trait `Loggable` untuk berbagi perilaku log. File ini juga menjadi tempat abstraksi dan kelas pendukung PHP didefinisikan.

**Bukti Eksekusi (Screenshot):**
- **Before** ![Sebelum](images/abstraksiSebelumPHP.png)
- **After** ![Sesudah](images/abstraksiSesudahPHP.png)

### Output

**Output Program:**

![Output](images/OutputPHP.png)

---

## 3. Kesimpulan

Abstract class digunakan untuk berbagi keadaan dan perilaku dasar sekaligus memaksa kelas turunan melengkapi method abstrak. Interface mendefinisikan kemampuan yang harus dimiliki kelas, sedangkan enum membatasi pilihan nilai yang sah. Pemisahan kontrak membuat fungsi seperti isiPenuh hanya menerima objek yang benar-benar mendukung pengisian bahan bakar.