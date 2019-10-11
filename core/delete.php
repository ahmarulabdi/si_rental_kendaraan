<?php
	if (isset($_GET['username'])) {
		$username=$_GET['username'];
		$query=mysqli_query($conn,"Delete FROM pengguna WHERE username='$username'");
    if ($query) {
      header(sprintf('Location:?user=pengguna'));
    }
		else {
			header(sprintf('location:?user=pengguna&false'));
		}
	}
	else if (isset($_GET['id_pelanggan'])) {
		$id_pelanggan=$_GET['id_pelanggan'];
		$query=mysqli_query($conn,"Delete FROM pelanggan WHERE id_pelanggan='$id_pelanggan'");
    $navbar = $_GET['navbar'];
    if ($navbar == 1 ) {
      header(sprintf('Location:?user=pelanggan'));
    }
	}
	else if (isset($_GET['id_kendaraan'])) {
		$id_kendaraan=$_GET['id_kendaraan'];
		$query=mysqli_query($conn,"Delete FROM kendaraan WHERE id_kendaraan='$id_kendaraan'");
    $navbar = $_GET['navbar'];
    if ($navbar == 1 ) {
      header(sprintf('Location:?user=kendaraan'));
    }
	}
	else if (isset($_GET['no_syarat'])) {
		$no_syarat=$_GET['no_syarat'];
		$query=mysqli_query($conn,"Delete FROM syarat WHERE no_syarat='$no_syarat'");
    $navbar = $_GET['navbar'];
    if ($navbar == 1 ) {
      header(sprintf('Location:?user=syarat'));
    }
	}
	else if (isset($_GET['no_ketentuan'])) {
		$no_ketentuan=$_GET['no_ketentuan'];
		$query=mysqli_query($conn,"Delete FROM ketentuan WHERE no_ketentuan='$no_ketentuan'");
    $navbar = $_GET['navbar'];
    if ($navbar == 1 ) {
      header(sprintf('Location:?user=ketentuan'));
    }
	}
	else if (isset($_GET['id_suku_cadang'])) {
		$id_suku_cadang=$_GET['id_suku_cadang'];
		$query ="Delete FROM suku_cadang WHERE id_suku_cadang=$id_suku_cadang";
		$execute=mysqli_query($conn,$query);
		var_dump($query);
		var_dump($execute);
    $navbar = $_GET['navbar'];
    if ($navbar == 1 ) {
      header(sprintf('Location:?user=suku_cadang'));
    }
	}
	else if (isset($_GET['id_unit_kendaraan'])) {
		$id_unit_kendaraan=$_GET['id_unit_kendaraan'];
		$find_perawatan = mysqli_query($conn,$Perawatan." where id_unit_kendaraan = ".$id_unit_kendaraan);
		foreach ($find_perawatan as $r) {
			$id_perawatan = $r['id_perawatan'];
		}
		if ($id_perawatan) {
				header(sprintf('Location:?user=data_unit&useinperawatan'));
		}
		else {
			$get_detail_unit = $Detail_unit_kendaraan;
			var_dump($get_detail_unit);
			$execute = mysqli_query($conn,$get_detail_unit);
			foreach ($execute as $r) {
				$update_kendaraan = "UPDATE kendaraan set
				status_kendaraan = 'tersedia'
				where id_kendaraan = ".$r['id_kendaraan'];
				echo "<br/>";
				var_dump($update_kendaraan);
				$ex_update =mysqli_query($conn,$update_kendaraan);
				var_dump($ex_update);
			}
			$del_detail ="Delete FROM detail_unit_kendaraan WHERE id_unit_kendaraan= ".$id_unit_kendaraan;
			echo "<br/>";
			var_dump($del_detail);
			mysqli_query($conn,$del_detail);
			$get_id_pelanggan = $Unit_kendaraan." where id_unit_kendaraan = ".$id_unit_kendaraan;
			echo "<br/>";
			echo $get_id_pelanggan;
			$ex_id_pelanggan = mysqli_query($conn,$get_id_pelanggan);
			foreach ($ex_id_pelanggan as $r) {
				$id_pelanggan = $r['id_pelanggan'];
				$sql = $Unit_kendaraan." where id_pelanggan = ".$id_pelanggan;
				echo "<br/>";
				var_dump($sql);;
				$execute = mysqli_query($conn,$sql);
				foreach ($execute as $sum_execute) {
					$num_row[] = $sum_execute['id_pelanggan'];
				}
				echo "<br/>";
				echo count($num_row);
				$sum_execute = count($num_row);
				if ($sum_execute <= 1) {
					$update_pelanggan = "UPDATE pelanggan SET
					status_pelanggan = 'tidak merental'
					where id_pelanggan = ".$id_pelanggan;
					echo "<br/>";
					var_dump($update_pelanggan);
					mysqli_query($conn,$update_pelanggan);
				}
			}

			$del_unit = "Delete FROM unit_kendaraan WHERE id_unit_kendaraan=$id_unit_kendaraan";
			echo "<br/>";
			var_dump($del_unit);
			$ext_unit = mysqli_query($conn,$del_unit);
			//var_dump($query);
			// var_dump($execute);
	    $navbar = $_GET['navbar'];
	    if ($navbar == 1 ) {
				if ($hak_akses == 'manager') {
					header(sprintf('Location:?user=data_unit&success'));
				}
				else {
					header(sprintf('location:?user=rental_saya&booking&deletesuccess'));
				}
	    }
		}

	}
	else if (isset($_GET['id_perawatan'])) {
		$id_perawatan = $_GET['id_perawatan'];

		$del_detail_perawatan = "DELETE from detail_perawatan where id_perawatan = ".$id_perawatan;
		$del_perawatan = "DELETE from perawatan where id_perawatan = ".$id_perawatan;
		mysqli_query($conn,$del_detail_perawatan);
		mysqli_query($conn,$del_perawatan);
		if (mysqli_query($conn,$del_perawatan)) {
			header(sprintf('location:?user=perawatan&delsuccess'));
		}
	}
?>
