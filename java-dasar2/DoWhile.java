public class DoWhile {
    public static void main(String[] args) {
        int a =0;
        boolean kondisi = true;

        do {
            a++;
            System.out.println("Ini pengulangan ke " + a);
            if(a == 10){
                kondisi = false;
            }
        } while (kondisi);
    }
}