public class Dosen extends PegawaiTetap {
    private double tunjanganFungsional;

    public Dosen(String nip, String nama, double gajiPokok, int masaKerja, double tunjanganFungsional) {
        super(nip, nama, gajiPokok, masaKerja);

        this.tunjanganFungsional = tunjanganFungsional;
    }


    @Override
    public double hitungGaji(){
        return super.hitungGaji() + this.tunjanganFungsional;
    }

    @Override
    public String jenis(){
        return "DOSEN";
    }

    protected int getMasaKerjaTahunan(){
        return super.getMasaKerjaTahun();
    }
}