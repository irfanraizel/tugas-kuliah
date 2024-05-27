import javax.swing.JOptionPane;
public class LatihanPercabangan {
    public static void main(String[] args) {
        String inputNilai = JOptionPane.showInputDialog("Masukkan Nilai : ");
        String inputAbsen = JOptionPane.showInputDialog("Masukkan Absen : ");

        int nilai = Integer.parseInt(inputNilai);
        int absen = Integer.parseInt(inputAbsen);

        if(absen < 10 && nilai < 70) {
            JOptionPane.showMessageDialog(null, "Kamu tidak lulus");
        } else {
            JOptionPane.showMessageDialog(null, "Kamu Lulus");
        }
    }
}
