
<?php 
// fungsi pengecekan level untuk menampilkan menu sesuai dengan hak akses
// jika hak akses = Super Admin, tampilkan menu
if ($_SESSION['hak_akses']=='Super Admin') { ?>
	<!-- sidebar menu start -->
    <ul class="sidebar-menu">
        <li class="header">MAIN MENU</li>

	<?php 
	// fungsi untuk pengecekan menu aktif
	// jika menu home dipilih, menu home aktif
	if ($_GET["module"]=="home") { ?>
		<li class="active">
			<a href="?module=home"><i class="fa fa-home"></i> Beranda </a>
	  	</li>
	<?php
	}
	// jika tidak, menu home tidak aktif
	else { ?>
		<li>
			<a href="?module=home"><i class="fa fa-home"></i> Beranda </a>
	  	</li>
	<?php
	} ?>

	<li class= "<?php if($_GET["module"]=="pengajuan" || $_GET["module"]=="form_pengajuan") { echo "active";} ?> treeview">
		<a href="?module=pengajuan">
			<i class="fa fa-file-text"></i> <span>Pengajuan Barang</span>
		</a>
	</li>
	<?php
	

	// jika menu Laporan Stok Barang dipilih, menu Laporan Stok Barang aktif
	
	// jika menu Laporan Barang Masuk dipilih, menu Laporan Barang Masuk aktif

	// jika menu Laporan tidak dipilih, menu Laporan tidak aktif
	
	// jika menu user dipilih, menu user aktif
	if ($_GET["module"]=="user" || $_GET["module"]=="form_user") { ?>
		<li class="active">
			<a href="?module=user"><i class="fa fa-user"></i> Manajemen User</a>
	  	</li>
	<?php
	}
	// jika tidak, menu user tidak aktif
	else { ?>
		<li>
			<a href="?module=user"><i class="fa fa-user"></i> Manajemen User</a>
	  	</li>
	<?php
	}

	// jika menu ubah password dipilih, menu ubah password aktif
	if ($_GET["module"]=="password") { ?>
		<li class="active">
			<a href="?module=password"><i class="fa fa-lock"></i> Ubah Password</a>
		</li>
	<?php
	}
	// jika tidak, menu ubah password tidak aktif
	else { ?>
		<li>
			<a href="?module=password"><i class="fa fa-lock"></i> Ubah Password</a>
		</li>
	<?php
	}
	?>
	</ul>
	<!--sidebar menu end-->
<?php
}
// jika hak akses = Manajer, tampilkan menu
elseif ($_SESSION['hak_akses']=='Manajer') { ?>
	<!-- sidebar menu start -->
    <ul class="sidebar-menu">
        <li class="header">MAIN MENU</li>

	<?php 
	// fungsi untuk pengecekan menu aktif
	// jika menu home dipilih, menu home aktif
	if ($_GET["module"]=="home") { ?>
		<li class="active">
			<a href="?module=home"><i class="fa fa-home"></i> Beranda </a>
	  	</li>
	<?php
	}
	// jika tidak, menu home tidak aktif
	else { ?>
		<li>
			<a href="?module=home"><i class="fa fa-home"></i> Beranda </a>
	  	</li>
	<?php
	}

	// jika menu Laporan Stok Barang dipilih, menu Laporan Stok Barang aktif
  if ($_GET["module"]=="lap_stok") { ?>
    <li class="active treeview">
            <a href="javascript:void(0);">
              <i class="fa fa-file-text"></i> <span>Laporan</span> <i class="fa fa-angle-left pull-right"></i>
            </a>
          <ul class="treeview-menu">
            <li class="active"><a href="?module=lap_stok"><i class="fa fa-circle-o"></i> Stok Barang</a></li>
            <li><a href="?module=lap_barang_masuk"><i class="fa fa-circle-o"></i> Barang Masuk</a></li>
            <li><a href="?module=lap_barang_keluar"><i class="fa fa-circle-o"></i> Barang Keluar</a></li>
          </ul>
      </li>
    <?php
  }
  // jika menu Laporan Barang Masuk dipilih, menu Laporan Barang Masuk aktif
  elseif ($_GET["module"]=="lap_barang_masuk") { ?>
    <li class="active treeview">
            <a href="javascript:void(0);">
              <i class="fa fa-file-text"></i> <span>Laporan</span> <i class="fa fa-angle-left pull-right"></i>
            </a>
          <ul class="treeview-menu">
            <li><a href="?module=lap_stok"><i class="fa fa-circle-o"></i> Stok Barang</a></li>
            <li class="active"><a href="?module=lap_barang_masuk"><i class="fa fa-circle-o"></i> Barang Masuk</a></li>
            <li><a href="?module=lap_barang_keluar"><i class="fa fa-circle-o"></i> Barang Keluar</a></li>
          </ul>
      </li>
    <?php
  }
  // jika menu Laporan Barang Keluar dipilih, menu Laporan Barang Keluar aktif
  elseif ($_GET["module"]=="lap_barang_keluar") { ?>
    <li class="active treeview">
            <a href="javascript:void(0);">
              <i class="fa fa-file-text"></i> <span>Laporan</span> <i class="fa fa-angle-left pull-right"></i>
            </a>
          <ul class="treeview-menu">
            <li><a href="?module=lap_stok"><i class="fa fa-circle-o"></i> Stok Barang</a></li>
            <li><a href="?module=lap_barang_masuk"><i class="fa fa-circle-o"></i> Barang Masuk</a></li>
            <li class="active"><a href="?module=lap_barang_keluar"><i class="fa fa-circle-o"></i> Barang Keluar</a></li>
          </ul>
      </li>
    <?php
  }
  // jika menu Laporan tidak dipilih, menu Laporan tidak aktif
  else { ?>
    <li class="treeview">
            <a href="javascript:void(0);">
              <i class="fa fa-file-text"></i> <span>Laporan</span> <i class="fa fa-angle-left pull-right"></i>
            </a>
          <ul class="treeview-menu">
            <li><a href="?module=lap_stok"><i class="fa fa-circle-o"></i> Stok Barang</a></li>
            <li><a href="?module=lap_barang_masuk"><i class="fa fa-circle-o"></i> Barang Masuk</a></li>
            <li><a href="?module=lap_barang_keluar"><i class="fa fa-circle-o"></i> Barang Keluar</a></li>
          </ul>
      </li>
    <?php
  }

	// jika menu ubah password dipilih, menu ubah password aktif
	if ($_GET["module"]=="password") { ?>
		<li class="active">
			<a href="?module=password"><i class="fa fa-lock"></i> Ubah Password</a>
		</li>
	<?php
	}
	// jika tidak, menu ubah password tidak aktif
	else { ?>
		<li>
			<a href="?module=password"><i class="fa fa-lock"></i> Ubah Password</a>
		</li>
	<?php
	}
	?>
	</ul>
	<!--sidebar menu end-->
<?php
}
// jika hak akses = Gudang, tampilkan menu
if ($_SESSION['hak_akses']=='Gudang') { ?>
	<!-- sidebar menu start -->
    <ul class="sidebar-menu">
        <li class="header">MAIN MENU</li>

	<?php 
	// fungsi untuk pengecekan menu aktif
	// jika menu home dipilih, menu home aktif
	if ($_GET["module"]=="home") { ?>
		<li class="active">
			<a href="?module=home"><i class="fa fa-home"></i> Beranda </a>
	  	</li>
	<?php
	}
	// jika tidak, menu home tidak aktif
	else { ?>
		<li>
			<a href="?module=home"><i class="fa fa-home"></i> Beranda </a>
	  	</li>
	<?php
	}
?>
	
		<li class= "<?php if($_GET["module"]=="pengajuan" || $_GET["module"]=="form_pengajuan") { echo "active";} ?> treeview">
				<a href="?module=pengajuan">
				  <i class="fa fa-file-text"></i> <span>Pengajuan Barang</span> <i class="fa fa-angle-left pull-right"></i>
				</a>
		  </li>
		<?php

	// jika menu Barang Masuk dipilih, menu Barang Masuk aktif
	
	// jika menu ubah password dipilih, menu ubah password aktif
	if ($_GET["module"]=="password") { ?>
		<li class="active">
			<a href="?module=password"><i class="fa fa-lock"></i> Ubah Password</a>
		</li>
	<?php
	}
	// jika tidak, menu ubah password tidak aktif
	else { ?>
		<li>
			<a href="?module=password"><i class="fa fa-lock"></i> Ubah Password</a>
		</li>
	<?php
	}
	?>
	</ul>
	<!--sidebar menu end-->
<?php
}
?>