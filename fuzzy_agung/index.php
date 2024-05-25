<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poetsen+One&display=swap" rel="stylesheet">
  <!-- bootstrap cdn -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
  <!-- JQuery -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <!-- sweetalert -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.11.0/dist/sweetalert2.all.min.js"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.11.0/dist/sweetalert2.min.css">
  <title>Fuzzy Logic Kematangan Melon</title>
  <link rel="stylesheet" href="styles.css" />
  <style>
    body {
      background-color: #222831;
    }

    .color-box {
      width: 20px;
      height: 20px;
      display: inline-block;
      margin-right: 10px;
    }
  </style>
</head>

<body>
  <?php
  include "fuzzylogic.php";

  if (isset($_POST['submit'])) {
    if (empty($_POST['value-warna']) || empty($_POST['tekstur'])) {
  ?>
      <script>
        Swal.fire({
          title: "Form tidak boleh kosong!",
          text: "Silahkan isi nilai input terlebih dahulu!",
          icon: "error"
        });
      </script>
  <?php
    } else {
      $warna = intval($_POST['value-warna']);
      $tekstur = intval($_POST['tekstur']);

      $kematangan = new FuzzyLogic($warna, $tekstur);
      $persentaseKematangan = $kematangan->getMatang();

      $hasil = "";
      if ($persentaseKematangan <= 40) {
        $hasil = "Mentah";
      } elseif ($persentaseKematangan > 40 && $persentaseKematangan < 90) {
        $hasil = "Setengah Matang";
      } elseif ($persentaseKematangan >= 90 && $persentaseKematangan <= 100) {
        $hasil = "Matang Sempurna";
      } else {
        $hasil = "Busuk";
      }
    }
  }

  ?>
  <h1 class="text-center text-light mx-auto fw-bolder" style="width: 50%;font-family:'Poetsen One', sans-serif;background-color:#3d7fa6;">DETEKSI KEMATANGAN BUAH MELON</h1>
  <!-- container -->
  <div class="container border border-primary" style="height:720px;background-color:#76ABAE; width:50%;">
    <?php if (isset($_POST['submit']) && !empty($_POST['value-warna']) && !empty($_POST['tekstur'])) {
    ?>
      <script>
        Swal.fire({
          title: "Melon ini <b><?= @$hasil ?></b> <br>Dengan Persentase Kematangan <b><?= @$persentaseKematangan ?>%</b>",
          text: "You clicked the button!",
          icon: "success"
        });
      </script>
    <?php
    } ?>
    <div class="d-flex justify-content-between">
      <div class="mt-5 p-4 rounded" style="background-color:#333f42;box-shadow: -6px 10px 11px -9px rgba(0,0,0,0.75);
-webkit-box-shadow: -6px 10px 11px -9px rgba(0,0,0,0.75);
-moz-box-shadow: -6px 10px 11px -9px rgba(0,0,0,0.75);">
        <!-- form -->
        <form action="" method="post">
          <div class="dropdown">
            <h4 class="fw-bolder text-light">Pilih Warna Melon Dibawah</h4>
            <input type="text" class="visually-hidden" name="value-warna" id="value-warna" value="">
            <input type="button" class="btn btn-light btn-group dropend mb-5" href="#" data-bs-toggle="dropdown" aria-expanded="false" value="" id="warna" name="warna" style="width: 300px;">
            <ul class="drop-menu1 dropdown-menu" aria-labelledby="dropdownMenuButton">
              <li class="px-3 py-3" value="1"><a class="drop1 dropdown-item" href="#" style="background-color: #21963c;height:30px;">
                </a></li>
              <li class="px-3 py-3" value="2"><a class="drop1 dropdown-item" href="#" style="background-color: #3e9621;height:30px;">
                </a></li>
              <li class="px-3 py-3" value="3"><a class="drop1 dropdown-item" href="#" style="background-color: #8ec234;height:30px;">
                </a></li>
              <li class="px-3 py-3" value="4"><a class="drop1 dropdown-item" href="#" style="background-color: #d1cc2c;height:30px;">
                </a></li>
              <li class="px-3 py-3" value="5"><a class="drop1 dropdown-item" href="#" style="background-color: #d1bb2c;height:30px;">
                </a></li>
              <li class="px-3 py-3" value="6"><a class="drop1 dropdown-item" href="#" style="background-color: #d1b32c;height:30px;">
                </a></li>
              <li class="px-3 py-3" value="7"><a class="drop1 dropdown-item" href="#" style="background-color: #e3af2b;height:30px;">
                </a></li>
              <li class="px-3 py-3" value="8"><a class="drop1 dropdown-item" href="#" style="background-color: #e3a62b;height:30px;">
                </a></li>
              <li class="px-3 py-3" value="9"><a class="drop1 dropdown-item" href="#" style="background-color: #a1672d;height:30px;">
                </a></li>
              <li class="px-3 py-3" value="10"><a class="drop1 dropdown-item" href="#" style="background-color: #7d4624;height:30px;">
                </a></li>
            </ul>
          </div>
          <!-- Example split danger button -->
          <h4 class="fw-bolder text-light">Masukkan Nilai Tekstur</h4>
          <div>
            <img src="img/barprogress.png" alt="" width="250px">
          </div>
          <div class="btn-group">
            <button type="button" class="btn btn-warning rounded-start" style="width:230px;font-family:'Roboto', sans-serif">Pilih Tekstur</button>
            <button type="button" class="btn btn-warning dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false">
              <span class="visually-hidden">Toggle Dropdown</span>
            </button>
            <ul class="drop-menu2 dropdown-menu">
              <li value="1"><a class="drop2 dropdown-item" href="#">1</a></li>
              <li value="2"><a class="drop2 dropdown-item" href="#">2</a></li>
              <li value="3"><a class="drop2 dropdown-item" href="#">3</a></li>
              <li value="4"><a class="drop2 dropdown-item" href="#">4</a></li>
              <li value="5"><a class="drop2 dropdown-item" href="#">5</a></li>
              <li value="6"><a class="drop2 dropdown-item" href="#">6</a></li>
              <li value="7"><a class="drop2 dropdown-item" href="#">7</a></li>
              <li value="8"><a class="drop2 dropdown-item" href="#">8</a></li>
              <li value="9"><a class="drop2 dropdown-item" href="#">9</a></li>
              <li value="10"><a class="drop2 dropdown-item" href="#">10</a></li>
            </ul>
            <input type="text" class="ms-4 text-center fw-bolder" name="tekstur" id="tekstur" style="width: 50px;" value="">
          </div>
          <div class="mt-4">
            <input type="submit" class="btn btn-primary float-end" style="width: 120px;" name="submit" value="Submit">
          </div>
        </form>
      </div>
      <div class="mt-5 ms-2">
        <section class="bg-secondary-emphasis p-3 rounded" style="background-color: #dbdbd9;box-shadow: -6px 10px 11px -9px rgba(0,0,0,0.75);
