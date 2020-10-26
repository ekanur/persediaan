<?php
require_once "config/database.php";

$query = mysqli_query($mysqli, "SELECT a.id_barang,a.nama_barang,a.id_jenis,a.id_satuan,a.stok,b.id_jenis,b.nama_jenis,c.id_satuan,c.nama_satuan 
FROM is_barang as a INNER JOIN is_jenis_barang as b INNER JOIN is_satuan as c
ON a.id_jenis=b.id_jenis AND a.id_satuan=c.id_satuan ORDER BY id_barang DESC");

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <script src="https://code.jquery.com/jquery-3.1.0.js"></script>
  <script src="//cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
  <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />
  <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>
  <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous"> -->
  <link rel="stylesheet" href="assets/css/styleindex.css">
  <link href="assets/css/style.css" rel="stylesheet" type="text/css" />
  <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />


</head>

<body>
<?php  
      // fungsi untuk menampilkan pesan
      // jika alert = "" (kosong)
      // tampilkan pesan "" (kosong)
      if (empty($_GET['alert'])) {
        echo "";
      } 
    
      elseif ($_GET['alert'] == 2) {
        echo "<div class='alert alert-success alert-dismissable'>
                <button type='button' class='close' data-dismiss='alert' aria-label='Close'>&times;</button>
                <h4>  <i class='icon fa fa-check-circle'></i> Sukses!</h4>
                Anda telah berhasil logout.
              </div>";
      }
      ?>
  <div class="halo">
    <a href="/Persediaan/login.php"><button class="btn btn-info">Login</button></a>
  </div>
  <div class="container">
    <table class="table table-striped table-bordered data">
      <thead>
        <tr>
          <th>No.</th>
          <th>ID Barang</th>
          <th>Nama Barang</th>
          <th>Jenis Barang</th>
          <th>Stok</th>
          <th>Satuan</th>
        </tr>
        <?php
        $no = 1;
        while ($row = mysqli_fetch_assoc($query)) {
          echo "
          </thead>
          <tbody>
            <tr>
              <td>$no</td>
              <td>$row[id_barang]</td>
              <td>$row[nama_barang]</td>
              <td>$row[nama_jenis]</td>
              <td>$row[stok]</td>
              <td>$row[nama_satuan]</td>
            </tr>";

        ?>
        <?php
        $no++;
       
        }
        ?>
        </tbody>
    </table>
  </div>
</body>
<script type="text/javascript">
  $(document).ready(function() {
    $('.data').DataTable();
  });
</script>

</html>