<!-- Content Header (Page header) -->
<!DOCTYPE html>
<html lang="en">

<head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.22/datatables.min.css" />
        <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.22/datatables.min.js"></script>
        
</head>

<body>
        <section class="content-header">
                <h1>
                        <i class="fa fa-folder-o icon-title"></i> Data Pengajuan Barang
                </h1>

        </section>

        <!-- Main content -->
        <section class="content">
                <div class="row">
                        <div class="col-md-12">

                                <?php
                                // fungsi untuk menampilkan pesan
                                // jika alert = "" (kosong)
                                // tampilkan pesan "" (kosong)
                                if (empty($_GET['alert'])) {
                                        echo "";
                                }
                                // jika alert = 1
                                // tampilkan pesan Sukses "Data barang baru berhasil disimpan"
                                elseif ($_GET['alert'] == 1) {
                                        echo "<div class='alert alert-success alert-dismissable'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4>  <i class='icon fa fa-check-circle'></i> Sukses!</h4>
              Data barang baru berhasil disimpan.
            </div>";
                                }
                                // jika alert = 2
                                // tampilkan pesan Sukses "Data barang berhasil diubah"
                                elseif ($_GET['alert'] == 2) {
                                        echo "<div class='alert alert-success alert-dismissable'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4>  <i class='icon fa fa-check-circle'></i> Sukses!</h4>
              Data barang berhasil diubah.
            </div>";
                                }
                                // jika alert = 3
                                // tampilkan pesan Sukses "Data barang berhasil dihapus"
                                elseif ($_GET['alert'] == 3) {
                                        echo "<div class='alert alert-success alert-dismissable'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4>  <i class='icon fa fa-check-circle'></i> Sukses!</h4>
              Data barang berhasil dihapus.
            </div>";
                                }
                                elseif ($_GET['alert'] == 4) {
                                        echo "<div class='alert alert-success alert-dismissable'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4>  <i class='icon fa fa-check-circle'></i> Sukses!</h4>
              Pengajuan Barang Telah disetujui.
            </div>";
                                }
                                ?>

                                <div class="box box-primary">
                                        <div class="box-body">
                                                <!-- tampilan tabel barang -->
                                                <table id="dataTables1" class="table table-bordered table-striped table-hover">
                                                        <!-- tampilan tabel header -->
                                                        <thead>
                                                                <tr>
                                                                        <th class="center">No.</th>
                                                                        <th class="center">ID Barang</th>
                                                                        <th class="center">Nama Barang</th>
                                                                        <th class="center">Jumlah Pengajuan</th>
                                                                        <th class="center">Alasan</th>
                                                                        <th class="center">Tanggal Pengajuan</th>
                                                                        <th class="center">Status</th>
                                                                        <th class="center">Oleh</th>
                                                                </tr>
                                                        </thead>
                                                        <!-- tampilan tabel body -->
                                                        <tbody>
                                                                <?php
                                                                $by_user = ($_SESSION['hak_akses'] != "Super Admin")? " WHERE a.id_user = ".$_SESSION['id_user']: null;

                                                                $no = 1;
                                                                $query = mysqli_query($mysqli, "SELECT a.id, a.id_barang,a.jumlah,a.nama_satuan,a.alasan,a.tanggal_pengajuan,a.is_approve,b.nama_barang, c.nama_user
                                            FROM pengajuan as a INNER JOIN is_barang as b    
                                            ON a.id_barang=b.id_barang INNER JOIN is_users as c on a.id_user=c.id_user ".$by_user." ORDER BY id_barang DESC")            // fungsi query untuk menampilkan data dari tabel barang

                                                                        or die('Ada kesalahan pada query tampil Data Barang: ' . mysqli_error($mysqli));

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
                                                                $approve = ($data['is_approve']==0)?"Not Approved":"Approved";
                                                                
                                                                if($_SESSION['hak_akses'] == 'Super Admin'){
                                                                        $approve = ($data['is_approve']==0)?"<a href='modules/pengajuan/proses.php?act=setuju&id_pengajuan=$data[id]' class='btn btn-success'>Setujui</a>":"Sudah disetujui";
                                                                }                                                                        // menampilkan isi tabel dari database ke tabel di aplikasi
                                                                        echo "<tr>
                      <td width='30' class='center'>$no</td>
                      <td width='80' class='center'>$data[id_barang]</td>
                      <td width='180'>$data[nama_barang]</td>
                      <td width='150'>$data[jumlah] $data[nama_satuan]</td>
                      <td width='150'>$data[alasan]</td>
                      <td width='150'>$a</td>
                      <td width='150'>$approve</td>
                      <td width='150'>$data[nama_user]</td>

                    </tr>";
                                                                        $no++;
                                                                }
                                                                ?>
                                                        </tbody>
                                                </table>
                                        </div><!-- /.box-body -->
                                </div>
                                <div class="box box-primary">
                                        <div class="box-body">
                                                <h3>Pengajuan Barang Baru</h3>
                                                <!-- tampilan tabel barang -->
                                                <table id="dataTables2" class="table table-bordered table-striped table-hover">
                                                        <!-- tampilan tabel header -->
                                                        <thead>
                                                                <tr>
                                                                        <th class="center">No.</th>
                                                                        <th class="center">Nama Barang</th>
                                                                        <th class="center">Jumlah Pengajuan</th>
                                                                        <th class="center">Alasan</th>
                                                                        <th class="center">Tanggal Pengajuan</th>
                                                                        <th class="center">Status</th>
                                                                        <th class="center">Oleh</th>
                                                                </tr>
                                                        </thead>
                                                        <!-- tampilan tabel body -->
                                                        <tbody>
                                                                <?php
                                                                $no = 1;
                                                                $query = mysqli_query($mysqli, "SELECT a.*, b.nama_user FROM pengajuan_baru as a INNER JOIN is_users as b ON a.id_user = b.id_user".$by_user." ORDER BY id DESC")            // fungsi query untuk menampilkan data dari tabel barang

                                                                        or die('Ada kesalahan pada query tampil Data Barang: ' . mysqli_error($mysqli));

                                                                // tampilkan data
                                                                while ($data = mysqli_fetch_assoc($query)) {

                                                                        $a = date("Y-m-d", strtotime($data['tanggal_pengajuan']));
                                                                        // $isapp = [];
                                                                        $approve = ($data['is_approve']==0)?"Not Approved":"Approved";
                                                                
                                                                        if($_SESSION['hak_akses'] == 'Super Admin'){
                                                                                $approve = ($data['is_approve']==0)?"<a href='modules/pengajuan/proses.php?act=setuju_baru&id_pengajuan=$data[id]' class='btn btn-success'>Setujui</a>":"Sudah disetujui";
                                                                        } 
                                                                        // menampilkan isi tabel dari database ke tabel di aplikasi
                                                                        echo "<tr>
                                                                                <td width='30' class='center'>$no</td>
                                                                                <td width='180'>$data[nama_barang]</td>
                                                                                <td width='150'>$data[jumlah] $data[nama_satuan]</td>
                                                                                <td width='150'>$data[alasan]</td>
                                                                                <td width='150'>$a</td>
                                                                                <td width='150'>$approve</td>
                                                                                <td width='150'>$data[nama_user]</td>
                                                                                </tr>";
                                                                        $no++;
                                                                }
                                                                ?>
                                                        </tbody>
                                                </table>
                                        </div><!-- /.box-body -->
                                </div><!-- /.box -->
                        </div>
                        <!--/.col -->
                </div> <!-- /.row -->
        </section>

        <script>
                $(document).ready(function() {
                        $('table').DataTable({
                                "scrollX": true
                        });
                });
        </script>
</body>

</html>