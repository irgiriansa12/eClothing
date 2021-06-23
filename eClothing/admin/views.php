<?php
$page = (isset($_GET['p']))? $_GET['p'] : '';
switch($page){
  case 'home': // $page == home (jika isi dari $page adalah home)
    include "views/home.php"; // load file home.php yang ada di folder views
    break;
  
  case 'halaman': // $page == halaman (jika isi dari $page adalah halaman)
    include "views/halaman.php"; // load file halaman.php yang ada di folder views
    break;
  
  case 'tim': // $page == tim (jika isi dari $page adalah tim)
    include "views/tim.php"; // load file tim.php yang ada di folder views
    break;

  case 'produk': // $page == produk (jika isi dari $page adalah produk)
    include "views/produk.php"; // load file produk.php yang ada di folder views
    break;
  
  case 'kontak': // $page == kontak (jika isi dari $page adalah kontak)
    include "views/kontak.php"; // load file kontak.php yang ada di folder views
    break;

  case 'pengguna': // $page == pengguna (jika isi dari $page adalah pengguna)
    include "views/pengguna.php"; // load file pengguna.php yang ada di folder views
    break;
  
  default: // Ini untuk set default jika isi dari $page tidak ada pada 3 kondisi diatas
  include "views/home.php";
}
?>