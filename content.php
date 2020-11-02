
<?php
/* panggil file database.php untuk koneksi ke database */
require_once "config/database.php";
/* panggil file fungsi tambahan */
require_once "config/fungsi_tanggal.php";

// fungsi untuk pengecekan status login user 
// jika user belum login, alihkan ke halaman login dan tampilkan message = 1
if (empty($_SESSION['username']) && empty($_SESSION['password'])){
	echo "<meta http-equiv='refresh' content='0; url=index.php?alert=1'>";
}
// jika user sudah login, maka jalankan perintah untuk pemanggilan file halaman konten
else {
	// jika halaman konten yang dipilih home, panggil file view home
	if ($_GET['module'] == 'home') {
		include "modules/beranda/view.php";
	}

	// jika halaman konten yang dipilih barang, panggil file view barang
	elseif ($_GET['module'] == 'barang') {
		include "modules/barang/view.php";
	}

	elseif ($_GET['module'] == 'pengajuan') {
		include "modules/pengajuan/view.php";
	}

	elseif ($_GET['module'] == 'form_pengajuan') {
		include "modules/pengajuan/form.php";
	}
	elseif ($_GET['module'] == 'form_pengajuan_baru') {
		include "modules/pengajuan/form_baru.php";
	}

	// jika halaman konten yang dipilih form barang, panggil file form barang
	elseif ($_GET['module'] == 'form_barang') {
		include "modules/barang/form.php";
	}
	// -----------------------------------------------------------------------------
	
	// jika halaman konten yang dipilih jenis, panggil file view jenis
	elseif ($_GET['module'] == 'jenis') {
		include "modules/jenis/view.php";
	}

	// jika halaman konten yang dipilih form jenis, panggil file form jenis
	elseif ($_GET['module'] == 'form_jenis') {
		include "modules/jenis/form.php";
	}
	// -----------------------------------------------------------------------------

	// jika halaman konten yang dipilih satuan, panggil file view satuan
	elseif ($_GET['module'] == 'satuan') {
		include "modules/satuan/view.php";
	}

	// jika halaman konten yang dipilih form satuan, panggil file form satuan
	elseif ($_GET['module'] == 'form_satuan') {
		include "modules/satuan/form.php";
	}
	// -----------------------------------------------------------------------------
	
	// jika halaman konten yang dipilih barang masuk, panggil file view barang masuk
	elseif ($_GET['module'] == 'barang_masuk') {
		include "modules/barang-masuk/view.php";
	}

	// jika halaman konten yang dipilih form barang masuk, panggil file form barang masuk
	elseif ($_GET['module'] == 'form_barang_masuk') {
		include "modules/barang-masuk/form.php";
	}
	// -----------------------------------------------------------------------------

	// jika halaman konten yang dipilih barang keluar, panggil file view barang keluar
	elseif ($_GET['module'] == 'barang_keluar') {
		include "modules/barang-keluar/view.php";
	}

	// jika halaman konten yang dipilih form barang keluar, panggil file form barang keluar
	elseif ($_GET['module'] == 'form_barang_keluar') {
		include "modules/barang-keluar/form.php";
	}
	// -----------------------------------------------------------------------------

	// jika halaman konten yang dipilih laporan stok, panggil file view laporan stok
	elseif ($_GET['module'] == 'lap_stok') {
		include "modules/lap-stok/view.php";
	}

	
	// -----------------------------------------------------------------------------

	// jika halaman konten yang dipilih laporan barang masuk, panggil file view laporan barang masuk
	elseif ($_GET['module'] == 'lap_barang_masuk') {
		include "modules/lap-barang-masuk/view.php";
	}
	// -----------------------------------------------------------------------------

	// jika halaman konten yang dipilih laporan barang keluar, panggil file view laporan barang keluar
	elseif ($_GET['module'] == 'lap_barang_keluar') {
		include "modules/lap-barang-keluar/view.php";
	}
	// -----------------------------------------------------------------------------

	// jika halaman konten yang dipilih grafik barang masuk, panggil file view grafik barang masuk
	elseif ($_GET['module'] == 'grafik_barang_masuk') {
		include "modules/grafik-barang-masuk/view.php";
	}
	// -----------------------------------------------------------------------------

	// jika halaman konten yang dipilih grafik barang keluar, panggil file view grafik barang keluar
	elseif ($_GET['module'] == 'grafik_barang_keluar') {
		include "modules/grafik-barang-keluar/view.php";
	}
	// -----------------------------------------------------------------------------

	// jika halaman konten yang dipilih user, panggil file view user
	elseif ($_GET['module'] == 'user') {
		include "modules/user/view.php";
	}

	// jika halaman konten yang dipilih form user, panggil file form user
	elseif ($_GET['module'] == 'form_user') {
		include "modules/user/form.php";
	}
	// -----------------------------------------------------------------------------

	// jika halaman konten yang dipilih profil, panggil file view profil
	elseif ($_GET['module'] == 'profil') {
		include "modules/profil/view.php";
	}

	// jika halaman konten yang dipilih form profil, panggil file form profil
	elseif ($_GET['module'] == 'form_profil') {
		include "modules/profil/form.php";
	}
	// -----------------------------------------------------------------------------
	
	// jika halaman konten yang dipilih password, panggil file view password
	elseif ($_GET['module'] == 'password') {
		include "modules/password/view.php";
	}

	elseif ($_GET['module'] == 'chart') {
		include "modules/lap-barang-keluar/chart.php";
	}
}
?>