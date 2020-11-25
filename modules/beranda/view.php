<!-- Aplikasi Persediaan Barang dengan PHP7 dan MySQLi
*******************************************************
* Developer    : Indra Styawantoro
* Company      : Indra Studio
* Release Date : 13 Maret 2017
* Website      : www.indrasatya.com
* E-mail       : indra.setyawantoro@gmail.com
* Phone        : +62-813-7778-3334
-->

  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      <i class="fa fa-home icon-title"></i> Beranda
    </h1>
    <ol class="breadcrumb">
      <li><a href="?module=home"><i class="fa fa-home"></i> Beranda</a></li>
    </ol>
  </section>
  
  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-lg-12 col-xs-12">
        <div class="alert alert-info alert-dismissable">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          <p style="font-size:15px">
            <i class="icon fa fa-user"></i> Selamat datang <strong><?php echo $_SESSION['nama_user']; ?></strong> di Aplikasi Persediaan Barang Fakultas Sastra Univ. Negeri Malang.
          </p>        
        </div>
      </div>
    </div>
   
    <!-- Small boxes (Stat box) -->
    <!-- /.row -->

    <div class="row">
      <div class="col-lg-12 col-xs-12">
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title"><i class="fa fa-info-circle icon-title"></i> Pengajuan Permintaan Barang</h3>
            <div class="box-tools pull-right">
              <button class="btn btn-box-tool" data-widget="collapse">
                <i class="fa fa-minus"></i>
              </button>
              <button class="btn btn-box-tool" data-widget="remove">
                <i class="fa fa-times"></i>
              </button>
            </div>
          </div>
          <div class="box-body">
            <div class="table-responsive">
              <!-- tampilan tabel barang -->
              <?php
                if ($_SESSION['hak_akses']=='Super Admin') {
              ?>
                <table class="table no-margin">
                <!-- tampilan tabel header -->
                <thead>
                <tr>
                        <th class="center">No.</th>
                        <th class="center">Client</th>
                        <th class="center">Nama Barang</th>
                        <th class="center">Jumlah Pengajuan</th>
                        <th class="center">Alasan</th>
                        <th class="center">Tanggal Pengajuan</th>
                        <th></th>
                </tr>
                </thead>
                <!-- tampilan tabel body -->
                <tbody>
                <?php
              $no = 1;
              $query = mysqli_query($mysqli, "SELECT a.id, a.id_barang,a.jumlah,a.nama_satuan,a.alasan,a.tanggal_pengajuan,a.is_approve,b.nama_barang, c.nama_user
FROM pengajuan as a INNER JOIN is_barang as b    
ON a.id_barang=b.id_barang INNER JOIN is_users as c on a.id_user = c.id_user where a.is_approve =0 ORDER BY id_barang DESC")            // fungsi query untuk menampilkan data dari tabel barang

                      or die('Ada kesalahan pada query tampil Data Barang: ' . mysqli_error($mysqli));
              if(mysqli_num_rows($query) == 0){
                ?>
                <tr>
                  <td colspan="7" class="text-center">Tidak ada pengajuan Barang</td>
                </tr>
                <?php
              }
              // tampilkan data
              while ($data = mysqli_fetch_assoc($query)) {

                      $a = date("Y-m-d", strtotime($data['tanggal_pengajuan']));
                      // $isapp = [];
                      // if ($data['is_approve'] == 0) {
                      //         array_push($isapp, "Not Approve");
                      // } elseif ($data['is_approve'] == 1) {
                      //         array_push($isapp, "Approve");
                      // }
                      // $approve = implode("", $isapp);
                      // menampilkan isi tabel dari database ke tabel di aplikasi
                      echo "<tr>
<td width='30' class='center'>$no</td>
<td width='80' class='center'>$data[nama_user]</td>
<td width='180'>$data[nama_barang]</td>
<td width='150'>$data[jumlah] $data[nama_satuan]</td>
<td width='150'>$data[alasan]</td>
<td width='150'>$a</td>
<td><a class='btn btn-success' href='?module=pengajuan&act=setujui&id=$data[id]'>Setujui</a></td>
</tr>";
                      $no++;
              }
              ?>
                </tbody>
                
              </table>

              
              <?php
                }
              ?>

              <?php
              if ($_SESSION['hak_akses']=='Gudang') {
              ?>
              <table class="table no-margin">
                <!-- tampilan tabel header -->
                <thead>
                  <tr>
                    <th class="center">No.</th>
                    <th class="center">ID Barang</th>
                    <th>Nama Barang</th>
                    <th>Stok</th>
                    <th></th>
                  </tr>
                </thead>
                <!-- tampilan tabel body -->
                <tbody>
                <?php  
                $no = 1;
                // fungsi query untuk menampilkan data dari tabel barang
                $query = mysqli_query($mysqli, "SELECT is_barang.*, is_satuan.nama_satuan  from is_barang inner join is_satuan on is_barang.id_satuan = is_satuan.id_satuan ORDER BY id_barang DESC")
                  or die('Ada kesalahan pada query tampil Data Barang: ' . mysqli_error($mysqli));

                // tampilkan data
                while ($data = mysqli_fetch_assoc($query)) {
                  // menampilkan isi tabel dari database ke tabel di aplikasi
                  echo "<tr>
                          <td width='20' class='center'>$no</td>
                          <td width='80' class='center'>$data[id_barang]</td>
                          <td width='150'>$data[nama_barang]</td>
                          <td width='80'>$data[stok] $data[nama_satuan]</td>
                          <td width='100'><a href='?module=form_pengajuan&id=$data[id_barang]' class='btn btn-info'>Ajukan</a></td>
                        </tr>";
                  $no++;
                }
                ?>
                </tbody>
                <tfoot>
                  <tr>
                    <td colspan="5">Tidak temukan barang yang dibutuhkan? <a href="?module=form_pengajuan_baru" class="">Ajukan barang baru</a></td>
                  </tr>
                </tfoot>
              </table>
              <?php
              }
              ?>
            </div>
          </div><!-- /.box-body -->
        </div><!-- /.box -->
      </div>
    </div>
  <div class="row">
    <div class="col-lg-12 col-xs-12">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">
            Barang Keluar pada Bulan <?php echo date("M") ?>
          </h3>
        </div>
        <div class="box-body">
        <canvas id="myChart" width="400" height="150"></canvas>
        </div>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-lg-12 col-xs-12">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title"><i class="fa fa-info-circle icon-title"></i> Stok Barang telah mencapai batas minimum</h3>
          <div class="box-tools pull-right">
            <button class="btn btn-box-tool" data-widget="collapse">
              <i class="fa fa-minus"></i>
            </button>
            <button class="btn btn-box-tool" data-widget="remove">
              <i class="fa fa-times"></i>
            </button>
          </div>
        </div>
        <div class="box-body">
          <div class="table-responsive">
            <!-- tampilan tabel barang -->
            <table class="table no-margin">
              <!-- tampilan tabel header -->
              <thead>
                <tr>
                  <th class="center">No.</th>
                  <th class="center">ID Barang</th>
                  <th>Nama Barang</th>
                  <th>Jenis Barang</th>
                  <th>Stok</th>
                  <th>Satuan</th>
                </tr>
              </thead>
              <!-- tampilan tabel body -->
              <tbody>
                <?php
                $no = 1;
                // fungsi query untuk menampilkan data dari tabel barang
                $query = mysqli_query($mysqli, "SELECT a.id_barang,a.nama_barang,a.id_jenis,a.id_satuan,a.stok,b.id_jenis,b.nama_jenis,c.id_satuan,c.nama_satuan 
                                                FROM is_barang as a INNER JOIN is_jenis_barang as b INNER JOIN is_satuan as c
                                                ON a.id_jenis=b.id_jenis AND a.id_satuan=c.id_satuan 
                                                WHERE a.stok<=10 ORDER BY id_barang DESC")
                  or die('Ada kesalahan pada query tampil Data Barang: ' . mysqli_error($mysqli));

                // tampilkan data
                while ($data = mysqli_fetch_assoc($query)) {
                  // menampilkan isi tabel dari database ke tabel di aplikasi
                  echo "<tr>
                          <td width='20' class='center'>$no</td>
                          <td width='80' class='center'>$data[id_barang]</td>
                          <td width='150'>$data[nama_barang]</td>
                          <td width='100'>$data[nama_jenis]</td>
                          <td width='80'>$data[stok]</td>
                          <td width='100'>$data[nama_satuan]</td>
                        </tr>";
                  $no++;
                }
                ?>
              </tbody>
            </table>
          </div>
        </div><!-- /.box-body -->
      </div><!-- /.box -->
    </div>
  </div>
  
</section><!-- /.content -->

<script>
                $(document).ready(function() {
                        $('#dataTables1').DataTable({
                                "scrollX": true
                        });
                });
                $(document).ready(function() {
                        $('#dataTables1').DataTable();
                });
        </script>

<?php
if($_SESSION['hak_akses'] == 'Super Admin'){
  $query=mysqli_query($mysqli, "SELECT is_barang_keluar.id_barang, sum(is_barang_keluar.jumlah_keluar) as jumlah, is_barang.nama_barang FROM is_barang_keluar inner join is_barang on is_barang_keluar.id_barang = is_barang.id_barang where month(is_barang_keluar.tanggal_keluar)= month(current_timestamp()) group by is_barang_keluar.id_barang")  or die('Ada kesalahan pada query tampil Data Barang: ' . mysqli_error($mysqli));
  $nama_barang = array();
  $jumlah = array();

  while ($data = mysqli_fetch_assoc($query)) {
    array_push($nama_barang, "'".$data["nama_barang"]."'");
    array_push($jumlah, $data["jumlah"]);
  }
// var_dump($nama_barang);
?>
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js"></script>
<script>

var ctx = document.getElementById('myChart').getContext('2d');
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: [<?php echo implode(",", $nama_barang);?>],
        datasets: [{
            label: '# Jumlah Barang Keluar',
            data: [<?php echo implode(",", $jumlah); ?>],
            backgroundColor: ['rgba(255, 99, 132, 0.2)'],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }]
        }
    }
});
</script>
<?php
}
?>