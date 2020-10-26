<?php
 header('Content-Type: application/json; charset=utf8');
 
 //koneksi kedatabase penjualan
 include "config/database.php";
 
 $query = mysqli_query($mysqli,"SELECT DISTINCT nama_barang FROM is_barang_keluar ibk JOIN is_barang ib ON ibk.id_barang = ib.id_barang");


 $array=array();
 while($data=mysqli_fetch_assoc($query)) $array[]=$data; 
 
 //mengubah data array menjadi format json
 echo json_encode($array);
?>