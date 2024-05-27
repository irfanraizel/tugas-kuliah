import javax.swing.JOptionPane;

public class joption {
    public static void main(String[] args) {
        String Panjang = JOptionPane.showInputDialog("Masukan Nilai Panjang ( dalam CM )");  
        String tinggi = JOptionPane.showInputDialog("Masukan Nilai Tinggi ( dalam CM )");
        String Lebar = JOptionPane.showInputDialog("Masukan Nilai Tinggi ( dalam CM )");
        Double volume = Double.parseDouble(Panjang)*Double.parseDouble(Lebar)*Double.parseDouble(tinggi);
        JOptionPane.showMessageDialog(null,"Volume Persegi: " + volume + "CM" );

    }
}