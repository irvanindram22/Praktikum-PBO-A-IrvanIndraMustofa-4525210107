<?php
declare(strict_types=1);

abstract class BangunDatar
{
    public function __construct(private readonly string $nama) {}

    abstract public function luas(): float;
    abstract public function keliling(): float;

    public function getNama(): string { return $this->nama; }

    public function __toString(): string
    {
        return sprintf('%-12s luas=%10.2f  keliling=%10.2f',
            $this->nama, $this->luas(), $this->keliling());
    }
}

class Lingkaran extends BangunDatar
{
    public function __construct(private readonly float $jariJari)
    {
        parent::__construct('Lingkaran');
        if ($jariJari <= 0) throw new InvalidArgumentException("Jari-jari harus > 0");
        // TODO 1: tolak jari-jari <= 0.
    }

    // TODO 2: lengkapi. Gunakan M_PI, bukan 3.14.
    public function luas(): float     { return M_PI * $this->jariJari * $this->jariJari; }
    public function keliling(): float { return 2 * M_PI * $this->jariJari; }

    public function getJariJari(): float { return $this->jariJari; }
}

class Persegi extends BangunDatar
{
    public function __construct(private readonly float $sisi)
    {
        parent::__construct('Persegi');
        if ($sisi <= 0) throw new InvalidArgumentException("Sisi harus > 0");
        // TODO 1: tolak sisi <= 0.
    }

    // TODO 2: lengkapi.
    public function luas(): float     { return $this->sisi * $this->sisi; }
    public function keliling(): float { return 4 * $this->sisi; }
}

class Segitiga extends BangunDatar
{
    public function __construct(private readonly float $a, private readonly float $b, private readonly float $c)
    {
        parent::__construct('Segitiga');
        // TODO 1: tolak bila a,b,c tidak membentuk segitiga.
        if ($a <= 0 || $b <= 0 || $c <= 0) {
            throw new InvalidArgumentException("Sisi harus > 0");
        }
        if ($a + $b <= $c || $a + $c <= $b || $b + $c <= $a) {
            throw new InvalidArgumentException("Sisi tidak membentuk segitiga");
        }
    }

    // TODO 2: lengkapi luas() dan keliling().
    public function luas(): float
    {
        $s = ($this->a + $this->b + $this->c) / 2;
        return sqrt($s * ($s - $this->a) * ($s - $this->b) * ($s - $this->c));
    }

    public function keliling(): float
    {
        return $this->a + $this->b + $this->c;
    }
}

class Trapesium extends BangunDatar
{
    public function __construct(private readonly float $a, private readonly float $b, private readonly float $c, private readonly float $d)
    {
        parent::__construct('Trapesium');
        // TODO 1: tolak bila a,b,c,d tidak membentuk trapesium.
        if ($a <= 0 || $b <= 0 || $c <= 0 || $d <= 0) {
            throw new InvalidArgumentException("Sisi harus > 0");
        }
        $selisihAlas = abs($a - $b);
        if ($selisihAlas === 0.0 || $c + $d <= $selisihAlas || abs($c - $d) >= $selisihAlas) {
            throw new InvalidArgumentException("Sisi tidak membentuk trapesium dengan tinggi positif");
        }
    }

    // TODO 2: lengkapi luas() dan keliling().
    public function luas(): float
    {
        // Menggunakan rumus luas trapesium: ((a + b) / 2) * tinggi
        // Untuk tinggi, kita bisa menggunakan rumus Heron untuk segitiga yang dibentuk oleh sisi miring.
        $s = ($this->c + $this->d + abs($this->a - $this->b)) / 2;
        $tinggi = (2 / abs($this->a - $this->b)) * sqrt($s * ($s - $this->c) * ($s - $this->d) * ($s - abs($this->a - $this->b)));
        return (($this->a + $this->b) / 2) * $tinggi;
    }

    public function keliling(): float
    {
        return $this->a + $this->b + $this->c + $this->d;
    }
}
// TODO Langkah 2: buat kelas Segitiga (tiga sisi, rumus Heron).
//                 Tolak konstruksi bila ketiga sisi tidak membentuk segitiga.
// TODO Langkah 4: buat kelas Trapesium.