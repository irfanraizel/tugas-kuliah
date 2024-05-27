import javax.swing.JOptionPane;
public class App {
    public static void main(String[] args) throws Exception {
        String nama = JOptionPane.showInputDialog(null, "Hello! Siapakah nama kamu?");
        if(nama != null && !nama.isEmpty()) {
            // Validasi 1 tebak tanggal
            int konfirmasi1 = JOptionPane.showConfirmDialog(null, "Halo " + nama +"\n\n1   3   5   7\n9   11   13   15\n17   19   21   23\n 25   27   29   31\n\n Apakah ada tanggal lahir kamu diatas?");
            if(konfirmasi1 == JOptionPane.YES_OPTION) {
                konfirmasi1 = 1;
            } else if(konfirmasi1 == JOptionPane.NO_OPTION) {
                konfirmasi1 = 0;
            } else {
                JOptionPane.showMessageDialog(null, "Good Bye!!");
                System.exit(0);
            }

            // Validasi 2 tebak tanggal
            int konfirmasi2 = JOptionPane.showConfirmDialog(null, "Halo " + nama +"\n\n2   3   6   7\n10   11   14   15\n18   19   22   23\n26   27   30   31\n\n Apakah ada tanggal lahir kamu diatas?");
            if(konfirmasi2 == JOptionPane.YES_OPTION) {
                konfirmasi2 = 2;
            } else if(konfirmasi2 == JOptionPane.NO_OPTION) {
                konfirmasi2 = 0;
            } else {
                JOptionPane.showMessageDialog(null, "Good Bye!!");
                System.exit(0);
            }

            // Validasi 3 tebak tanggal
            int konfirmasi3 = JOptionPane.showConfirmDialog(null, "Halo " + nama +"\n\n4   5   6   7\n12   13   14   15\n20   21   22   23\n28   29   30   31\n\n Apakah ada tanggal lahir kamu diatas?");
            if(konfirmasi3 == JOptionPane.YES_OPTION) {
                konfirmasi3 = 4;
            } else if(konfirmasi3 == JOptionPane.NO_OPTION) {
                konfirmasi3 = 0;
            } else {
                JOptionPane.showMessageDialog(null, "Good Bye!!");
                System.exit(0);
            }

            // Validasi 4 tebak tanggal
            int konfirmasi4 = JOptionPane.showConfirmDialog(null, "Halo " + nama +"\n\n8   9   10   11\n12   13   14   15\n24   25   26   27\n28   29   30   31\n\n Apakah ada tanggal lahir kamu diatas?");
            if(konfirmasi4 == JOptionPane.YES_OPTION) {
                konfirmasi4 = 8;
            } else if(konfirmasi4 == JOptionPane.NO_OPTION) {
                konfirmasi4 = 0;
            } else {
                JOptionPane.showMessageDialog(null, "Good Bye!!");
                System.exit(0);
            }

            // Validasi 5 tebak tanggal
            int konfirmasi5 = JOptionPane.showConfirmDialog(null, "Halo " + nama +"\n\n16   17   18   19\n20   21   22   23\n24   25   26   27\n28   29   30   31\n\n Apakah ada tanggal lahir kamu diatas?");
            if(konfirmasi5 == JOptionPane.YES_OPTION) {
                konfirmasi5 = 16;
            } else if(konfirmasi5 == JOptionPane.NO_OPTION) {
                konfirmasi5 = 0;
            } else {
                JOptionPane.showMessageDialog(null, "Good Bye!!");
                System.exit(0);
            }

            // Hasil dari tebak tanggal
            int hasil = konfirmasi1 + konfirmasi2 + konfirmasi3 + konfirmasi4 + konfirmasi5;
            JOptionPane.showMessageDialog(null, "Halo "+ nama + "\nTanggal lahir kamu adalah " + hasil);
            System.out.println("tanggal lahir kamu adalah " + hasil);
        } else {
            System.exit(0);
        }
    }
}

