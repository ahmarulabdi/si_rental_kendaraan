<?php
if (isset($_POST['pengguna'])) {
  $username = $_POST['username'];
  $password = $_POST['password'];
  $hak_akses = $_POST['hak_akses'];
  // uploadgambar
   $foto = $_FILES['foto']['name'];
   $tmp_file = $_FILES['foto']['tmp_name'];
   // penyimpanan file foto di memori
   $path = "/home/rndmjcklnx/WEBDEV/SI_Rentalkendaraan/assets/images/avatars/".$foto;
   move_uploaded_file($tmp_file, $path); // Cek apakah gambar berhasil diupload atau tidak

  $query = "INSERT INTO `pengguna`(
    `username`,`password`,`hak_akses`,`foto`,`created_at`,`updated_at`)
    VALUES ('$username',md5('$password'),'$hak_akses','$foto',CURRENT_TIMESTAMP,CURRENT_TIMESTAMP)";

  $execute =mysqli_query($conn,$query);
  if ($execute) {
     header(sprintf('Location:?user=pengguna'));
  }
}
else if (isset($_POST['pelanggan'])) {
  $nama_pelanggan = $_POST['nama_pelanggan'];
  $username = $_POST['username'];
  $email = $_POST['email'];
  $no_telepon = $_POST['no_telepon'];
  $alamat = $_POST['alamat'];
  $query = "INSERT INTO `pelanggan`(
    `nama_pelanggan`,`username`,`email`,`no_telepon`,`alamat`)
    VALUES ('$nama_pelanggan','$username','$email','$no_telepon','$alamat')";
   var_dump($query);
  $execute =mysqli_query($conn,$query);
  if ($execute) {
     header(sprintf('Location:?user=pelanggan'));
  }
}
else if (isset($_POST['registrasi'])) {
   $username = $_POST['username'];
   $password = $_POST['password'];
   $hak_akses = 'pelanggan';
   // uploadgambar
    $foto = $_FILES['foto']['name'];
    $tmp_file = $_FILES['foto']['tmp_name'];
    // penyimpanan file foto di memori
    $path = "/home/rndmjcklnx/WEBDEV/SI_Rentalkendaraan/assets/images/avatars/".$foto;
    move_uploaded_file($tmp_file, $path); // Cek apakah gambar berhasil diupload atau tidak

   $nama_pelanggan = $_POST['nama_pelanggan'];
   $alamat = $_POST['alamat'];
   $email = $_POST['email'];
   $no_telepon = $_POST['no_telepon'];

   $querypengguna = "INSERT INTO `pengguna`(
         `username`,`password`,`hak_akses`,`foto`)
         VALUES ('$username',md5('$password'),'$hak_akses','$foto')";
   $querypelanggan = "INSERT INTO `pelanggan`(
      `nama_pelanggan`,`username`,`email`,`no_telepon`,`alamat`)
      VALUES ('$nama_pelanggan','$username','$email',$no_telepon,'$alamat')";
      $encriptusername = md5($username);
      $executepengguna =mysqli_query($conn,$querypengguna);
      $executepelanggan =mysqli_query($conn,$querypelanggan);
      if ($executepengguna && $executepelanggan) {
         header(sprintf('Location:?user=login&success='.$encriptusername));
      }

}
else if(isset($_POST['kendaraan'])){
   $no_polisi = $_POST['no_polisi'];
   $merk = $_POST['merk'];
   $type = $_POST['type'];
   $warna = $_POST['warna'];
   $tahun_produksi = $_POST['tahun_produksi'];
   $no_mesin = $_POST['no_mesin'];
   $kapasitas_mesin = $_POST['kapasitas_mesin'];
   $biaya_sewa_kendaraan = $_POST['biaya_sewa_kendaraan'];
   $query = "INSERT INTO `kendaraan`(
     `no_polisi`,`merk`,`type`,`warna`,`tahun_produksi`
     ,`no_mesin`,`kapasitas_mesin`,`biaya_sewa_kendaraan`,`created_at`,`updated_at`)
      VALUES ('$no_polisi','$merk','$type','$warna'
         ,'$tahun_produksi','$no_mesin','$kapasitas_mesin','$biaya_sewa_kendaraan'
         ,CURRENT_TIMESTAMP,CURRENT_TIMESTAMP)";
   $execute =mysqli_query($conn,$query);
   if ($execute) {
      header(sprintf('Location:?user=kendaraan'));
   }
}
else if(isset($_POST['syarat'])){
   $nama_syarat = $_POST['nama_syarat'];
   $jenis_syarat = $_POST['jenis_syarat'];
   $rincian_syarat = $_POST['rincian_syarat'];
   $query = "INSERT INTO `syarat`(
      `nama_syarat`,`jenis_syarat`,`rincian_syarat`)
      VALUES('$nama_syarat','$jenis_syarat','$rincian_syarat')";
   var_dump($query);
   $execute =mysqli_query($conn,$query);
   var_dump($execute);
   if ($execute) {
      header(sprintf('Location:?user=syarat'));
   }
}
else if(isset($_POST['ketentuan'])){
   $nama_ketentuan = $_POST['nama_ketentuan'];
   $jenis_ketentuan = $_POST['jenis_ketentuan'];
   $rincian_ketentuan = $_POST['rincian_ketentuan'];
   $query = "INSERT INTO `ketentuan`(
      `nama_ketentuan`,`jenis_ketentuan`,`rincian_ketentuan`)
      VALUES('$nama_ketentuan','$jenis_ketentuan','$rincian_ketentuan')";
   var_dump($query);
   $execute =mysqli_query($conn,$query);
   var_dump($execute);
   if ($execute) {
      header(sprintf('Location:?user=ketentuan'));
   }
}
else if(isset($_POST['suku_cadang'])){
   $jenis_suku_cadang = $_POST['jenis_suku_cadang'];
   $nama_suku_cadang = $_POST['nama_suku_cadang'];
   $rincian_suku_cadang = $_POST['rincian_suku_cadang'];
   $harga_satuan = $_POST['harga_satuan'];
   $stok = $_POST['stok'];
   $query = "INSERT INTO `suku_cadang`(
      `jenis_suku_cadang`,`nama_suku_cadang`,`rincian_suku_cadang`,`harga_satuan`,`stok`)
      VALUES('$jenis_suku_cadang','$nama_suku_cadang','$rincian_suku_cadang','$harga_satuan','$stok')";
   $execute =mysqli_query($conn,$query);
   var_dump($execute);
   if ($execute) {
      header(sprintf('Location:?user=suku_cadang'));
   }
}
else if(isset($_POST['perawatan'])){
  $id_unit_kendaraan = $_POST['id_unit_kendaraan'];
  $id_suku_cadang_all = $_POST['id_suku_cadang'];
  $jumlah_terpakai = $_POST['jumlah_terpakai'];
  $jumlah_terpakai_all = array_sum($_POST['jumlah_terpakai']);
  $tindakan = $_POST['tindakan'];
  $biaya_tindakan = $_POST['biaya_tindakan'];
  $total_harga = $_POST['total_harga'];

  $id_perawatan = mt_rand(5,$id_unit_kendaraan*10000000);

  $query_perawatan = "INSERT INTO perawatan(id_perawatan,id_unit_kendaraan,jumlah_terpakai,tindakan,biaya_tindakan,total_harga)
  values (
    $id_perawatan,
    $id_unit_kendaraan,
    $jumlah_terpakai_all,
    '$tindakan',
    $biaya_tindakan,
    $total_harga
  )";
  echo $query_perawatan;
   $execute_perawatan =mysqli_query($conn,$query_perawatan);
   var_dump($execute_perawatan);
   for ($i = 0 ; $i < count($id_suku_cadang_all) ;$i++) {
     echo "id".$id_suku_cadang_all[$i];
     echo "</br>";
     echo "terpakai".$jumlah_terpakai[$i];
     $query_stok = $Suku_cadang." where id_suku_cadang = ".$id_suku_cadang_all[$i];
     $getstok = mysqli_query($conn,$query_stok);
     foreach ($getstok as $r) {
       $stok_awal = $r['stok'];
       $stok_akhir = $stok_awal - $jumlah_terpakai[$i];
       $query_detail_perawatan = "INSERT INTO detail_perawatan(
         id_perawatan,id_suku_cadang,suku_cadang_terpakai
       )
       values(
         $id_perawatan,".$r['id_suku_cadang'].",".$jumlah_terpakai[$i]."
       )";
       echo $query_detail_perawatan;
       $execute_detail_perawatan = mysqli_query($conn,$query_detail_perawatan);
       var_dump($execute_detail_perawatan);
       if ($stok_akhir == 0) {
         $query_suku_cadang = "DELETE suku_cadang where id_suku_cadang =".$r['id_suku_cadang'];
         echo $query_suku_cadang;
         echo "</br>";
         $execute_suku_cadang =mysqli_query($conn,$query_suku_cadang);
         var_dump($execute_suku_cadang);
       }else {
         $query_suku_cadang = "UPDATE suku_cadang SET stok = $stok_akhir where id_suku_cadang = ".$r['id_suku_cadang'];
         echo $query_suku_cadang;
         $execute_suku_cadang =mysqli_query($conn,$query_suku_cadang);
         var_dump($execute_suku_cadang);
       }
       echo "</br>";
     }
   }
   if ($execute_perawatan) {
     header(sprintf('Location:?user=perawatan&success'));
   }
}
?>
