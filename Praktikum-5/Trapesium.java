public class Trapesium extends BangunDatar {
    private final double alas;
    private final double atas;
    private final double tinggi;
    private final double sisiMiring;

    public Trapesium(double alas, double atas, double tinggi, double sisiMiring) {
        super("Trapesium");
        this.alas = alas;
        this.atas = atas;
        this.tinggi = tinggi;
        this.sisiMiring = sisiMiring;
        if (alas <= 0 || atas <= 0 || tinggi <= 0 || sisiMiring <= 0) {
            throw new IllegalArgumentException("Semua sisi dan tinggi harus <= 0");
        }
    }
    
    @Override
    public double luas() {
        return 0.5 * (alas + atas) * tinggi;
    }

    @Override
    public double keliling() {
        return alas + atas + 2 * sisiMiring;
    }
}
    