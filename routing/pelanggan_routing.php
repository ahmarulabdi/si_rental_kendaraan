<?php
if ($_GET) {
	switch ($_GET['user']) {
		// awal
		case '':
			include $pelanggan_dir.'pelanggan_dashboard.php';
		break;
		//pengalihan ketika sudah login
		case 'login':
			include $pelanggan_dir.'pelanggan_dashboard.php';
		break;
		case 'auth':
			include $pelanggan_dir.'pelanggan_dashboard.php';
		break;
		// halaman utama pelanggan
		case 'pelanggan_dashboard':
			include $pelanggan_dir.'pelanggan_dashboard.php';
		break;
		case 'newrental':
			include $pelanggan_dir.'newrental.php';
		break;
		case 'newrentaltrue':
			include $pelanggan_dir.'newrentaltrue.php';
		break;
		case 'review':
			include $pelanggan_dir.'review.php';
		break;
		case 'rental_saya':
			include $pelanggan_dir.'rental_saya.php';
		break;
		case 'perawatan_saya':
			include $pelanggan_dir.'perawatan_saya.php';
		break;

		default:
		# code...
		break;
	}
}
 ?>
