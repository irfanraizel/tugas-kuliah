<?php
if (isset($_POST['submit'])) {
    $warna = intval($_POST['value-warna']);
    $tekstur = intval($_POST['tekstur']);
}

$warna_1 = 1;
// fungsi keanggotaan warna
// function hijau()
// {
// }
$fuzzy_warna_hijau = 0;
if ($warna == 1) {
    $fuzzy_warna_hijau = 1;
    return $fuzzy_warna_hijau;
} elseif ($warna > 1 && $warna <= 4) {
    $fuzzy_warna_hijau = (4 - $warna) / 3;
    return $fuzzy_warna_hijau;
} else {
    $fuzzy_warna_hijau = 0;
    return $fuzzy_warna_hijau;
}

echo $fuzzy_warna_hijau;
