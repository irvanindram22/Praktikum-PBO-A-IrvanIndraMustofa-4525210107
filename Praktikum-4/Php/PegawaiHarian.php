
<?php

class PegawaiHarian extends Pegawai
{

    private int $hariKerja;

    public function __construct(string $nip, string $nama, float $gajiPokok, int $hariKerja)
    {
        parent::__construct($nip, $nama, $gajiPokok);
        $this->hariKerja = $hariKerja;
    }

    // TODO 2: pegawai kontrak TIDAK mendapat tunjangan masa kerja.
    //         Apakah method hitungGaji() perlu di-override di sini?
    //         Pikirkan dulu, lalu tuliskan alasannya di catatan.md.

    public function hitungGaji(): float
    {
        return parent::hitungGaji() * $this->hariKerja;
    }

    public function jenis(): string
    {
        return "HARIAN";
    }
}

?>
    