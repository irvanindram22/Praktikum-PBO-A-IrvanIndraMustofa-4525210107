public class Lingkaran extends BangunDatar {

    private final double jariJari;

    public Lingkaran(double jariJari) {
        super("Lingkaran");
        // TODO 1: tolak jari-jari <= 0.
        if (jariJari <= 0) {
            throw new IllegalArgumentException("Jari-jari harus > 0");
        }
        this.jariJari = jariJari;
    }

    // TODO 2: lengkapi luas() dan keliling().
    //         Gunakan Math.PI, bukan angka 3.14.
    @Override 
    public double luas()     { 
        return Math.PI * Math.pow(this.jariJari, 2); }
   
    @Override 
    public double keliling() { 
        double d = 2 * Math.PI * this.jariJari;
        return Math.PI * d; }

    public double getJariJari() { return jariJari; }
}
