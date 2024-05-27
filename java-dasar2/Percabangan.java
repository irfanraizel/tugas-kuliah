import javax.swing.JOptionPane;
public class Percabangan {
    public static void main(String[] args) {
        String inputan = JOptionPane.showInputDialog("Masukkan Nilai : ");
        int ubah = Integer.parseInt(inputan);
        if(ubah > 60) {
            JOptionPane.showMessageDialog(null, "Kamu lulus !");
        } else {
            JOptionPane.showMessageDialog(null, "Kamu tidak lulus");
        }
    }
}
