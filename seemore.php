<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pesan dengan Baca Selengkapnya</title>
</head>
<body>

<?php
    // Pesan panjang
    $pesan_panjang = "Ini adalah pesan yang sangat panjang dan ingin ditampilkan secara singkat.";

    // Fungsi untuk menambahkan Baca Selengkapnya
    function tambahkan_baca_selengkapnya($teks, $panjang_maks = 50) {
        if (strlen($teks) <= $panjang_maks) {
            return $teks;
        } else {
            $potongan_teks = substr($teks, 0, $panjang_maks);
            return "$potongan_teks... <a href='#'>Baca Selengkapnya</a>";
        }
    }

    // Tampilkan pesan dengan Baca Selengkapnya
    echo "<p>" . tambahkan_baca_selengkapnya($pesan_panjang) . "</p>";
?>

</body>
</html>
