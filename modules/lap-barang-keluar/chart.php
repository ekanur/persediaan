<?php

//koneksi kedatabase penjualan
include "config/database.php";

$query = mysqli_query($mysqli, "SELECT is_satuan.nama_satuan FROM is_barang INNER JOIN is_satuan ON is_barang.id_satuan = is_satuan.id_satuan");
// $query1 = mysqli_query($mysqli, "SELECT SUM(jumlah_keluar) as total FROM is_barang_keluar");
$query1 = mysqli_query($mysqli, "SELECT is_barang.nama_barang as nama_barang, sum(is_barang_keluar.jumlah_keluar) as jumlah_keluar FROM `is_barang_keluar` inner join is_barang on is_barang_keluar.id_barang = is_barang.id_barang group by is_barang.nama_barang");

$nama_barang = [];
$jumlah_keluar = [];
$satuan = [];
while ($row = mysqli_fetch_array($query1)) {
	// extract($row);
	array_push($nama_barang, $row["nama_barang"]);
	array_push($jumlah_keluar, $row["jumlah_keluar"]);
}
while ($row = mysqli_fetch_array($query)) {
	// extract($row);
	array_push($satuan, $row["nama_satuan"]);
}

var_dump($nama_barang);

// var_dump($jumlah_keluar);
?>


<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Chart</title>
	<script type="text/javascript" src="assets/js/chart.js"></script>
	<link rel="stylesheet" href="assets/css/chart.css">
	<script src="https://code.highcharts.com/highcharts.js"></script>
	<script src="https://code.highcharts.com/modules/data.js"></script>
	<script src="https://code.highcharts.com/modules/exporting.js"></script>
	<script src="https://code.highcharts.com/modules/accessibility.js"></script>

</head>

<body>
	<figure class="highcharts-figure">
		<div id="container"></div>
		<p class="highcharts-description">
			<span align="center">Total Barang Keluar</span>
		</p>


		<table id="datatable">
			<thead>
				<tr>
					<th></th>
					<?php
					foreach ($nama_barang as $value) { ?>
						<td> <?php echo $value; ?></td>
					<?php } ?>
				</tr>
			</thead>
			<tbody>
				<tr>
					<!-- <?php
					foreach ($satuan as $row) { ?>
						<th><?php echo $row; ?></th>
					<?php } ?> -->
					<th>halo</th>
					<?php
					foreach ($jumlah_keluar as $value) { ?>
						<td> <?php echo $value; ?></td>
					<?php } ?>
				</tr>
				<tr>
					<th>hai</th>
					<td>halo</td>
				</tr>
			</tbody>
		</table>
	</figure>
	<script>
		Highcharts.chart('container', {
			data: {
				table: 'datatable'
			},
			chart: {
				type: 'column'
			},
			title: {
				text: 'Download by PDF & PNG Chart ->'
			},
			yAxis: {
				allowDecimals: false,
				title: {
					text: 'Lap Barang Keluar'
				}
			},
			tooltip: {
				formatter: function() {
					return '<b>' + this.series.name + '</b><br/>' +
						this.point.y + ' ' + this.point.name.toLowerCase();
				}
			}
		});
	</script>
</body>

</html>