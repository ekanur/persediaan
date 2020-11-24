<?php
// memanggil library FPDF
require('/opt/lampp/htdocs/persediaan/fpdf182/fpdf.php');
// intance object dan memberikan pengaturan halaman PDF
$pdf = new FPDF('l','mm','A5');
// membuat halaman baru
$pdf->AddPage();
// setting jenis font yang akan digunakan
$pdf->SetFont('Arial','B',20);
$pdf->Cell(190,7,'Laporan Pengajuan Barang Baru',0,4,'C');

// Memberikan space kebawah agar tidak terlalu rapat
$pdf->Cell(10,7,'',0,1);


$pdf->SetFont('Arial','B',10);
$pdf->SetFillColor(0,0,0);
$pdf->Cell(10,6,'NO',1,0);
$pdf->Cell(25,6,'NAMA USER',1,0);
$pdf->Cell(25,6,'BARANG',1,0);
$pdf->Cell(17,6,'JUMLAH',1,0);
$pdf->Cell(65,6,'ALASAN',1,0);
$pdf->Cell(23,6,'TANGGAL',1,0);
$pdf->Cell(27,6,'STATUS',1,1);


$pdf->SetFont('Arial','',10);
$no = 1;
include '/opt/lampp/htdocs/persediaan/config/database.php';
$mahasiswa = mysqli_query($mysqli, "SELECT *,is_users.nama_user FROM `pengajuan_baru` INNER JOIN is_users ON pengajuan_baru.id_user = is_users.id_user");
while ($row = mysqli_fetch_array($mahasiswa)){
    $is_approve = ($row['is_approve'] == 0) ? "Belum Disetujui" : "Disetujui";
    $satuan = $row['nama_satuan'];
    $pdf->Cell(10,6,$no++,1,0);
    $pdf->Cell(25,6,$row['nama_user'],1,0);
    $pdf->Cell(25,6,$row['nama_barang'],1,0);
    $pdf->Cell(17,6,$row['jumlah'],1,0);
    $pdf->Cell(65,6,$row['alasan'],1,0);
    $pdf->Cell(23,6,$row['tanggal_pengajuan'],1,0);
    $pdf->Cell(27,6,$is_approve,1,1);


}

$pdf->Output();
?>
