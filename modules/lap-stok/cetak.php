
<?php
// memanggil library FPDF
require('/opt/lampp/htdocs/persediaan/fpdf182/fpdf.php');
// intance object dan memberikan pengaturan halaman PDF
$pdf = new FPDF('l','mm','A5');
// membuat halaman baru
$pdf->AddPage();
// setting jenis font yang akan digunakan
$pdf->SetFont('Arial','B',20);
$pdf->Cell(190,7,'Laporan Stok Barang Gudang',0,4,'C');

// Memberikan space kebawah agar tidak terlalu rapat
$pdf->Cell(10,7,'',0,1);


$pdf->SetFont('Arial','B',10);
$pdf->SetFillColor(0,0,0);
$pdf->Cell(9,6,'NO',1,0);
$pdf->Cell(23,6,'ID BARANG',1,0);
$pdf->Cell(60,6,'BARANG',1,0);
$pdf->Cell(45,6,'KATEGORI',1,0);
$pdf->Cell(23,6,'STOK',1,0);
$pdf->Cell(17,6,'SATUAN',1,1);

$pdf->SetFont('Arial','',10);
$no = 1;
include '/opt/lampp/htdocs/persediaan/config/database.php';
$mahasiswa = mysqli_query($mysqli, "SELECT *,is_jenis_barang.nama_jenis,is_satuan.nama_satuan FROM `is_barang` INNER JOIN is_jenis_barang ON is_barang.id_jenis = is_jenis_barang.id_jenis INNER JOIN is_satuan ON is_barang.id_satuan = is_satuan.id_satuan");
while ($row = mysqli_fetch_array($mahasiswa)){
    $pdf->Cell(9,6,$no++,1,0);
    $pdf->Cell(23,6,$row['id_barang'],1,0);
    $pdf->Cell(60,6,$row['nama_barang'],1,0);
    $pdf->Cell(45,6,$row['nama_jenis'],1,0);
    $pdf->Cell(23,6,$row['stok'],1,0);
    $pdf->Cell(17,6,$row['nama_satuan'],1,1);


}

$pdf->Output();
?>
