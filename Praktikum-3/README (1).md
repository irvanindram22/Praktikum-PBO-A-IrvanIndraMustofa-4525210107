# RekeningBank — Praktikum PBO Sesi 3

Implementasi class `RekeningBank` dalam **Java** dan **PHP**, sebagai latihan konsep:
- Constructor berdelegasi (constructor chaining)
- Anggota (field & method) statis
- Konstanta bernama, menggantikan angka ajaib (*magic number*)
- Validasi data pada satu titik masuk (constructor lengkap)

## Deskripsi

`RekeningBank` merepresentasikan sebuah rekening bank sederhana dengan operasi setor, tarik, dan potong biaya administrasi. Class ini dirancang untuk menjaga tiga invariant berikut selama objek hidup:

1. **Saldo tidak pernah negatif**
2. **Nomor rekening tidak berubah setelah objek dibuat** (`final` / `readonly`)
3. **Setoran dan penarikan selalu bernilai positif**

## Struktur Project

```
.
├── RekeningBank.java   # Implementasi Java
├── Main.java           # Program uji coba (Java)
├── RekeningBank.php    # Implementasi PHP
└── main.php            # Program uji coba (PHP)
```

## Konstanta

| Nama                        | Nilai      | Keterangan                          |
|-----------------------------|-----------|--------------------------------------|
| `BUNGA_TAHUNAN`              | `0.025`   | Suku bunga tahunan (2.5%)            |
| `BIAYA_ADMINISTRASI`         | `5000`    | Biaya administrasi per potongan      |
| `BATAS_PENARIKAN_SEKALI`     | `5000000` | Batas maksimum penarikan per transaksi |

## Anggota Statis

| Anggota                  | Tipe            | Keterangan                                             |
|---------------------------|-----------------|---------------------------------------------------------|
| `jumlahRekening`           | `int` (privat)  | Menghitung total rekening yang pernah dibuat            |
| `getJumlahRekening()`      | method statis   | Mengembalikan nilai `jumlahRekening`                     |
| `bungaSetahun(pokok)`      | method statis   | Menghitung bunga setahun dari suatu pokok, tanpa membaca state objek |

## Constructor

### Java
- **Constructor ringkas** `RekeningBank(nomor, pemilik)` → mendelegasikan ke constructor lengkap dengan `this(nomor, pemilik, 0)`.
- **Constructor lengkap** `RekeningBank(nomor, pemilik, saldoAwal)` → satu-satunya tempat validasi dan increment counter dilakukan, agar tidak terhitung ganda saat didelegasikan.

### PHP
PHP tidak mendukung constructor overloading, sehingga padanannya adalah:
- **Default parameter** — `saldoAwal` bernilai default `0`.
- **Named constructor (static factory)** — `RekeningBank::rekeningPelajar($nomor, $pemilik)` membuat rekening dengan saldo awal nol. Menggunakan `new static()` (bukan `new self()`) agar tetap benar jika class ini di-*extend* (late static binding).

## Method

| Method                     | Keterangan                                                                 |
|------------------------------|------------------------------------------------------------------------|
| `setor(jumlah)`               | Menambah saldo. Menolak jumlah `<= 0`.                                  |
| `tarik(jumlah)`                | Mengurangi saldo. Menolak jumlah `<= 0`, jumlah melebihi saldo, atau melebihi `BATAS_PENARIKAN_SEKALI`. |
| `potongBiayaAdmin()`           | Mengurangi saldo sebesar `BIAYA_ADMINISTRASI`, tidak akan membuat saldo negatif. |
| `getSaldo()` / `getNomor()`    | Getter untuk saldo dan nomor rekening.                                  |
| `toString()` / `__toString()`  | Representasi string rekening, format: `Rekening[nomor] pemilik  Rp saldo`. |

## Cara Menjalankan

### Java
```bash
javac Main.java RekeningBank.java
java Main
```

### PHP
```bash
php main.php
```

## Contoh Output

```
Jumlah rekening di awal: 0
Rekening[111] Ani            Rp1,000,000.00
Rekening[222] Budi           Rp0.00
Rekening[333] Citra          Rp250,000.00
Jumlah rekening sekarang: 3   (seharusnya 3, bukan 4)

=== Operasi ===
Setelah setor 500.000  -> Rekening[111] Ani            Rp1,500,000.00
  Ditolak: Melebihi batas penarikan sekali transaksi
Budi setelah potong admin: Rekening[222] Budi           Rp0.00   (saldo tidak boleh negatif)
Bunga setahun dari saldo Ani: Rp37,500.00
```

## Catatan Implementasi

- **Kenapa counter dinaikkan hanya di constructor lengkap?**
  Karena constructor ringkas mendelegasikan lewat `this(...)` (Java) ke constructor lengkap. Jika counter juga dinaikkan di constructor ringkas, satu objek yang dibuat lewat jalur delegasi akan terhitung dua kali.

- **Kenapa `bungaSetahun()` bersifat statis?**
  Karena method ini tidak membaca/mengubah state objek mana pun (`this.saldo`, dll) — ia murni fungsi matematis dari parameter yang diberikan, sehingga logis dipanggil tanpa perlu membuat instance: `RekeningBank.bungaSetahun(1_000_000)`.

- **Kenapa PHP pakai `new static()`, bukan `new self()`?**
  `new self()` selalu merujuk ke class tempat kode itu ditulis. `new static()` merujuk ke class yang sebenarnya dipanggil saat runtime (late static binding) — penting jika `RekeningBank` suatu saat di-*extend* oleh subclass.