-webkit-box-shadow: -6px 10px 11px -9px rgba(0,0,0,0.75);
-moz-box-shadow: -6px 10px 11px -9px rgba(0,0,0,0.75);">
          <img src="img/melon.jpg" alt="" style="width: 50%;" class="rounded mb-2">
          <p><b>Melon </b><i>(Cucumis melo L.) </i>atau kerahi merupakan nama buah sekaligus tanaman yang menghasilkannya yang termasuk dalam suku labu-labuan atau Cucurbitaceae. Buahnya bisa dimakan segar sebagai buah meja atau diiris-iris sebagai campuran es buah. Bagian yang dimakan adalah daging buah (mesokarp). Teksturnya lunak, berwarna putih, kuning sampai merah, tergantung kultivarnya. Rasanya cenderung manis tawar</p>
        </section>
      </div>
    </div>

    <!-- carousel -->
    <style>
      .carousel {
        max-width: 25%;
        margin: auto;
        box-shadow: -6px 10px 11px -9px rgba(0, 0, 0, 0.75);
        -webkit-box-shadow: -6px 10px 11px -9px rgba(0, 0, 0, 0.75);
        -moz-box-shadow: -6px 10px 11px -9px rgba(0, 0, 0, 0.75);
      }

      .carousel-item img {
        width: 100%;
      }

      .carousel-control-prev,
      .carousel-control-next {
        width: 10%;
        /* Adjust width as needed */
      }

      .carousel-control-prev-icon,
      .carousel-control-next-icon {
        background-size: 100%, 100%;
        /* Adjust icon size as needed */
      }

      @media (max-width: 768px) {
        .carousel {
          max-width: 50%;
          /* Adjust for smaller screens if necessary */
        }
      }
    </style>

    <div id="carouselExample" class="carousel slide mt-4 float-end" style="max-width: 35%;">
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img src="https://www.astronauts.id/blog/wp-content/uploads/2023/02/Mengenal-Manfaat-Buah-Melon-1024x683.jpg" class="d-block w-100" alt="...">
        </div>
        <div class="carousel-item">
          <img src="https://d1vbn70lmn1nqe.cloudfront.net/prod/wp-content/uploads/2023/06/09043427/Kaya-Nutrisi-Ini-11-Manfaat-Buah-Melon-Jika-Rutin-Dikonsumsi-.jpg" class="d-block w-100" alt="...">
        </div>
        <div class="carousel-item">
          <img src="https://static.promediateknologi.id/crop/0x0:0x0/750x500/webp/photo/2023/06/12/jpg_20230612_133748_0000-455762351.jpg" class="d-block w-100" alt="...">
        </div>
        <div class="carousel-item">
          <img src="https://cdn.rri.co.id/berita/66/images/1707459700423-I/9enncd47h13xl0l.jpeg" class="d-block w-100" alt="...">
        </div>
      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>

  </div>

  <script>
    $(document).ready(function() {
      // Ketika sebuah item dropdown dipilih
      $('.drop-menu1 li').click(function() {
        // Ambil nilai dari atribut 'value' dari item yang dipilih
        var value = $(this).attr('value');
        // Setel nilai input dengan nilai yang dipilih dari dropdown
        $('#value-warna').val(value);
        // Ambil warna latar belakang dari item yang dipilih
        var backgroundColor = $(this).find('a').css('background-color');
        // Ubah warna latar belakang input
        $('#warna').css('background-color', backgroundColor);
      });

      // dropdown2
      $('.drop-menu2 li').click(function() {
        var value2 = $(this).attr('value');
        $('#tekstur').val(value2);
      })
    });
  </script>
</body>

</html>