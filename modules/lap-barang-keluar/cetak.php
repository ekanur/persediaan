<?php

$hari_ini = date("d-m-Y");
$orgDate = $_GET['tgl_awal'];  
$newDate = date("Y-m-d", strtotime($orgDate));  
$orgDate1 = $_GET['tgl_akhir'];  
$newDate1 = date("Y-m-d", strtotime($orgDate1));  


if (isset($_GET['tgl_awal'])) {
    
// memanggil library FPDF
require('../../fpdf182/fpdf.php');
// intance object dan memberikan pengaturan halaman PDF
$pdf = new FPDF('l','mm','A5');
// membuat halaman baru
$pdf->AddPage();
// setting jenis font yang akan digunakan
$pdf->SetFont('Arial','B',20);
$pdf->Cell(190,7,'Laporan Barang Keluar',0,4,'C');

// Memberikan space kebawah agar tidak terlalu rapat
$pdf->Cell(10,7,'',0,1);


$pdf->SetFont('Arial','B',10);
$pdf->SetFillColor(0,0,0);
$pdf->Cell(10,6,'NO',1,0);
$pdf->Cell(40,6,'ID BARANG KELUAR',1,0);
$pdf->Cell(40,6,'BARANG',1,0);
$pdf->Cell(35,6,'JUMLAH KELUAR',1,0);
$pdf->Cell(30,6,'STATUS',1,0);
$pdf->Cell(40,6,'TANGGAL KELUAR',1,1);

$pdf->SetFont('Arial','',10);
$no = 1;
include '../../config/database.php';
$mahasiswa = mysqli_query($mysqli, "SELECT *,is_barang.nama_barang FROM `is_barang_keluar` INNER JOIN is_barang ON is_barang_keluar.id_barang = is_barang.id_barang WHERE tanggal_keluar BETWEEN '".$newDate."' AND '".$newDate1."'");
while ($row = mysqli_fetch_array($mahasiswa)){
    $pdf->Cell(10,6,$no++,1,0);
    $pdf->Cell(40,6,$row['id_barang_keluar'],1,0);
    $pdf->Cell(40,6,$row['nama_barang'],1,0);
    $pdf->Cell(35,6,$row['jumlah_keluar'],1,0);
    $pdf->Cell(30,6,$row['status'],1,0);
    $pdf->Cell(40,6,$row['tanggal_keluar'],1,1);


}

$pdf->Output();

}else{
    
}
?>