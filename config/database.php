<?php
// deklarasi parameter koneksi database


// koneksi database
$mysqli = new mysqli("localhost","root","","i_persediaan");

// cek koneksi
if ($mysqli->connect_error) {
    die('Koneksi Database Gagal : '.$mysqli->connect_error);
}
?>