<!-- Aplikasi Persediaan Barang dengan PHP7 dan MySQLi
*******************************************************
* Developer    : Indra Styawantoro
* Company      : Indra Studio
* Release Date : 13 Maret 2017
* Website      : www.indrasatya.com
* E-mail       : indra.setyawantoro@gmail.com
* Phone        : +62-813-7778-3334
-->

<?php
session_start();

// Panggil koneksi database.php untuk koneksi database
require_once "../../config/database.php";

// fungsi untuk pengecekan status login user 
// jika user belum login, alihkan ke halaman login dan tampilkan pesan = 1
if (empty($_SESSION['username']) && empty($_SESSION['password'])){
    echo "<meta http-equiv='refresh' content='0; url=index.php?alert=1'>";
}
// jika user sudah login, maka jalankan perintah untuk insert, update, dan delete
else {
    if ($_GET['act']=='insert') {
        if (isset($_POST['simpan'])) {
            // ambil data hasil submit dari form
            $nama_jenis  = mysqli_real_escape_string($mysqli, trim($_POST['nama_jenis']));
            $created_user = $_SESSION['id_user'];

            // perintah query untuk menyimpan data ke tabel jenis
            $query = mysqli_query($mysqli, "INSERT INTO is_jenis_barang(nama_jenis,created_user,updated_user) 
                                            VALUES('$nama_jenis','$created_user','$created_user')")
                                            or die('Ada kesalahan pada query insert : '.mysqli_error($mysqli));    

            // cek query
            if ($query) {
                // jika berhasil tampilkan pesan berhasil simpan data
                header("location: ../../main.php?module=jenis&alert=1");
            }   
        }   
    }
    
    elseif ($_GET['act']=='update') {
        if (isset($_POST['simpan'])) {
            if (isset($_POST['id_jenis'])) {
                // ambil data hasil submit dari form
                $id_jenis    = mysqli_real_escape_string($mysqli, trim($_POST['id_jenis']));
                $nama_jenis  = mysqli_real_escape_string($mysqli, trim($_POST['nama_jenis']));
                $updated_user = $_SESSION['id_user'];

                // perintah query untuk mengubah data pada tabel jenis
                $query = mysqli_query($mysqli, "UPDATE is_jenis_barang SET nama_jenis    = '$nama_jenis',
                                                                     updated_user   = '$updated_user'
                                                               WHERE id_jenis      = '$id_jenis'")
                                                or die('Ada kesalahan pada query update : '.mysqli_error($mysqli));

                // cek query
                if ($query) {
                    // jika berhasil tampilkan pesan berhasil update data
                    header("location: ../../main.php?module=jenis&alert=2");
                }         
            }
        }
    }

    elseif ($_GET['act']=='delete') {
        if (isset($_GET['id'])) {
            $id_jenis = $_GET['id'];
    
            // perintah query untuk menghapus data pada tabel jenis
            $query = mysqli_query($mysqli, "DELETE FROM is_jenis_barang WHERE id_jenis='$id_jenis'")
                                            or die('Ada kesalahan pada query delete : '.mysqli_error($mysqli));

            // cek hasil query
            if ($query) {
                // jika berhasil tampilkan pesan berhasil delete data
                header("location: ../../main.php?module=jenis&alert=3");
            }
        }
    }       
}       
?>