<?php
if ($_GET) {
	// menampilkan menu ?open
	switch ($_GET['user']) {
		// awal
		case '':
			include $admin_dir.'admin_dashboard.php';
		break;
		//pengalihan ketika sudah login
		case 'login':
			include $admin_dir.'admin_dashboard.php';
		break;
		case 'auth':
			include $admin_dir.'admin_dashboard.php';
		break;
		// halaman utama admin
		case 'admin_dashboard':
			include $admin_dir.'admin_dashboard.php';
		break;

	}
}
else {
	// halaman utama admin
	include $admin_dir.'admin_dashboard.php';
}
?>
