<?php
declare(strict_types=1);

/**
 * Sesi 2 — enkapsulasi yang menjaga invariant (PHP).
 * Bandingkan baris demi baris dengan java/Mahasiswa.java.
 */
class Mahasiswa
{
    public const BOBOT_TUGAS = 0.30;
    public const BOBOT_UTS   = 0.30;
    public const BOBOT_UAS   = 0.40;

    private const NILAI_MIN = 0.0;
    private const NILAI_MAX = 100.0;

    /**
     * Constructor property promotion (PHP 8):
     * readonly adalah padanan `final` pada atribut Java.
     */
    public function __construct(
        private readonly string $nim,
        private readonly string $nama,
        private float $nilaiTugas,
        private float $nilaiUts,
        private float $nilaiUas,
    ) {
        if (trim($this->nim) === '') {
            throw new InvalidArgumentException('NIM tidak boleh kosong.');
        }

        self::pastikanNilaiSah('nilaiTugas', $this->nilaiTugas);
        self::pastikanNilaiSah('nilaiUts', $this->nilaiUts);
        self::pastikanNilaiSah('nilaiUas', $this->nilaiUas);
    }

    private static function pastikanNilaiSah(string $namaKomponen, float $nilai): void
    {
        if ($nilai < self::NILAI_MIN || $nilai > self::NILAI_MAX) {
            throw new InvalidArgumentException(
                sprintf('%s harus berada dalam rentang %.0f..%.0f.', $namaKomponen, self::NILAI_MIN, self::NILAI_MAX)
            );
        }
    }

    public function nilaiAkhir(): float
    {
        return ($this->nilaiTugas * self::BOBOT_TUGAS)
             + ($this->nilaiUts * self::BOBOT_UTS)
             + ($this->nilaiUas * self::BOBOT_UAS);
    }

    public function hurufMutu(): string
    {
        $nilai = $this->nilaiAkhir();

        return match (true) {
            $nilai >= 80 => 'A',
            $nilai >= 70 => 'B',
            $nilai >= 60 => 'C',
            $nilai >= 50 => 'D',
            default => 'E',
        };
    }

    public function getNim(): string { return $this->nim; }
    public function getNama(): string { return $this->nama; }
    public function getNilaiTugas(): float { return $this->nilaiTugas; }
    public function getNilaiUts(): float { return $this->nilaiUts; }
    public function getNilaiUas(): float { return $this->nilaiUas; }

    public function __toString(): string
    {
        return sprintf('%-10s %-18s akhir=%6.2f  mutu=%s',
            $this->nim, $this->nama, $this->nilaiAkhir(), $this->hurufMutu());
    }
}