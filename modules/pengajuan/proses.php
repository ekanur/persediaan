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
            $nama_satuan  = mysqli_real_escape_string($mysqli, trim($_POST['satuanku']));

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
    }elseif($_GET['act'] == "baru"){
        if (isset($_POST['ajukan'])) {
            ///git pull saya habis ngoding fitur blabla
            // ambil data hasil submit dari form
            $nama_barang    = mysqli_real_escape_string($mysqli, trim($_POST['nama_barang']));
            $id_user  = mysqli_real_escape_string($mysqli, trim($_POST['id_user']));
            $jumlah     = mysqli_real_escape_string($mysqli, trim($_POST['jumlah']));
            $alasan    = mysqli_real_escape_string($mysqli, trim($_POST['alasan']));
            $tanggal_pengajuan  = mysqli_real_escape_string($mysqli, trim($_POST['tanggal']));
            $nama_satuan  = mysqli_real_escape_string($mysqli, trim($_POST['satuan']));
            // var_dump($id_satuan);exit;
            // perintah query untuk menyimpan data ke tabel barang
            $query = mysqli_query($mysqli, "INSERT INTO pengajuan_baru(id_user, nama_barang, jumlah, nama_satuan, alasan, tanggal_pengajuan) 
                                            VALUES('$id_user','$nama_barang','$jumlah', '$nama_satuan','$alasan','$tanggal_pengajuan')")
                or die('Ada kesalahan pada query insert : ' . mysqli_error($mysqli));

            // cek query
            if ($query) {
                // jika berhasil tampilkan pesan berhasil simpan data
                header("location: ../../main.php?module=pengajuan&alert=1");
            }
        }
    }
    elseif($_GET['act'] == "setuju"){
        $id = $_POST["id_pengajuan"];
        $id_barang = $_POST["id_barang"];
        $stok = $_POST["stok"];
        $jumlah_pengajuan = $_POST["jumlah_pengajuan"];
        $sisa_stok = $stok-$jumlah_pengajuan;

        $query = mysqli_query($mysqli, "update pengajuan set is_approve = 1 where id = ".$id)
                or die('Ada kesalahan pada query : ' . mysqli_error($mysqli));

            // cek query
            if ($query) {
                // perintah query untuk mengubah data pada tabel barang
                $query1 = mysqli_query($mysqli, "UPDATE is_barang SET stok      = '$sisa_stok'
                                                                WHERE id_barang = '$id_barang'")
                                                or die('Ada kesalahan pada query update : '.mysqli_error($mysqli));

                // cek query
                if ($query1) {                       
                    // jika berhasil tampilkan pesan berhasil simpan data
                    header("location: ../../main.php?module=pengajuan&alert=2");
                }
            
                // jika berhasil tampilkan pesan berhasil simpan data
                // header("location: ../../main.php?module=pengajuan&alert=4");
            }
    }
    elseif($_GET['act'] == "setuju_baru"){
        $id = $_GET["id_pengajuan"];
        $query = mysqli_query($mysqli, "update pengajuan_baru set is_approve = 1 where id = ".$id)
                or die('Ada kesalahan pada query insert : ' . mysqli_error($mysqli));

            // cek query
            if ($query) {
                // jika berhasil tampilkan pesan berhasil simpan data
                header("location: ../../main.php?module=pengajuan&alert=4");
            }
    }
}
?>