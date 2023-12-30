<?php
    $host = 'localhost';
    $db = 'school_apps';
    $user = 'root';
    $password = 'password';

    // Membuat koneksi
    $koneksi = mysqli_connect($host, $user, $password, $db);

    // Memeriksa koneksi
    if (!$koneksi) {
        die("Koneksi Database Gagal: " . mysqli_connect_error());
    }

    echo "<script>console.log('Koneksi Database Berhasil')</script>";

?>
