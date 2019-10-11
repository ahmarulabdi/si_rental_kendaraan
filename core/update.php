<?php
	if (isset($_POST['pengguna'])) {
		$old_username = $_POST['old_username'];
		$username =$_POST['username'];
		$password =$_POST['password'];
		// uploadgambar
	    $foto = $_FILES['foto']['name'];
	    $tmp_file = $_FILES['foto']['tmp_name'];
	    // penyimpanan file foto di memori
	    $path = "/home/rndmjcklnx/WEBDEV/SI_Rentalkendaraan/assets/images/avatars/".$foto;
	    move_uploaded_file($tmp_file, $path); // Cek apakah gambar berhasil diupload atau tidak

		$hak_akses =$_POST['hak_akses'];

		$sql = "UPDATE `pengguna` SET
		`username` = '$username',
		`password` = md5('$password'),
		`foto` = '$foto',
		`hak_akses` = '$hak_akses',
		`updated_at` = CURRENT_TIMESTAMP
		WHERE `pengguna`.`username` = '$old_username';";
		$query =mysqli_query($conn,$sql);
		if ($query) {
			header(sprintf('location:?user=pengguna'));
		}
	}
	elseif (isset($_POST['pelanggan'])) {
		$id_pelanggan = $_POST['id_pelanggan'];
		$nama_pelanggan = $_POST['nama_pelanggan'];
		$email = $_POST['email'];
		$no_telepon = $_POST['no_telepon'];
		$alamat = $_POST['alamat'];

		$sql = "UPDATE `pelanggan` SET
		`nama_pelanggan` = '$nama_pelanggan',
		`email` = '$email',
		`no_telepon` = '$no_telepon',
		`alamat` = '$alamat'
		WHERE `pelanggan`.`id_pelanggan` = $id_pelanggan;";

		$query =mysqli_query($conn,$sql);
		header(sprintf('location:?user=pelanggan'));
	}
	elseif (isset($_POST['kendaraan'])){
		$id_kendaraan = $_POST['id_kendaraan'];
		$no_polisi = $_POST['no_polisi'];
		$merk = $_POST['merk'];
		$type = $_POST['type'];
		$warna = $_POST['warna'];
		$tahun_produksi = $_POST['tahun_produksi'];
		$no_mesin = $_POST['no_mesin'];
		$kapasitas_mesin = $_POST['kapasitas_mesin'];
		$biaya_sewa_kendaraan = $_POST['biaya_sewa_kendaraan'];

		$sql = "UPDATE `kendaraan` SET
		`no_polisi` = '$no_polisi',
		`merk` = '$merk',
		`type` = 'type',
		`warna` = '$warna',
		`tahun_produksi` = 'tahun_produksi',
		`no_mesin` = '$no_mesin',
		`biaya_sewa_kendaraan` = '$biaya_sewa_kendaraan'
		WHERE `kendaraan`.`id_kendaraan` = $id_kendaraan;";
		$query =mysqli_query($conn,$sql);
		if ($query) {
			header(sprintf('location:?user=kendaraan'));
		}
	}
	elseif (isset($_POST['syarat'])){
		$no_syarat = $_POST['no_syarat'];
		$nama_syarat = $_POST['nama_syarat'];
		$jenis_syarat = $_POST['jenis_syarat'];
		$rincian_syarat = $_POST['rincian_syarat'];

		$sql = "UPDATE `syarat` SET
		`nama_syarat` = '$nama_syarat',
		`jenis_syarat` = '$jenis_syarat',
		`rincian_syarat` = '$rincian_syarat'
		WHERE `syarat`.`no_syarat` = $no_syarat;";
		var_dump($sql);
		$query =mysqli_query($conn,$sql);
		var_dump($query);
		if ($query) {
			header(sprintf('location:?user=syarat'));
		}
	}
	elseif (isset($_POST['ketentuan'])){
		$no_ketentuan = $_POST['no_ketentuan'];
		$nama_ketentuan = $_POST['nama_ketentuan'];
		$jenis_ketentuan = $_POST['jenis_ketentuan'];
		$rincian_ketentuan = $_POST['rincian_ketentuan'];

		$sql = "UPDATE `ketentuan` SET
		`nama_ketentuan` = '$nama_ketentuan',
		`jenis_ketentuan` = '$jenis_ketentuan',
		`rincian_ketentuan` = '$rincian_ketentuan'
		WHERE `ketentuan`.`no_ketentuan` = $no_ketentuan;";
		$query =mysqli_query($conn,$sql);
		if ($query) {
			header(sprintf('location:?user=ketentuan'));
		}
	}
	elseif (isset($_POST['suku_cadang'])){
		$id_suku_cadang = $_POST['id_suku_cadang'];
		$jenis_suku_cadang = $_POST['jenis_suku_cadang'];
		$nama_suku_cadang = $_POST['nama_suku_cadang'];
		$rincian_suku_cadang = $_POST['rincian_suku_cadang'];
		$harga_satuan = $_POST['harga_satuan'];
		$stok = $_POST['stok'];

		$sql = "UPDATE `suku_cadang` SET
		`jenis_suku_cadang` = '$jenis_suku_cadang',
		`nama_suku_cadang` = '$nama_suku_cadang',
		`rincian_suku_cadang` = '$rincian_suku_cadang',
		`harga_satuan` = $harga_satuan,
		`stok` = $stok
		WHERE `suku_cadang`.`id_suku_cadang` = $id_suku_cadang;";
		$query =mysqli_query($conn,$sql);
		if ($query) {
			header(sprintf('location:?user=suku_cadang'));
		}
	}
	elseif (isset($_POST['booking'])) {
		$tanggal_rental = $_POST['tanggal_rental'];
		$tanggal_kembali = $_POST['tanggal_kembali'];
		if (($tanggal_rental <= date('Y-m-d'))||($tanggal_rental > $tanggal_kembali)) {
			header(sprintf('Location:?user=pelanggan_dashboard&overdates'));
		}
		else {
			$id_kendaraan = $_POST['id_kendaraan'];
			foreach ($id_kendaraan as $id) {
				$sql = "UPDATE `kendaraan` SET
				`status_kendaraan` = 'rental'
				WHERE `kendaraan`.`id_kendaraan` = $id;";
				echo $sql."</br>";
				mysqli_query($conn,$sql);
			}

			$jumlah_kendaraan = count($id_kendaraan);
			$sqlpelanggan = $Pelanggan." where username = '".$username."' ";
			echo $sqlpelanggan;
			$getpelanggan = mysqli_query($conn,$sqlpelanggan);
			foreach ($getpelanggan as $getr) {
				$id_pelanggan = $getr['id_pelanggan'];
				$sql_update_pelanggan ="UPDATE pelanggan SET `status_pelanggan` = 'sedang merental'
				where `pelanggan`.`id_pelanggan` =
				".$id_pelanggan;
				var_dump($sql_update_pelanggan);
				$query_update_pelanggan =mysqli_query($conn,$sql_update_pelanggan);
				var_dump($query_update_pelanggan);
				$id_unit_kendaraan = mt_rand(10,$id_pelanggan*100);
				$current = date('Y-m-d');
				$date = new DateTime($current);
				$date->modify('+7 day');
				$waktu_booking = $date->format('Y-m-d').date(' H:i:s');
				$total_biaya = $_POST['total_biaya'];
				$input = "INSERT INTO
				unit_kendaraan(id_unit_kendaraan,id_pelanggan,jumlah_kendaraan,tanggal_rental,tanggal_kembali,waktu_booking,total_biaya)
				values(
					$id_unit_kendaraan,$id_pelanggan,$jumlah_kendaraan,'$tanggal_rental','$tanggal_kembali','$waktu_booking','$total_biaya'
				)"
				;
				echo '<br/>'.$input;
				$query = mysqli_query($conn,$input);
			}
			foreach ($id_kendaraan as $id_kendaraan_row) {
				$detail_unit = "INSERT INTO detail_unit_kendaraan(id_unit_kendaraan,id_kendaraan)
				values ($id_unit_kendaraan,$id_kendaraan_row)";
				echo '<br/>'.$detail_unit;
				$insert_detail_unit = mysqli_query($conn,$detail_unit);
				if ($insert_detail_unit) {
					header(sprintf('location:?user=rental_saya&booking&bookingsuccess'));
				}
			}
		}
	}
	else if(isset($_POST['perawatan'])){
	  $id_perawatan = $_POST['id_perawatan'];
		$id_unit_kendaraan = $_POST['id_unit_kendaraan'];

		$old_id_suku_cadang = $_POST['old_id_suku_cadang'];//arr
		$old_jumlah_terpakai = $_POST['old_jumlah_terpakai'];
		echo "old<br/>";
		for ($i=0; $i < count($old_id_suku_cadang); $i++) {
			$get_suku_cadang = mysqli_query($conn,$Suku_cadang." where id_suku_cadang = ".$old_id_suku_cadang[$i]);
			foreach ($get_suku_cadang as $r_suku_cadang) {
				$stok = $r_suku_cadang['stok'];
			}
			$reverse_stok = $stok + $old_jumlah_terpakai[$i];
			$query_suku_cadang = "UPDATE suku_cadang set
			stok = ".$reverse_stok." where id_suku_cadang =".$old_id_suku_cadang[$i];
			echo $query_suku_cadang;
			echo "<br/>";
			mysqli_query($conn,$query_suku_cadang);//1kembalikan suku cadang
		}

		$id_suku_cadang = $_POST['id_suku_cadang'];//arr
		$jumlah_terpakai = $_POST['jumlah_terpakai'];//arr
		echo "new<br/>";
		for ($i=0; $i < count($id_suku_cadang) ; $i++) {
			$get_suku_cadang = mysqli_query($conn,$Suku_cadang." where id_suku_cadang = ".$id_suku_cadang[$i]);
			foreach ($get_suku_cadang as $r_suku_cadang) {
				$stok = $r_suku_cadang['stok'];
			}
			$new_stok = $stok - $jumlah_terpakai[$i];
			if ($new_stok <= 0) {
				// $query_suku_cadang = "DELETE from suku_cadang where id_suku_cadang =".$id_suku_cadang[$i];
				// echo $query_suku_cadang;
				// mysqli_query($conn,$query_suku_cadang);
				// $query_detail_perawatan = "DELETE from detail_perawatan where id_suku_cadang =".$id_suku_cadang[$i];
				// echo $query_suku_detail_perawatan;
				// echo "<br/>";
				// mysqli_query($conn,$query_suku_detail_perawatan);
			}
			else {
				$query_suku_cadang = "UPDATE suku_cadang set
				stok = ".$new_stok." where id_suku_cadang =".$id_suku_cadang[$i];
				echo $query_suku_cadang;
				echo "<br/>";
				mysqli_query($conn,$query_suku_cadang);//2ambil suku cadang
				$bool_detail_perawatan = mysqli_query($conn,$Detail_perawatan." where id_suku_cadang=".$id_suku_cadang[$i]);
				foreach ($old_id_suku_cadang as $r_id_suku_cadang) {
					if ($r_id_suku_cadang == $id_suku_cadang[$i] ) {
						$query_update_detail_perawatan = "UPDATE detail_perawatan set
						suku_cadang_terpakai = ".$jumlah_terpakai[$i]." where id_suku_cadang =".$id_suku_cadang[$i];
						echo "if ".$query_update_detail_perawatan;
						mysqli_query($conn,$query_update_detail_perawatan);//3perbaru detail_perawatan
					}
				}
			}

			echo "<br/>";
			echo "<br/>";
		}
		for ($i=0; $i < count($id_suku_cadang) ; $i++) {
			$id = $id_suku_cadang[$i];
			$old_id = $old_id_suku_cadang[$i];
			if ($id != $old_id) {
				$query_insert_detail_perawatan = "INSERT INTO detail_perawatan(
				 			id_perawatan,
				 			id_suku_cadang,
				 			suku_cadang_terpakai
				 		)
				 		values(
				 			$id_perawatan,
				 			$id,
				 			$jumlah_terpakai[$i]
				 		)
				 		";
				 		echo "<br/>else ".$query_insert_detail_perawatan;
						mysqli_query($conn,$query_insert_detail_perawatan);//if3tambahkan detail_perawatan
			}
		}
		echo "<br/>";
		echo "<br/>";



		$jumlah_terpakai_all = array_sum($_POST['jumlah_terpakai']);
		$tindakan = $_POST['tindakan'];
		$biaya_tindakan = $_POST['biaya_tindakan'];
		$total_harga = $_POST['total_harga'];

		$query_update_perawatan = "UPDATE perawatan set
		id_unit_kendaraan = $id_unit_kendaraan,
		jumlah_terpakai = $jumlah_terpakai_all
		where id_perawatan = $id_perawatan
		";
		echo "<br/>";
		echo $query_update_perawatan;
		mysqli_query($conn,$query_update_perawatan);//4perbarui_perawatan
		header(sprintf('location:?user=perawatan'));
	}
	else if (isset($_POST['setuju'])) {
		$id_unit_kendaraan = $_POST['id_unit_kendaraan'];
		$tanggal_kembali = $_POST['tanggal_kembali'];
		$query = "UPDATE unit_kendaraan set
		waktu_booking = '$tanggal_kembali'
		where id_unit_kendaraan = $id_unit_kendaraan
		";
		echo $query;
		$execute = mysqli_query($conn,$query);
		if ($execute) {
			header(sprintf('location:?user=data_unit&unit'));
		}
	}
	else if(isset($_POST['perpanjangan'])){
		if ($_POST['tanggal_kembali'] < $_POST['tanggal_rental']) {
			header(sprintf('location:?user=rental_saya&rental&overdates'));
		}
		else {
			$id_unit_kendaraan = $_POST['id_unit_kendaraan'];
			$current = date('Y-m-d');
			$date = new DateTime($current);
			$date->modify('+7 day');
			$waktu_booking = $date->format('Y-m-d').date(' H:i:s');
			$query = "UPDATE unit_kendaraan SET tanggal_rental = '".$_POST['tanggal_rental']."',
				tanggal_kembali = '".$_POST['tanggal_kembali']."',
				waktu_booking = '".$waktu_booking."'
				where id_unit_kendaraan =
			".$id_unit_kendaraan;
			echo $query;
			$execute = mysqli_query($conn,$query);
			var_dump($execute);
			if ($execute) {
				header(sprintf("location:?user=rental_saya&booking"));
			}
		}
	}
?>
