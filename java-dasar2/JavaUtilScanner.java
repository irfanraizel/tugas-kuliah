import java.util.Scanner;
public class JavaUtilScanner {
    public static void main(String[] args) {
        Scanner userInput = new Scanner(System.in);
        int panjang, lebar, luas;
        // Membuat perhitungan menghitung luas persegi panjang
        // luas = panjang * lebar

        System.out.println("MENGHITUNG LUAS");
        System.out.print("panjang = ");
        panjang = userInput.nextInt();
        System.out.print("lebar = ");
        lebar = userInput.nextInt();

        luas = panjang * lebar;
        System.out.println("Luas = " + luas);      
        userInput.close();
    }
}