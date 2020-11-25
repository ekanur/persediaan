<?php

$hari_ini = date("d-m-Y");
$orgDate = $_GET['tgl_awal'];  
$newDate = date("Y-m-d", strtotime($orgDate));  
$orgDate1 = $_GET['tgl_akhir'];  
$newDate1 = date("Y-m-d", strtotime($orgDate1));  


if (isset($_GET['tgl_awal'])) {
    
// memanggil library FPDF
require('/opt/lampp/htdocs/persediaan/fpdf182/fpdf.php');
// intance object dan memberikan pengaturan halaman PDF
$pdf = new FPDF('l','mm','A5');
// membuat halaman baru
$pdf->AddPage();
// setting jenis font yang akan digunakan
$pdf->SetFont('Arial','B',20);
$pdf->Cell(190,7,'Laporan Barang Masuk',0,4,'C');

// Memberikan space kebawah agar tidak terlalu rapat
$pdf->Cell(10,7,'',0,1);


$pdf->SetFont('Arial','B',10);
$pdf->SetFillColor(0,0,0);
$pdf->Cell(10,6,'NO',1,0);
$pdf->Cell(40,6,'ID BARANG MASUK',1,0);
$pdf->Cell(60,6,'BARANG',1,0);
$pdf->Cell(35,6,'JUMLAH MASUK',1,0);
$pdf->Cell(45,6,'TANGGAL MASUK',1,1);


$pdf->SetFont('Arial','',10);
$no = 1;
include '/opt/lampp/htdocs/persediaan/config/database.php';
$mahasiswa = mysqli_query($mysqli, "SELECT *,is_barang.nama_barang FROM `is_barang_masuk` INNER JOIN is_barang ON is_barang_masuk.id_barang = is_barang.id_barang WHERE tanggal_masuk BETWEEN '".$newDate."' AND '".$newDate1."'");
while ($row = mysqli_fetch_array($mahasiswa)){
    $pdf->Cell(10,6,$no++,1,0);
    $pdf->Cell(40,6,$row['id_barang_masuk'],1,0);
    $pdf->Cell(60,6,$row['nama_barang'],1,0);
    $pdf->Cell(35,6,$row['jumlah_masuk'],1,0);
    $pdf->Cell(45,6,$row['tanggal_masuk'],1,1);


}

$pdf->Output();

}else{
    
}
?>