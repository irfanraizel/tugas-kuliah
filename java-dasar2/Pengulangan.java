public class Pengulangan {
    public static void main(String[] args) {
        // Pengulangan / Looping
        // for
        int i;
        String b;
        for(i=0; i<=10; i++) {
            if(i % 2 == 0){
                b = "Genap";
            } else {
                b = "Ganjil";
            }
            System.out.println("Ini pengulangan " + b +" ke = "+ i);
        }


        // another way
        int a;
        for(a=0; a<=10; a++) {
            int cek_genap = a % 2;
            if(cek_genap == 0) {
                // System.out.println("Ini pengulangan ke "+ a +" Angka Genap");
                // continue untuk melewati statement ini
                continue;
            } else {
                System.out.println("Ini pengulangan ke "+ a +" Angka Ganjil");
            }
            
        }

        // while
        int z = 0;
        while(z <= 10) {
            System.out.println("Ini loop ke : " +z);
            z++;
        }

        int p = 0;
        boolean kondisi = true;
        while (kondisi) {
            System.out.println("aaaa");
            p++;

            if(p == 10) {
                kondisi = false;
            }
        }

    }
}
