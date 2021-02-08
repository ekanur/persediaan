
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
            $id_barang_masuk = mysqli_real_escape_string($mysqli, trim($_POST['id_barang_masuk']));
            
            $tanggal         = mysqli_real_escape_string($mysqli, trim($_POST['tanggal_masuk']));
            $exp             = explode('-',$tanggal);
            $tanggal_masuk   = $exp[2]."-".$exp[1]."-".$exp[0];
            
            $id_barang       = mysqli_real_escape_string($mysqli, trim($_POST['id_barang']));
            $jumlah_masuk    = mysqli_real_escape_string($mysqli, trim($_POST['jumlah_masuk']));
            $total_stok      = mysqli_real_escape_string($mysqli, trim($_POST['total_stok']));
            
            $created_user    = $_SESSION['id_user'];

            // perintah query untuk menyimpan data ke tabel barang masuk
            $query = mysqli_query($mysqli, "INSERT INTO is_barang_masuk(id_barang_masuk,tanggal_masuk,id_barang,jumlah_masuk,created_user) 
                                            VALUES('$id_barang_masuk','$tanggal_masuk','$id_barang','$jumlah_masuk','$created_user')")
                                            or die('Ada kesalahan pada query insert : '.mysqli_error($mysqli));    

            // cek query
            if ($query) {
                // perintah query untuk mengubah data pada tabel barang
                $query1 = mysqli_query($mysqli, "UPDATE is_barang SET stok      = '$total_stok'
                                                                WHERE id_barang = '$id_barang'")
                                                or die('Ada kesalahan pada query update : '.mysqli_error($mysqli));

                // cek query
                if ($query1) {                       
                    // jika berhasil tampilkan pesan berhasil simpan data
                    header("location: ../../main.php?module=barang_masuk&alert=1");
                }
            }   
        }   
    }
    elseif($_GET['act']=='import'){
            
            require_once '../../spreadsheet-reader/php-excel-reader/excel_reader2.php';
            require_once '../../spreadsheet-reader/SpreadsheetReader.php';

            //upload data excel kedalam folder uploads
            // var_dump(basename($_FILES['file']['name']));exit;
            // echo exec('whoami');exit;
            $target_dir = "../../uploads/".basename($_FILES['file']['name']);
            $is_uploaded = move_uploaded_file($_FILES['file']['tmp_name'],$target_dir);
            // var_dump($is_uploaded);exit;
            
            $Reader = new SpreadsheetReader($target_dir);

            foreach ($Reader as $Key => $Row)
            {
            // import data excel mulai baris ke-2 (karena ada header pada baris 1)
            if ($Key < 1) continue;   
                $query=mysqli_query($mysqli, "INSERT INTO is_barang(id_barang,nama_barang,id_jenis,id_satuan, stok, created_user) VALUES ('".$Row[0]."', '".$Row[1]."','18', '10','".$Row[2]."','".$_SESSION['id_user']."')");
            }
            $path = realpath($target_dir); if(is_writable($path)){unlink($path);}
            // var_export($path);exit;
            if (!$query) {
                echo mysqli_error($mysqli);
                exit;
            }

            header("location: ../../main.php?module=barang_masuk&alert=1");
         
    }
}       
?>