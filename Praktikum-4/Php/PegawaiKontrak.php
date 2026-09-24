public class PegawaiKontrak extends Pegawai {
<?php

class PegawaiKontrak extends Pegawai
{

    private int $bulanKontrak;

    public function __construct(string $nip, string $nama, float $gajiPokok, int $bulanKontrak)
    {
        parent::__construct($nip, $nama, $gajiPokok);
        $this->bulanKontrak = $bulanKontrak;
    }

    // TODO 2: pegawai kontrak TIDAK mendapat tunjangan masa kerja.
    //         Apakah method hitungGaji() perlu di-override di sini?
    //         Pikirkan dulu, lalu tuliskan alasannya di catatan.md.

    public function jenis(): string
    {
        return "KONTRAK";
    }

    public function getBulanKontrak(): int
    {
        return $this->bulanKontrak;
    }
}
