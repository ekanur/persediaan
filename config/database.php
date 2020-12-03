<?php
// deklarasi parameter koneksi database


// koneksi database
$mysqli = new mysqli("localhost","pma","123","i_persediaan");

// cek koneksi
if ($mysqli->connect_error) {
    die('Koneksi Database Gagal : '.$mysqli->connect_error);
}
?>