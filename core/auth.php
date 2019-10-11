<?php
if(isset($_POST['btnlogin'])){
	$txtusername = $_POST['txtusername'];
  	$txtpassword = $_POST['txtpassword'];
  	$mysql = "SELECT * from pengguna where username = '$txtusername' AND password = md5('$txtpassword') ";
	$myquery = mysqli_query($conn,$mysql);
  	$r = mysqli_fetch_array($myquery);
  	if (mysqli_num_rows($myquery) >= 1) {
	  	$_SESSION['SES_rentalkendaraan'] = $r['username'];
	  	$hak_akses = $r['hak_akses'];
		if ($hak_akses == 'administrator') {
			header(sprintf('Location:?user=admin_dashboard'));
		}
		else if($hak_akses == 'manager') {
			header(sprintf('Location:?user=manager_dashboard'));
    }
		else if($hak_akses == 'pelanggan') {
			header(sprintf('Location:?user=pelanggan_dashboard&all'));
    }
	}
	else {
		header(sprintf('Location:?user=login'));
	}
}
?>
