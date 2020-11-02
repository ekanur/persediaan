<?php
session_start();

// Panggil koneksi database.php untuk koneksi database
require_once "../../config/database.php";

// fungsi untuk pengecekan status login user 
// jika user belum login, alihkan ke halaman login dan tampilkan pesan = 1
// echo "asd";exit;
if (empty($_SESSION['username']) && empty($_SESSION['password'])) {
    echo "<meta http-equiv='refresh' content='0; url=index.php?alert=1'>";
}
// jika user sudah login, maka jalankan perintah untuk insert, update, dan delete
else {
    if ($_GET['act'] == 'insert') {
        if (isset($_POST['ajukan'])) {
            // ambil data hasil submit dari form
            $id_barang    = mysqli_real_escape_string($mysqli, trim($_POST['id_barang']));
            $id_user  = mysqli_real_escape_string($mysqli, trim($_POST['id_user']));
            $jumlah     = mysqli_real_escape_string($mysqli, trim($_POST['jumlah']));
            $alasan    = mysqli_real_escape_string($mysqli, trim($_POST['alasan']));
            $tanggal_pengajuan  = mysqli_real_escape_string($mysqli, trim($_POST['tanggal']));
            $nama_satuan  = mysqli_real_escape_string($mysqli, trim($_POST['satuan']));

            // perintah query untuk menyimpan data ke tabel barang
            $query = mysqli_query($mysqli, "INSERT INTO pengajuan(id_barang,id_user,jumlah,alasan,tanggal_pengajuan,nama_satuan) 
                                            VALUES('$id_barang','$id_user','$jumlah','$alasan','$tanggal_pengajuan','$nama_satuan')")
                or die('Ada kesalahan pada query insert : ' . mysqli_error($mysqli));

            // cek query
            if ($query) {
                // jika berhasil tampilkan pesan berhasil simpan data
                header("location: ../../main.php?module=pengajuan&alert=1");
            }
        }
    }
}
?>