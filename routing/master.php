<?php
$die = "<h3>File Not Found !</h3>";
$manager_dir = 'pages/manager/';
$admin_dir = 'pages/administrator/';
$pelanggan_dir = 'pages/pelanggan/';

// session ketika sesudah login
if (isset($_SESSION['SES_rentalkendaraan'])) {
  include 'config/user.php';

  if ($hak_akses == 'administrator') {
    require_once 'administrator_routing.php';
  }
  else if ($hak_akses == 'manager') {
    require_once 'manager_routing.php';
  }
  else {
    require_once 'pelanggan_routing.php';
  }
  switch ($_GET['user']) {
  //CRUD
  case 'create':
    if(!file_exists ('core/create.php')) die ($die);
    include 'core/create.php'; break;
  case 'update':
    if(!file_exists ('core/update.php')) die ($die);
    include 'core/update.php'; break;
  case 'delete':
    if(!file_exists ('core/delete.php')) die ($die);
    include 'core/delete.php'; break;
    //Pengguna
  case 'pengguna':
    include 'pages/pengguna.php';
  break;

  case '404':
    if(!file_exists ('pages/404.php')) die ($die);
    include 'pages/404.php'; break;
  // logout
  case 'logout':
    include 'pages/logout.php';
    break;
  }
}
// session sebelum login
else {
  if ($_GET) {
    // menampilkan menu ?open
    switch ($_GET['user']) {
    // login
    case '':
    if(!file_exists ("pages/login.php")) die ($die);
    include "pages/login.php";break;
    case 'login':
    if(!file_exists ('pages/login.php')) die ($die);
    include 'pages/login.php'; break;
    case 'auth':
    if(!file_exists ('core/auth.php')) die ($die);
    include 'core/auth.php'; break;

    //CRUD
    case 'create':
      if(!file_exists ('core/create.php'))
      die ($die);
      include 'core/create.php';
    break;
    case 'update':
      if(!file_exists ('core/update.php'))
      die ($die);
      include 'core/update.php';
    break;
    case 'delete':
      if(!file_exists ('core/delete.php'))
      die ($die);
      include 'core/delete.php';
    break;
    // logout
    case 'logout':
      if(!file_exists ('pages/logout.php')) die ($die);
      include 'pages/logout.php';
   break;
    }
  }
  else {
    if(!file_exists ('pages/login.php')) die ($die);
    include 'pages/login.php';
  }

}
?>
