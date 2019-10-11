<?php
if ($_GET) {
	// menampilkan menu ?open
	switch ($_GET['user']) {
		// awal
		case '':
			include $manager_dir.'manager_dashboard.php'; break;
		//pengalihan ketika sudah login
		case 'login':
			include $manager_dir.'manager_dashboard.php'; break;
		case 'auth':
			include $manager_dir.'manager_dashboard.php'; break;
		// halaman utama manager
		case 'manager_dashboard':
			include $manager_dir.'manager_dashboard.php'; break;
		//Pelanggan
		case 'pelanggan':
		include $manager_dir.'pelanggan.php'; break;
		//kendaraan
		case 'kendaraan':
		include $manager_dir.'kendaraan.php'; break;
		//syarat
		case 'syarat':
		include $manager_dir.'syarat.php'; break;
		//ketentuan
		case 'ketentuan':
		include $manager_dir.'ketentuan.php'; break;
		//suku_cadang
		case 'suku_cadang':
		include $manager_dir.'suku_cadang.php' ; break;
		//data_unit
		case 'data_unit':
		include $manager_dir.'data_unit.php' ; break;
		//data_booking
		case 'data_booking':
		include $manager_dir.'data_booking.php' ; break;
		//perawatan
		case 'perawatan':
		include $manager_dir.'perawatan.php' ; break;
		//laporan
		case 'laporan':
		include $manager_dir.'laporan.php' ; break;
	}
}
else {
	include $manager_dir.'manager_dashboard.php';
}
?>
