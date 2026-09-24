<?php

class PegawaiTetap extends Pegawai
{

    /** Tunjangan masa kerja: 2% gaji pokok per tahun, maksimum 40%. */
    protected const TUNJANGAN_PER_TAHUN = 0.02;
    protected const TUNJANGAN_MAKSIMUM = 0.40;

    private int $masaKerjaTahun;

    public function __construct(string $nip, string $nama, float $gajiPokok, int $masaKerjaTahun)
    {
        // Baris berikut WAJIB dan harus menjadi pernyataan pertama.
        // TODO 1 (Langkah 3): hapus sementara baris ini, kompilasi,
        //         salin pesan kesalahannya ke catatan.md, lalu kembalikan.
        parent::__construct($nip, $nama, $gajiPokok);

        $this->masaKerjaTahun = $masaKerjaTahun;
    }

    /**
     * TODO 2: hitung gaji = gaji dasar induk + tunjangan masa kerja.
     *
     * PENTING: panggil super.hitungGaji() untuk memperoleh gaji dasar.
     *          JANGAN menyalin rumus induk ke sini — itu yang dinilai.
     */
    public function hitungGaji(): float
    {
        $gajiDasar = parent::hitungGaji();

        $persentaseTunjangan = $this->masaKerjaTahun * self::TUNJANGAN_PER_TAHUN;

        if ($persentaseTunjangan > self::TUNJANGAN_MAKSIMUM) {
            $persentaseTunjangan = self::TUNJANGAN_MAKSIMUM;
        }

        return $gajiDasar + ($gajiDasar * $persentaseTunjangan);
    }

    public function jenis(): string
    {
        return 'TETAP';
    }

    protected function getMasaKerjaTahun(): int
    {
        return $this->masaKerjaTahun;
    }
}

?>
