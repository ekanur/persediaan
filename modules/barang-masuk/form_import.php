  <!-- tampilan form add data -->
	<!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      <i class="fa fa-edit icon-title"></i> Import Data Barang
    </h1>
    <ol class="breadcrumb">
      <li><a href="?module=home"><i class="fa fa-home"></i> Beranda </a></li>
      <li><a href="?module=barang_masuk"> Transaksi </a></li>
      <li class="active"> Import </li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="box box-primary">
        <div class='alert alert-success alert-dismissable'>
                <strong>Tips Import Barang :</strong>
                <ol start="1">
                <li>
                Gunakan file xls yang telah tersedia untuk import Barang. Download File <a href="import_barang.xls" style="color:blue">Disini</a>.
                </li>
                <li>Untuk mempercepat proses, jumlah barang yg diinput maksimal 50 sekali import.</li>
                </ol>
              </div>
          <!-- form start -->
          <form role="form" class="form-horizontal" action="modules/barang-masuk/proses.php?act=import" method="POST" name="formImportBarangMasuk" enctype="multipart/form-data">
            <div class="box-body">
              <div class="form-group">
                <label class="col-sm-2 control-label">File Excel</label>
                <div class="col-sm-5">
                  <input type="file" class="form-control" name="file" required>
                </div>
              </div>

            </div><!-- /.box body -->

            <div class="box-footer">
              <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                  <input type="submit" class="btn btn-primary btn-submit" name="simpan" value="Import">
                  <a href="?module=barang_masuk" class="btn btn-default btn-reset">Batal</a>
                </div>
              </div>
            </div><!-- /.box footer -->
          </form>
        </div><!-- /.box -->
      </div><!--/.col -->
    </div>   <!-- /.row -->
  </section><!-- /.content -->
