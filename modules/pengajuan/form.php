<?php
if (isset($_GET['id'])) {

    $id = $_GET['id'];
} else {
}
$query = mysqli_query($mysqli, "SELECT stok,nama_barang,nama_satuan FROM `is_barang` INNER JOIN is_satuan ON is_barang.id_satuan = is_satuan.id_satuan WHERE id_barang = '$id'");
$row = mysqli_fetch_assoc($query);
?>
<style>
    p {
        display: inline-block;
    }

    #mantap {
        border: 3px solid black;
    }
</style>

<section class="content-header">
    <h1>
        <i class="fa fa-edit icon-title"></i> Pengajuan Barang
    </h1>
    <ol class="breadcrumb">
        <li><a href="?module=home"><i class="fa fa-home"></i> Beranda </a></li>
        <li><a href="?module=barang">Pengajuan Barang </a></li>
        <li class="active">Form </li>
    </ol>
</section>
<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.7.3/dist/alpine.min.js" defer></script>
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <!-- form start -->
                <form role="form" class="form-horizontal" action="modules/pengajuan/proses.php?act=insert" method="POST">
                    <div class="box-body">
                        <input type="hidden" class="form-control" name="id_user" autocomplete="off" value="<?php echo $_SESSION['id_user']; ?>" readonly required>
                        <input type="hidden" class="form-control" name="tanggal" autocomplete="off" value="<?php echo date("Y-m-d"); ?>" readonly required>
                        <input type="hidden" class="form-control" name="approve" autocomplete="off" value="" readonly required>
                        <input type="hidden" class="form-control" name="satuanku" autocomplete="off" value="<?php echo $row['nama_satuan']; ?>" readonly required>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">ID Barang</label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" name="id_barang" value="<?php echo $_GET['id']; ?>" readonly required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Nama Barang</label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" name="nama_barang" autocomplete="off" value="<?php echo $row['nama_barang']; ?>" readonly required>
                            </div>
                        </div>
                        <div x-data="{stok:''}" class="form-group">
                            <label class="col-sm-2">Jumlah Barang</label>
                            <div class="col-sm-3">
                                <input x-model="stok" required type="number" class="form-control" name="jumlah" min="1" max="<?= $row['stok'] ?>" placeholder="Stok Saat Ini  <?php echo $row['stok']; ?> <?php echo $row['nama_satuan']; ?>" max="<?php echo $row['stok']; ?>" aria-describedby="basic-addon2">
                            </div>
                            <label class="col-sm-4">Stok Sisa :  <p x-text="<?= $row['stok'] ?> - stok"><?php echo $row['nama_satuan']; ?></p>
                                    <?= $row['nama_satuan']; ?></label>
                            
                                    
                            <!-- <div class="input-group-append">
                                <span class="input-group-text" id="basic-addon2"></span>
                            </div> -->
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
                                    $query_jenis = mysqli_query($mysqli, "SELECT * FROM is_jenis_barang ORDER BY id_jenis ASC")
                                        or die('Ada kesalahan pada query tampil jenis barang: ' . mysqli_error($mysqli));
                                    while ($data_jenis = mysqli_fetch_assoc($query_jenis)) {
                                        echo "<option value=\"$data_jenis[id_jenis]\"> $data_jenis[nama_jenis] </option>";
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
                                        or die('Ada kesalahan pada query tampil satuan: ' . mysqli_error($mysqli));
                                    while ($data_satuan = mysqli_fetch_assoc($query_satuan)) {
                                        echo "<option value=\"$data_satuan[id_satuan]\"> $data_satuan[nama_satuan] </option>";
                                    }
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