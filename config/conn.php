<?php
$conn = mysqli_connect('localhost','root','rootreload','db_rentcarMCS');
if (!$conn) {
  echo "koneksi gagal";
}
$Pengguna = 'select * from pengguna ';
$Pelanggan = 'select * from pelanggan ';
$Kendaraan = 'select * from kendaraan ';
$Pembayaran = 'select * from pembayaran ';
$Perawatan = 'select * from perawatan ';
$Suku_cadang = 'select * from suku_cadang ';
$Syarat = 'select * from syarat ';
$Ketentuan = 'select * from ketentuan ';
$Unit_kendaraan = 'select * from unit_kendaraan ';
$Booking = 'select * from booking ';
$Detail_unit_kendaraan = 'select * from detail_unit_kendaraan ';
$Detail_perawatan = 'select * from detail_perawatan ';

?>
