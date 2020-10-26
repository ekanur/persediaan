
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
	}

	// jika menu Data Barang dipilih, menu Data Barang aktif
	if ($_GET["module"]=="barang" || $_GET["module"]=="form_barang") { ?>
		<li class="active treeview">
          	<a href="javascript:void(0);">
            	<i class="fa fa-folder"></i> <span>Data Master</span> <i class="fa fa-angle-left pull-right"></i>
          	</a>
      		<ul class="treeview-menu">
        		<li class="active"><a href="?module=barang"><i class="fa fa-circle-o"></i> Data Barang</a></li>
        		<li><a href="?module=jenis"><i class="fa fa-circle-o"></i> Jenis Barang</a></li>
        		<li><a href="?module=satuan"><i class="fa fa-circle-o"></i> Satuan</a></li>
      		</ul>
    	</li>
    <?php
	}
	// jika menu Jenis Barang dipilih, menu Jenis Barang aktif
	elseif ($_GET["module"]=="jenis" || $_GET["module"]=="form_jenis") { ?>
		<li class="active treeview">
          	<a href="javascript:void(0);">
            	<i class="fa fa-folder"></i> <span>Data Master</span> <i class="fa fa-angle-left pull-right"></i>
          	</a>
      		<ul class="treeview-menu">
        		<li><a href="?module=barang"><i class="fa fa-circle-o"></i> Data Barang</a></li>
        		<li class="active"><a href="?module=jenis"><i class="fa fa-circle-o"></i> Jenis Barang</a></li>
        		<li><a href="?module=satuan"><i class="fa fa-circle-o"></i> Satuan</a></li>
      		</ul>
    	</li>
    <?php
	}
	// jika menu Satuan dipilih, menu Satuan aktif
	elseif ($_GET["module"]=="satuan" || $_GET["module"]=="form_satuan") { ?>
		<li class="active treeview">
          	<a href="javascript:void(0);">
            	<i class="fa fa-folder"></i> <span>Data Master</span> <i class="fa fa-angle-left pull-right"></i>
          	</a>
      		<ul class="treeview-menu">
        		<li><a href="?module=barang"><i class="fa fa-circle-o"></i> Data Barang</a></li>
        		<li><a href="?module=jenis"><i class="fa fa-circle-o"></i> Jenis Barang</a></li>
        		<li class="active"><a href="?module=satuan"><i class="fa fa-circle-o"></i> Satuan</a></li>
      		</ul>
    	</li>
    <?php
	}
	// jika menu Data Master tidak dipilih, menu Data Master tidak aktif
	else { ?>
		<li class="treeview">
          	<a href="javascript:void(0);">
            	<i class="fa fa-folder"></i> <span>Data Master</span> <i class="fa fa-angle-left pull-right"></i>
          	</a>
      		<ul class="treeview-menu">
        		<li><a href="?module=barang"><i class="fa fa-circle-o"></i> Data Barang</a></li>
        		<li><a href="?module=jenis"><i class="fa fa-circle-o"></i> Jenis Barang</a></li>
        		<li><a href="?module=satuan"><i class="fa fa-circle-o"></i> Satuan</a></li>
      		</ul>
    	</li>
    <?php
	}

	// jika menu Barang Masuk dipilih, menu Barang Masuk aktif
	if ($_GET["module"]=="barang_masuk" || $_GET["module"]=="form_barang_masuk") { ?>
		<li class="active treeview">
          	<a href="javascript:void(0);">
            	<i class="fa fa-clone"></i> <span>Transaksi</span> <i class="fa fa-angle-left pull-right"></i>
          	</a>
      		<ul class="treeview-menu">
        		<li class="active"><a href="?module=barang_masuk"><i class="fa fa-circle-o"></i> Barang Masuk</a></li>
        		<li><a href="?module=barang_keluar"><i class="fa fa-circle-o"></i> Barang Keluar</a></li>
      		</ul>
    	</li>
    <?php
	}
	// jika menu Barang Keluar dipilih, menu Barang Keluar aktif
	elseif ($_GET["module"]=="barang_keluar" || $_GET["module"]=="form_barang_keluar") { ?>
		<li class="active treeview">
          	<a href="javascript:void(0);">
            	<i class="fa fa-clone"></i> <span>Transaksi</span> <i class="fa fa-angle-left pull-right"></i>
          	</a>
      		<ul class="treeview-menu">
        		<li><a href="?module=barang_masuk"><i class="fa fa-circle-o"></i> Barang Masuk</a></li>
        		<li class="active"><a href="?module=barang_keluar"><i class="fa fa-circle-o"></i> Barang Keluar</a></li>
      		</ul>
    	</li>
    <?php
	}
	// jika menu Transaksi tidak dipilih, menu Transaksi tidak aktif
	else { ?>
		<li class="treeview">
          	<a href="javascript:void(0);">
            	<i class="fa fa-clone"></i> <span>Transaksi</span> <i class="fa fa-angle-left pull-right"></i>
          	</a>
      		<ul class="treeview-menu">
        		<li><a href="?module=barang_masuk"><i class="fa fa-circle-o"></i> Barang Masuk</a></li>
        		<li><a href="?module=barang_keluar"><i class="fa fa-circle-o"></i> Barang Keluar</a></li>
      		</ul>
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

	// jika menu Data Barang dipilih, menu Data Barang aktif
	if ($_GET["module"]=="barang" || $_GET["module"]=="form_barang") { ?>
		<li class="active treeview">
          	<a href="javascript:void(0);">
            	<i class="fa fa-folder"></i> <span>Data Master</span> <i class="fa fa-angle-left pull-right"></i>
          	</a>
      		<ul class="treeview-menu">
        		<li class="active"><a href="?module=barang"><i class="fa fa-circle-o"></i> Data Barang</a></li>
        		<li><a href="?module=jenis"><i class="fa fa-circle-o"></i> Jenis Barang</a></li>
        		<li><a href="?module=satuan"><i class="fa fa-circle-o"></i> Satuan</a></li>
      		</ul>
    	</li>
    <?php
	}
	// jika menu Jenis Barang dipilih, menu Jenis Barang aktif
	elseif ($_GET["module"]=="jenis" || $_GET["module"]=="form_jenis") { ?>
		<li class="active treeview">
          	<a href="javascript:void(0);">
            	<i class="fa fa-folder"></i> <span>Data Master</span> <i class="fa fa-angle-left pull-right"></i>
          	</a>
      		<ul class="treeview-menu">
        		<li><a href="?module=barang"><i class="fa fa-circle-o"></i> Data Barang</a></li>
        		<li class="active"><a href="?module=jenis"><i class="fa fa-circle-o"></i> Jenis Barang</a></li>
        		<li><a href="?module=satuan"><i class="fa fa-circle-o"></i> Satuan</a></li>
      		</ul>
    	</li>
    <?php
	}
	// jika menu Satuan dipilih, menu Satuan aktif
	elseif ($_GET["module"]=="satuan" || $_GET["module"]=="form_satuan") { ?>
		<li class="active treeview">
          	<a href="javascript:void(0);">
            	<i class="fa fa-folder"></i> <span>Data Master</span> <i class="fa fa-angle-left pull-right"></i>
          	</a>
      		<ul class="treeview-menu">
        		<li><a href="?module=barang"><i class="fa fa-circle-o"></i> Data Barang</a></li>
        		<li><a href="?module=jenis"><i class="fa fa-circle-o"></i> Jenis Barang</a></li>
        		<li class="active"><a href="?module=satuan"><i class="fa fa-circle-o"></i> Satuan</a></li>
      		</ul>
    	</li>
    <?php
	}
	// jika menu Data Master tidak dipilih, menu Data Master tidak aktif
	else { ?>
		<li class="treeview">
          	<a href="javascript:void(0);">
            	<i class="fa fa-folder"></i> <span>Data Master</span> <i class="fa fa-angle-left pull-right"></i>
          	</a>
      		<ul class="treeview-menu">
        		<li><a href="?module=barang"><i class="fa fa-circle-o"></i> Data Barang</a></li>
        		<li><a href="?module=jenis"><i class="fa fa-circle-o"></i> Jenis Barang</a></li>
        		<li><a href="?module=satuan"><i class="fa fa-circle-o"></i> Satuan</a></li>
      		</ul>
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
	if ($_GET["module"]=="barang_masuk" || $_GET["module"]=="form_barang_masuk") { ?>
		<li class="active treeview">
          	<a href="javascript:void(0);">
            	<i class="fa fa-clone"></i> <span>Transaksi</span> <i class="fa fa-angle-left pull-right"></i>
          	</a>
      		<ul class="treeview-menu">
        		<li class="active"><a href="?module=barang_masuk"><i class="fa fa-circle-o"></i> Barang Masuk</a></li>
        		<li><a href="?module=barang_keluar"><i class="fa fa-circle-o"></i> Barang Keluar</a></li>
      		</ul>
    	</li>
    <?php
	}
	// jika menu Barang Keluar dipilih, menu Barang Keluar aktif
	elseif ($_GET["module"]=="barang_keluar" || $_GET["module"]=="form_barang_keluar") { ?>
		<li class="active treeview">
          	<a href="javascript:void(0);">
            	<i class="fa fa-clone"></i> <span>Transaksi</span> <i class="fa fa-angle-left pull-right"></i>
          	</a>
      		<ul class="treeview-menu">
        		<li><a href="?module=barang_masuk"><i class="fa fa-circle-o"></i> Barang Masuk</a></li>
        		<li class="active"><a href="?module=barang_keluar"><i class="fa fa-circle-o"></i> Barang Keluar</a></li>
      		</ul>
    	</li>
    <?php
	}
	// jika menu Transaksi tidak dipilih, menu Transaksi tidak aktif
	else { ?>
		<li class="treeview">
          	<a href="javascript:void(0);">
            	<i class="fa fa-clone"></i> <span>Transaksi</span> <i class="fa fa-angle-left pull-right"></i>
          	</a>
      		<ul class="treeview-menu">
        		<li><a href="?module=barang_masuk"><i class="fa fa-circle-o"></i> Barang Masuk</a></li>
        		<li><a href="?module=barang_keluar"><i class="fa fa-circle-o"></i> Barang Keluar</a></li>
      		</ul>
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
?>