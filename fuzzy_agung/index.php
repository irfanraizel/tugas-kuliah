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
  <!-- bootstrap cdn -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
  <!-- JQuery -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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
  <h1 class="text-center bg-info text-light mx-auto" style="width: 1320px;">DETEKSI KEMATANGAN BUAH MELON</h1>
  <!-- container -->
  <div class="container border border-primary" style="height:720px;background-color:#76ABAE;">
    <div class="container mt-5">
      <!-- form -->
      <form action="fuzzy.php" method="post">
        <div class="dropdown">
          <h4>Pilih Warna Melon Dibawah</h4>
          <input type="text" class="visually-hidden" name="value-warna" id="value-warna" value="">
          <input type="button" class="btn btn-secondary btn-group dropend mb-5" href="#" data-bs-toggle="dropdown" aria-expanded="false" value="" id="warna" name="warna" style="width: 300px;">
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
        <h4>Masukkan Nilai Tekstur</h4>
        <h5>( Keras-----Sedang-----Lembut )</h5>
        <h4>( 1---------5----------10 )</h4>
        <div class="btn-group">
          <button type="button" class="btn btn-warning rounded-start">Pilih Tekstur</button>
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
          <input type="submit" class="btn btn-primary" name="submit" value="Submit">
        </div>
      </form>
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