<?php
if (isset($_GET['id'])) {

    $id = $_GET['id'];
} else {
}
$query = mysqli_query($mysqli, "SELECT nama_satuan FROM is_satuan");
// $row = mysqli_fetch_assoc($query);
?>
<section class="content-header">
    <h1>
        <i class="fa fa-edit icon-title"></i> Pengajuan Barang Baru
    </h1>
    <ol class="breadcrumb">
        <li><a href="?module=home"><i class="fa fa-home"></i> Beranda </a></li>
        <li><a href="?module=barang">Pengajuan Barang </a></li>
        <li class="active">Form </li>
    </ol>
</section>

<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <!-- form start -->
                <form role="form" class="form-horizontal" action="modules/pengajuan/proses.php?act=baru" method="POST">
                    <div class="box-body">
                        <input type="hidden" class="form-control" name="id_user" autocomplete="off" value="<?php echo $_SESSION['id_user']; ?>" readonly required>
                        <input type="hidden" class="form-control" name="tanggal" autocomplete="off" value="<?php echo date("Y-m-d"); ?>" readonly required>
                        
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Nama Barang</label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" name="nama_barang" value=""  required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Jumlah</label>
                            <div class="col-sm-2">
                                <input type="number" class="form-control" name="jumlah" min="1" placeholder="" max="" aria-describedby="basic-addon2">
                            </div>
                            <label class="col-sm-1 control-label">Stok</label>
                            <div class="col-sm-2">
                                <select name="satuan" id="" class="form-control" required>
                                <?php
                                    while ($data_satuan = mysqli_fetch_assoc($query)) {
                                        echo "<option value=\"$data_satuan[nama_satuan]\"> $data_satuan[nama_satuan] </option>";
                                    }
                                ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="exampleFormControlTextarea1">Alasan Pengajuan </label>
                            <div class="col-sm-5">
                                <textarea class="form-control" name="alasan" id="exampleFormControlTextarea1" rows="3"></textarea>
                            </div>
                        </div>
                        <div class="box-footer">
                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                    <input type="submit" class="btn btn-primary btn-submit" name="ajukan" value="Ajukan">
                                    <a href="?module=home" class="btn btn-default btn-reset">Batal</a>
                                </div>
                            </div>
                        </div>




                        <!-- <div class="form-group">
                            <label class="col-sm-2 control-label">Jenis Barang</label>
                            <div class="col-sm-5">
                                <select class="chosen-select" name="jenis" data-placeholder="-- Pilih Jenis Barang --" autocomplete="off" required>
                                    <option value=""></option>
                                    <?php
                                    // $query_jenis = mysqli_query($mysqli, "SELECT * FROM is_jenis_barang ORDER BY id_jenis ASC")
                                    //     or die('Ada kesalahan pada query tampil jenis barang: ' . mysqli_error($mysqli));
                                    // while ($data_jenis = mysqli_fetch_assoc($query_jenis)) {
                                    //     echo "<option value=\"$data_jenis[id_jenis]\"> $data_jenis[nama_jenis] </option>";
                                    // }
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
                                    // $query_satuan = mysqli_query($mysqli, "SELECT * FROM is_satuan ORDER BY id_satuan ASC")
                                    //     or die('Ada kesalahan pada query tampil satuan: ' . mysqli_error($mysqli));
                                    // while ($data_satuan = mysqli_fetch_assoc($query_satuan)) {
                                    //     echo "<option value=\"$data_satuan[id_satuan]\"> $data_satuan[nama_satuan] </option>";
                                    // }
                                    ?>
                                </select>
                            </div>
                        </div>

                    </div> -->
                        <!-- /.box body

                                    <div class="box-footer">
                                        <div class="form-group">
                                            <div class="col-sm-offset-2 col-sm-10">
                                                <input type="submit" class="btn btn-primary btn-submit" name="simpan" value="Simpan">
                                                <a href="?module=home" class="btn btn-default btn-reset">Batal</a>
                                            </div>
                                        </div>
                                    </div><!-- /.box footer -->
                </form>
            </div><!-- /.box -->
        </div>
        <!--/.col -->
    </div> <!-- /.row -->
</section><!-- /.content -->
<?php