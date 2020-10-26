<!-- Aplikasi Persediaan Barang dengan PHP7 dan MySQLi
*******************************************************
* Developer    : Indra Styawantoro
* Company      : Indra Studio
* Release Date : 13 Maret 2017
* Website      : www.indrasatya.com
* E-mail       : indra.setyawantoro@gmail.com
* Phone        : +62-813-7778-3334
-->

 <?php  
// fungsi untuk pengecekan tampilan form
// jika form add data yang dipilih
if ($_GET['form']=='add') { ?> 
  <!-- tampilan form add data -->
	<!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      <i class="fa fa-edit icon-title"></i> Input Barang
    </h1>
    <ol class="breadcrumb">
      <li><a href="?module=home"><i class="fa fa-home"></i> Beranda </a></li>
      <li><a href="?module=barang"> barang </a></li>
      <li class="active"> Tambah </li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="box box-primary">
          <!-- form start -->
          <form role="form" class="form-horizontal" action="modules/barang/proses.php?act=insert" method="POST">
            <div class="box-body">
              <?php  
              // fungsi untuk membuat id transaksi
              $query_id = mysqli_query($mysqli, "SELECT RIGHT(id_barang,6) as kode FROM is_barang
                                                ORDER BY id_barang DESC LIMIT 1")
                                                or die('Ada kesalahan pada query tampil id_barang : '.mysqli_error($mysqli));

              $count = mysqli_num_rows($query_id);

              if ($count <> 0) {
                  // mengambil data id_barang
                  $data_id = mysqli_fetch_assoc($query_id);
                  $kode    = $data_id['kode']+1;
              } else {
                  $kode = 1;
              }

              // buat id_barang
              $buat_id   = str_pad($kode, 6, "0", STR_PAD_LEFT);
              $id_barang = "B$buat_id";
              ?>

              <div class="form-group">
                <label class="col-sm-2 control-label">ID Barang</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="id_barang" value="<?php echo $id_barang; ?>" readonly required>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Nama Barang</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="nama_barang" autocomplete="off" required>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Jenis Barang</label>
                <div class="col-sm-5">
                  <select class="chosen-select" name="jenis" data-placeholder="-- Pilih Jenis Barang --" autocomplete="off" required>
                    <option value=""></option>
                    <?php
                      $query_jenis = mysqli_query($mysqli, "SELECT * FROM is_jenis_barang ORDER BY id_jenis ASC")
                                                            or die('Ada kesalahan pada query tampil jenis barang: '.mysqli_error($mysqli));
                      while ($data_jenis = mysqli_fetch_assoc($query_jenis)) {
                        echo"<option value=\"$data_jenis[id_jenis]\"> $data_jenis[nama_jenis] </option>";
                      }
                    ?>
                  </select>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Satuan</label>
                <div class="col-sm-5">
                  <select class="chosen-select" name="satuan" data-placeholder="-- Pilih Satuan Barang --" autocomplete="off" required>
                    <option value=""></option>
                    <?php
                      $query_satuan = mysqli_query($mysqli, "SELECT * FROM is_satuan ORDER BY id_satuan ASC")
                                                            or die('Ada kesalahan pada query tampil satuan: '.mysqli_error($mysqli));
                      while ($data_satuan = mysqli_fetch_assoc($query_satuan)) {
                        echo"<option value=\"$data_satuan[id_satuan]\"> $data_satuan[nama_satuan] </option>";
                      }
                    ?>
                  </select>
                </div>
              </div>

            </div><!-- /.box body -->

            <div class="box-footer">
              <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                  <input type="submit" class="btn btn-primary btn-submit" name="simpan" value="Simpan">
                  <a href="?module=barang" class="btn btn-default btn-reset">Batal</a>
                </div>
              </div>
            </div><!-- /.box footer -->
          </form>
        </div><!-- /.box -->
      </div><!--/.col -->
    </div>   <!-- /.row -->
  </section><!-- /.content -->
<?php
}
// jika form edit data yang dipilih
// isset : cek data ada / tidak
elseif ($_GET['form']=='edit') { 
  if (isset($_GET['id'])) {
      // fungsi query untuk menampilkan data dari tabel barang
      $query = mysqli_query($mysqli, "SELECT a.id_barang,a.nama_barang,a.id_jenis,a.id_satuan,b.id_jenis,b.nama_jenis,c.id_satuan,c.nama_satuan 
                                      FROM is_barang as a INNER JOIN is_jenis_barang as b INNER JOIN is_satuan as c
                                      ON a.id_jenis=b.id_jenis AND a.id_satuan=c.id_satuan WHERE id_barang='$_GET[id]'") 
                                      or die('Ada kesalahan pada query tampil Data Barang : '.mysqli_error($mysqli));
      $data  = mysqli_fetch_assoc($query);
    }
?>
  <!-- tampilan form edit data -->
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      <i class="fa fa-edit icon-title"></i> Ubah Barang
    </h1>
    <ol class="breadcrumb">
      <li><a href="?module=home"><i class="fa fa-home"></i> Beranda </a></li>
      <li><a href="?module=barang"> Barang </a></li>
      <li class="active"> Ubah </li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="box box-primary">
          <!-- form start -->
          <form role="form" class="form-horizontal" action="modules/barang/proses.php?act=update" method="POST">
            <div class="box-body">
              
              <div class="form-group">
                <label class="col-sm-2 control-label">ID Barang</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="id_barang" value="<?php echo $data['id_barang']; ?>" readonly required>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Nama Barang</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="nama_barang" autocomplete="off" value="<?php echo $data['nama_barang']; ?>" required>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Jenis Barang</label>
                <div class="col-sm-5">
                  <select class="chosen-select" name="jenis" data-placeholder="-- Pilih Jenis Barang --" autocomplete="off" required>
                    <option value="<?php echo $data['id_jenis']; ?>"><?php echo $data['nama_jenis']; ?></option>
                    <?php
                      $query_jenis = mysqli_query($mysqli, "SELECT * FROM is_jenis_barang ORDER BY id_jenis ASC")
                                                            or die('Ada kesalahan pada query tampil jenis barang: '.mysqli_error($mysqli));
                      while ($data_jenis = mysqli_fetch_assoc($query_jenis)) {
                        echo"<option value=\"$data_jenis[id_jenis]\"> $data_jenis[nama_jenis] </option>";
                      }
                    ?>
                  </select>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Satuan</label>
                <div class="col-sm-5">
                  <select class="chosen-select" name="satuan" data-placeholder="-- Pilih Satuan Barang --" autocomplete="off" required>
                    <option value="<?php echo $data['id_satuan']; ?>"><?php echo $data['nama_satuan']; ?></option>
                    <?php
                      $query_satuan = mysqli_query($mysqli, "SELECT * FROM is_satuan ORDER BY id_satuan ASC")
                                                            or die('Ada kesalahan pada query tampil satuan: '.mysqli_error($mysqli));
                      while ($data_satuan = mysqli_fetch_assoc($query_satuan)) {
                        echo"<option value=\"$data_satuan[id_satuan]\"> $data_satuan[nama_satuan] </option>";
                      }
                    ?>
                  </select>
                </div>
              </div>

            </div><!-- /.box body -->

            <div class="box-footer">
              <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                  <input type="submit" class="btn btn-primary btn-submit" name="simpan" value="Simpan">
                  <a href="?module=barang" class="btn btn-default btn-reset">Batal</a>
                </div>
              </div>
            </div><!-- /.box footer -->
          </form>
        </div><!-- /.box -->
      </div><!--/.col -->
    </div>   <!-- /.row -->
  </section><!-- /.content -->
<?php
}
?>