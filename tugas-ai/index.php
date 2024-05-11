<?php

if (isset($_POST['cari'])) {
    if ($_POST['lokasiAwal'] != "Pilih Lokasi" && $_POST['lokasiTujuan'] != "Pilih Lokasi") {
        $lokasiAwal = $_POST['lokasiAwal'];
        $lokasiTujuan = $_POST['lokasiTujuan'];

        function bfs($graph, $start, $goal)
        {
            $queue = new SplQueue();
            $visited = array();
            $path = array();

            // Mulai dengan node awal
            $queue->enqueue($start);
            $visited[$start] = true;

            // Selama antrian tidak kosong
            while (!$queue->isEmpty()) {
                // Ambil node dari depan antrian
                $node = $queue->dequeue();

                // Jika kita telah mencapai node tujuan, selesai
                if ($node === $goal) {
                    // Bangun jalur dari node tujuan ke node awal
                    for ($i = $goal; $i !== $start; $i = $path[$i]) {
                        $shortestPath[] = $i;
                    }
                    $shortestPath[] = $start;
                    // Balik jalur untuk mendapatkan urutan yang benar
                    $shortestPath = array_reverse($shortestPath);
                    return $shortestPath;
                }

                // Periksa semua tetangga node saat ini
                foreach ($graph[$node] as $neighbor => $value) {
                    if (!isset($visited[$neighbor]) || !$visited[$neighbor]) {
                        // Tandai tetangga sebagai telah dikunjungi
                        $visited[$neighbor] = true;
                        // Tambahkan tetangga ke antrian
                        $queue->enqueue($neighbor);
                        // Simpan jalur dari node awal ke tetangga
                        $path[$neighbor] = $node;
                    }
                }
            }

            // Jika tidak ada jalur yang ditemukan
            return null;
        }

        // Contoh graf dalam representasi matriks
        $graph = [
            'Merak' => array('Anyer' => 1, 'Cilegon' => 1),
            'Cilegon' => array('Merak' => 1, 'Anyer' => 1, 'Serang' => 1),
            'Serang' => array('Cilegon' => 1, 'Baros' => 1, 'Petir' => 1, 'Keragilan' => 1),
            'Anyer' => array('Merak' => 1, 'Cilegon' => 1, 'Baros' => 1, 'Labuan' => 1),
            'Labuan' => array('Anyer' => 1, 'Saketi' => 1),
            'Baros' => array('Anyer' => 1, 'Pandeglang' => 1, 'Petir' => 1, 'Serang' => 1),
            'Petir' => array('Serang' => 1, 'Baros' => 1, 'Rangkas Bitung' => 1, 'Keragilan' => 1),
            'Keragilan' => array('Serang' => 1, 'Petir' => 1, 'Rangkas Bitung' => 1, 'Cikande' => 1),
            'Cikande' => array('Keragilan' => 1, 'Rangkas Bitung' => 1, 'Tangerang' => 1),
            'Pandeglang' => array('Baros' => 1, 'Saketi' => 1, 'Rangkas Bitung' => 1),
            'Rangkas Bitung' => array('Petir' => 1, 'Pandeglang' => 1, 'Gunung Kencana' => 1, 'Jasinga' => 1, 'Cikande' => 1,  'Keragilan' => 1),
            'Tangerang' => array('Cikande' => 1, 'Parung Panjang' => 1),
            'Parung Panjang' => array('Tangerang' => 1, 'Jasinga' => 1),
            'Jasinga' => array('Rangkas Bitung' => 1, 'Citorek' => 1, 'Parung Panjang' => 1),
            'Saketi' => array('Labuan' => 1, 'Picung' => 1, 'Pandeglang' => 1),
            'Picung' => array('Saketi' => 1, 'Gunung Kencana' => 1, 'Malingping' => 1),
            'Gunung Kencana' => array('Rangkas Bitung' => 1, 'Picung' => 1, 'Malingping' => 1),
            'Citorek' => array('Jasinga' => 1, 'Sawarna' => 1),
            'Malingping' => array('Picung' => 1, 'Gunung Kencana' => 1, 'Sawarna' => 1),
            'Sawarna' => array('Malingping' => 1, 'Citorek' => 1)
        ];

        $shortestPath = bfs($graph, $lokasiAwal, $lokasiTujuan);

        // Informasi jarak antara setiap pasangan node
        $distances = array(
            'Merak' => array('Anyer' => 25, 'Cilegon' => 14),
            'Cilegon' => array('Merak' => 14, 'Anyer' => 17, 'Serang' => 18),
            'Serang' => array('Cilegon' => 18, 'Baros' => 12, 'Petir' => 16, 'Keragilan' => 17),
            'Anyer' => array('Merak' => 25, 'Cilegon' => 17, 'Baros' => 40, 'Labuan' => 44),
            'Labuan' => array('Anyer' => 44, 'Saketi' => 22),
            'Baros' => array('Anyer' => 40, 'Pandeglang' => 15, 'Petir' => 9, 'Serang' => 12),
            'Petir' => array('Serang' => 16, 'Baros' => 9, 'Rangkas Bitung' => 20, 'Keragilan' => 16),
            'Keragilan' => array('Serang' => 17, 'Petir' => 16, 'Rangkas Bitung' => 30, 'Cikande' => 12),
            'Cikande' => array('Keragilan' => 12, 'Rangkas Bitung' => 29, 'Tangerang' => 42),
            'Pandeglang' => array('Baros' => 15, 'Saketi' => 20, 'Rangkas Bitung' => 20),
            'Rangkas Bitung' => array('Petir' => 20, 'Pandeglang' => 20, 'Gunung Kencana' => 46, 'Jasinga' => 35, 'Cikande' => 29,  'Keragilan' => 30),
            'Tangerang' => array('Cikande' => 42, 'Parung Panjang' => 24),
            'Parung Panjang' => array('Tangerang' => 24, 'Jasinga' => 25),
            'Jasinga' => array('Rangkas Bitung' => 35, 'Citorek' => 45, 'Parung Panjang' => 25),
            'Saketi' => array('Labuan' => 22, 'Picung' => 16, 'Pandeglang' => 20),
            'Picung' => array('Saketi' => 16, 'Gunung Kencana' => 17, 'Malingping' => 43),
            'Gunung Kencana' => array('Rangkas Bitung' => 46, 'Picung' => 17, 'Malingping' => 35),
            'Citorek' => array('Jasinga' => 45, 'Sawarna' => 60),
            'Malingping' => array('Picung' => 43, 'Gunung Kencana' => 35, 'Sawarna' => 49),
            'Sawarna' => array('Malingping' => 49, 'Citorek' => 60)
        );

        // Ambil jarak antara node-node yang terpilih oleh algoritma BFS
        $totalDistance = 0;
        $totalWaktu = 0;
        $selectedDistances = array();
        foreach ($shortestPath as $index => $node) {
            if ($index < count($shortestPath) - 1) {
                $nextNode = $shortestPath[$index + 1];
                if (isset($distances[$node][$nextNode])) {
                    $selectedDistances[$node][$nextNode] = $distances[$node][$nextNode];
                    $totalDistance += $distances[$node][$nextNode];
                }
            }
        }
        // estimasi waktu
        $totalWaktu = $totalDistance / 50;
    } else {
        echo "<script>alert('Masukkan Lokasi Yang Sesuai');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lilita+One&family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="script.js"></script>
    <link rel="icon" type="image/x-icon" href="https://em-content.zobj.net/source/microsoft-teams/363/large-purple-circle_1f7e3.png">
    <title>Program BFS PHP</title>
    <style>
        .container {
            padding: 30px;
            background-color: #e8e8e8;
        }

        .navbar-brand {
            font-family: 'Lilita One', sans-serif;
            font-weight: 400;
            font-size: 30px;
            color: white;
        }
    </style>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-light">
        <div class="container-fluid justify-content-center" style="width: 720px; background-color:#9947c9; height:50px;">
            <span class="navbar-brand mb-0">Program Searching BREADTH FIRST SEACH</span>
        </div>
    </nav>
    <div class="container" style="border: 3px solid #9947c9;height:980px; width: 720px;">
        <form action="" method="post">
            <div class="form-label">Silahkan Pilih Lokasi Awal (INITIAL STATE)</div>
            <!-- Split dropend button -->
            <div class="btn-group dropend mb-5">
                <input type="text" class="btn btn-secondary width-6 btn-pertama text-start" style="width: 320px;" name="lokasiAwal" value="Pilih Lokasi">
                <button type="button" class="btn btn-secondary dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false">
                    <span class="visually-hidden">Toggle Dropend</span>
                </button>
                <ul class="dropdown-menu">
                    <!-- Dropdown menu links -->
                    <li><a class="item1 dropdown-item" href="#">Merak</a></li>
                    <li><a class="item1 dropdown-item" href="#">Cilegon</a></li>
                    <li><a class="item1 dropdown-item" href="#">Anyer</a></li>
                    <li><a class="item1 dropdown-item" href="#">Serang</a></li>
                    <li><a class="item1 dropdown-item" href="#">Keragilan</a></li>
                    <li><a class="item1 dropdown-item" href="#">Cikande</a></li>
                    <li><a class="item1 dropdown-item" href="#">Tangerang</a></li>
                    <li><a class="item1 dropdown-item" href="#">Baros</a></li>
                    <li><a class="item1 dropdown-item" href="#">Petir</a></li>
                    <li><a class="item1 dropdown-item" href="#">Rangkas Bitung</a></li>
                    <li><a class="item1 dropdown-item" href="#">Pandeglang</a></li>
                    <li><a class="item1 dropdown-item" href="#">Parung Panjang</a></li>
                    <li><a class="item1 dropdown-item" href="#">Jasinga</a></li>
                    <li><a class="item1 dropdown-item" href="#">Labuan</a></li>
                    <li><a class="item1 dropdown-item" href="#">Saketi</a></li>
                    <li><a class="item1 dropdown-item" href="#">Picung</a></li>
                    <li><a class="item1 dropdown-item" href="#">Gunung Kencana</a></li>
                    <li><a class="item1 dropdown-item" href="#">Citorek</a></li>
                    <li><a class="item1 dropdown-item" href="#">Malingping</a></li>
                    <li><a class="item1 dropdown-item" href="#">Sawarna</a></li>
                </ul>
            </div>

            <div class="form-label">Silahkan Pilih Lokasi Tujuan (GOAL STATE)</div>
            <!-- Split dropend button -->
            <div class="btn-group dropend">
                <input type="text" class="btn btn-secondary width-6 btn-kedua text-start" style="width: 320px;" name="lokasiTujuan" value="Pilih Lokasi">
                <button type="button" class="btn btn-secondary dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false">
                    <span class="visually-hidden">Toggle Dropend</span>
                </button>
                <ul class="dropdown-menu">
                    <!-- Dropdown menu links -->
                    <li><a class="item2 dropdown-item" href="#">Merak</a></li>
                    <li><a class="item2 dropdown-item" href="#">Cilegon</a></li>
                    <li><a class="item2 dropdown-item" href="#">Anyer</a></li>
                    <li><a class="item2 dropdown-item" href="#">Serang</a></li>
                    <li><a class="item2 dropdown-item" href="#">Keragilan</a></li>
                    <li><a class="item2 dropdown-item" href="#">Cikande</a></li>
                    <li><a class="item2 dropdown-item" href="#">Tangerang</a></li>
                    <li><a class="item2 dropdown-item" href="#">Baros</a></li>
                    <li><a class="item2 dropdown-item" href="#">Petir</a></li>
                    <li><a class="item2 dropdown-item" href="#">Rangkas Bitung</a></li>
                    <li><a class="item2 dropdown-item" href="#">Pandeglang</a></li>
                    <li><a class="item2 dropdown-item" href="#">Parung Panjang</a></li>
                    <li><a class="item2 dropdown-item" href="#">Jasinga</a></li>
                    <li><a class="item2 dropdown-item" href="#">Labuan</a></li>
                    <li><a class="item2 dropdown-item" href="#">Saketi</a></li>
                    <li><a class="item2 dropdown-item" href="#">Picung</a></li>
                    <li><a class="item2 dropdown-item" href="#">Gunung Kencana</a></li>
                    <li><a class="item2 dropdown-item" href="#">Citorek</a></li>
                    <li><a class="item2 dropdown-item" href="#">Malingping</a></li>
                    <li><a class="item2 dropdown-item" href="#">Sawarna</a></li>
                </ul>
            </div>
            <button type="submit" class="btn btn-success" name="cari">Cari Jalur</button>
        </form>
        <div class="hasil mt-4 border border-3 border-success p-1" style="height: 700px;">
            <?php
            if (isset($_POST['cari']) && $_POST['lokasiAwal'] != 'Pilih Lokasi' && $_POST['lokasiTujuan'] != 'Pilih Lokasi') {
                if ($_POST['lokasiAwal'] === $_POST['lokasiTujuan']) {
                    echo "<script>alert('lokasi tidak boleh sama');</script>";
                } else {
            ?>
                    <h1 class="text-center border-bottom border-2 border-success pb-2" style="font-size: 30px;">Jalur Dari <?= $_POST['lokasiAwal'] ?> Ke <?= $_POST['lokasiTujuan'] ?> </h1>
            <?php
                }
            }
            ?>
            <?php
            if (@$shortestPath && $lokasiAwal != $lokasiTujuan) {
            ?>
                <h4 class="py-3" style="font-family: 'Poppins', sans-serif;font-weight:300;"><?= implode('  ->  ', $shortestPath); ?></h4>

                <?php
                // Iterasi melalui setiap node yang terpilih
                foreach ($selectedDistances as $node => $neighbors) {
                    //Iterasi melalui setiap node tetangga yang terpilih
                    foreach ($neighbors as $neighbor => $distance) {
                        echo "<p style='margin-bottom:0px; font-weight:500;'>$node -> <strong class='text-primary'>$distance KM</strong> -> $neighbor</p>";
                    }
                }
                ?>

                <h4 class="pt-3" style="font-family: 'Poppins', sans-serif;font-weight:300;">Estimasi Total Jarak yang ditempuh : <span class="text-primary fw-bold"><?= $totalDistance ?> KM</span></h4>
                <p class="p" style="font-family: 'Poppins', sans-serif;font-weight:300;">Estimasi Waktu dengan kecepatan rata-rata 50km/j : <span class="text-primary fw-bold"><?= $totalWaktu ?> JAM</span></p>

                <div class="justify-content-center"><img src="images/<?= $lokasiAwal ?>-<?= $lokasiTujuan ?>.jpg" alt="Map" width="450" style="display:block;margin-left:auto;margin-right:auto;"></div>
            <?php
            }
            ?>
        </div>
    </div>
</body>

</html>