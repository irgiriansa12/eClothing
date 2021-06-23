<?php
session_start();
if (!isset($_SESSION['login'])) {
    header("Location: login.php");
}
  // koneksi ke database
  require '../koneksi/koneksi.php';
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.83.1">
    <title>Halaman Admin</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/dashboard/">

    

    <!-- Bootstrap core CSS -->
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/css/boxicons.min.css" rel="stylesheet">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>

    
    <!-- Custom styles for this template -->
    <link href="../assets/css/dashboard.css" rel="stylesheet">
  </head>
  <body>
    
<header class="navbar navbar-light sticky-top bg-light flex-md-nowrap p-0 shadow">
  <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="#">
    <i class="bx bxs-t-shirt bx-border bx-tada-hover"></i>
    <b>eClothing</b>
  </a>
  <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search">
  <ul class="navbar-nav px-3">
    <li class="nav-item text-nowrap">
      <a class="nav-link" href="logout.php">Sign out</a>
    </li>
  </ul>
</header>

<div class="container-fluid">
  <div class="row">
    <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
      <div class="position-sticky pt-3">
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link" href="index.php?p=home">
              Dashboard
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="index.php?p=halaman">
              Halaman
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="index.php?p=tim">
              Tim
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="index.php?p=produk">
              Produk
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="index.php?p=kontak">
              Kontak Kami
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="index.php?p=pengguna">
              Pengaturan Pengguna
            </a>
          </li>
        </ul>
      </div>
    </nav>

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">

      <?php include "views.php"; ?>

    </main>
  </div>
</div>

    <script src="../assets/js/bootstrap.bundle.min.js"></script>
  </body>
</html>
