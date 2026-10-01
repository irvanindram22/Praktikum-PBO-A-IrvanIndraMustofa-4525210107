public class Segitiga extends BangunDatar {

    private final double A;
    private final double B;
    private final double C;

    public Segitiga(double A, double B, double C) {
        super("Segitiga");
        if (A <= 0 || B <= 0 || C <= 0) {
            throw new IllegalArgumentException("Sisi harus > 0");
        }

        if (A + B <= C || A + C <= B || B + C <= A) {
            throw new IllegalArgumentException("Sisi tidak memenuhi ketentuan segitiga");
        }

        this.A = A;
        this.B = B;
        this.C = C;
    }

    @Override
    public double luas() {
        double s = (A + B + C) / 2;
        return Math.sqrt(s * (s - A) * (s - B) * (s - C))   ;
    }

    @Override
    public double keliling() {
        return A + B + C;
    }
}