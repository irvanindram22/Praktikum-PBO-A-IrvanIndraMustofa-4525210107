public class PegawaiHarian extends Pegawai {

    private final int hariKerja;

    public PegawaiHarian(String nip, String nama, double gajiPokok, int hariKerja) {
        super(nip, nama, gajiPokok);
        this.hariKerja = hariKerja;
    }

    // TODO 2: pegawai kontrak TIDAK mendapat tunjangan masa kerja.
    //         Apakah method hitungGaji() perlu di-override di sini?
    //         Pikirkan dulu, lalu tuliskan alasannya di catatan.md.

    @Override
    public double hitungGaji() {
        return super.hitungGaji() * this.hariKerja;
    }
    
    @Override
    public String jenis() {
        return "HARIAN";
    }
}
    