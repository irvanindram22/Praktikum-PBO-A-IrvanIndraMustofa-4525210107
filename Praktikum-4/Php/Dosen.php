<?php

class Dosen extends PegawaiTetap
{
    private float $tunjanganFungsional;

    public function __construct(
        string $nip,
        string $nama,
        float $gajiPokok,
        int $masaKerja,
        float $tunjanganFungsional
    ) {
        parent::__construct($nip, $nama, $gajiPokok, $masaKerja);

        $this->tunjanganFungsional = $tunjanganFungsional;
    }

    public function hitungGaji(): float
    {
        return parent::hitungGaji() + $this->tunjanganFungsional;
    }

    public function jenis(): string
    {
        return "DOSEN";
    }

    protected function getMasaKerjaTahunan(): int
    {
        return parent::getMasaKerjaTahun();
    }
}
