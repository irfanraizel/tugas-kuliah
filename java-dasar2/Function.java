public class Function {
    public static void main(String[] args) {
        //teks(20,5);
        segitiga(20,20);

        Function2 kelas_sebelah = new Function2();
        kelas_sebelah.luas_segitiga(20, 20);

        Function3 kelasFunction3 = new Function3();
        kelasFunction3.luasLingkaran(50);

    }
    // public static void teks(double angka1, double angka2) {
    //     System.out.println(angka1+" "+angka2);
    // }

    public static void segitiga(double alas, double tinggi) {
        double hasil = alas*tinggi/2;
        System.out.println("Luas Segitiga dalam 1 class = "+hasil);
    }
}
