public class Tugas1 {
    public static void main(String[] args) {
        for (var i = 1; i <= 10; i++) {
            luasSegitiga(i, i + 1);
        }

        boolean kondisi = true;
        int a = 1;
        while (kondisi) {
            luasSegitiga(a, a + 1);
            a++;
            if (a > 10) {
                kondisi = false;
            }
        }
    }

    public static void luasSegitiga(double alas, double tinggi) {
        var hasil = 0.5 * alas * tinggi;
        System.out.println("Luas Segitiga dari alas " + alas + " & tinggi " + tinggi + " hasilnya adalah = " + hasil);
    }
}
