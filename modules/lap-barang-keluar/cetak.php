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
$pdf->SetFont('Arial','',12);
$pdf->Cell(190,7,"(".$newDate." s.d ".$newDate1.")",0,4,'C');

// Memberikan space kebawah agar tidak terlalu rapat
$pdf->Cell(10,7,'',0,1);


$pdf->SetFont('Arial','B',7);
$pdf->SetFillColor(0,0,0);
$pdf->Cell(7,6,'NO',1,0);
$pdf->Cell(25,6,'ID BARANG',1,0);
$pdf->Cell(25,6,'USER',1,0);
$pdf->Cell(90,6,'BARANG',1,0);
$pdf->Cell(15,6,'JUMLAH',1,0);
$pdf->Cell(15,6,'STATUS',1,0);
$pdf->Cell(20,6,'TANGGAL',1,1);

$pdf->SetFont('Arial','',7);
$no = 1;
include '../../config/database.php';

$barang_keluar = mysqli_query($mysqli, "SELECT pengajuan.tanggal_pengajuan, pengajuan.is_approve, pengajuan.jumlah, is_barang.id_barang, is_barang.nama_barang, is_users.nama_user FROM `pengajuan` INNER JOIN is_barang ON pengajuan.id_barang = is_barang.id_barang inner join is_users on is_users.id_user = pengajuan.id_user WHERE tanggal_pengajuan BETWEEN '".$newDate."' AND '".$newDate1."'");
while ($row = mysqli_fetch_array($barang_keluar)){
    $row['is_approve'] = ($row['is_approve']==1)?'Setujui':'Tunggu';
    $pdf->Cell(7,6,$no++,1,0);
    $pdf->Cell(25,6,$row['id_barang'],1,0);
    $pdf->Cell(25,6,$row['nama_user'],1,0);
    $pdf->Cell(90,6,$row['nama_barang'],1,0);
    $pdf->Cell(15,6,$row['jumlah'],1,0);
    $pdf->Cell(15,6,$row['is_approve'],1,0);
    $pdf->Cell(20,6,date("Y-m-d",strtotime($row['tanggal_pengajuan'])),1,1);


}

$pdf->Output();

}else{
    
}
?>