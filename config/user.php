<?php
  include 'conn.php';
  $user = $_SESSION['SES_rentalkendaraan'];
  $sql = $Pengguna."where username = '$user' " ;
  $query = mysqli_query($conn,$sql);
  $r = mysqli_fetch_array($query);
  $hak_akses = $r['hak_akses'];
  $username = $r['username'];
 ?>
