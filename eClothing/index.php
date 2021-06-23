<?php
  require 'koneksi/koneksi.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>eClothing</title>

    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/boxicons.min.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">
</head>
<body>
    <!-- ======= Header ======= -->
    <header id="header">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container">
                <span class="navbar-brand mb-0 h1">
                    <i class="bx bxs-t-shirt bx-border bx-tada-hover"></i>
                    eClothing
                </span>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse order-last" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link bx-fade-right-hover" href="#home">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link bx-fade-right-hover" href="#produk">Produk</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link bx-fade-right-hover" href="#tentang">Tentang Kami</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link bx-fade-right-hover" href="#anggota">Anggota</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link bx-fade-right-hover" href="#hubungi">Hubungi</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header><!-- End Header -->

    <!-- ======= Home Section ======= -->
    <section id="home" class="d-flex align-items-center">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 d-flex flex-column justify-content-center p-5">
                <?php
                    $home = mysqli_query($conn, "SELECT * FROM home WHERE id=1");
                    $h = mysqli_fetch_assoc($home);
                ?>
                    <h1><?php echo $h['deskripsi_1']; ?></h1>
                    <h2><?php echo $h['deskripsi_2']; ?></h2>
                <div>
                    <div class="text-center text-lg-start">
                    <a href="#produk" class="btn">
                        <span>Lihat Produk</span>
                        <i class='bx bxs-chevron-down bx-fade-down'></i>
                    </a>
                    </div>
                </div>
                </div>
                <div class="col-lg-6 hero-img">
                    <img src="assets/images/home.jpg" class="img-fluid" alt="">
                </div>
            </div>
        </div>
    </section><!-- End Home -->

    <!-- ======= Main ======= -->
    <main id="main">
        <!-- ======= Produk Section ======= -->
        <section id="produk" class="produk">
            <div class="container">

            <header class="section-header">
                <h2>Produk</h2>
                <p>Produk Terbaik Kami</p>
            </header>
    
            <div class="row justify-content-center gy-4">
                <?php
                    $produk = mysqli_query($conn, "SELECT * FROM produk");
                    while ($p = mysqli_fetch_array($produk)) {
                ?>
                    <div class="col-lg-3 col-md-6">
                        <div class="box">
                            <img src="assets/images/<?php echo $p['gambar']; ?>" class="img-fluid" alt="">
                            <div class="price"><sup>Rp</sup><?php echo $p['harga']; ?></div>
                            <h3><?php echo $p['nama']; ?></h3>
                            <ul>
                                <li><?php echo $p['jenis']; ?></li>
                            </ul>
                            <a href="#" class="btn-buy">Beli</a>
                        </div>
                    </div>   
                <?php
                    }
                ?> 
            </div>
    
            </div>
        </section><!-- End Produk -->

        <!-- ======= Tentang Section ======= -->
        <section id="tentang">
            <div class="container">
                <div class="row gx-0">
                    <div class="col-lg-6 d-flex align-items-center">
                        <img src="assets/images/tentang.jpg" class="img-fluid" alt="">
                    </div>
        
                    <div class="col-lg-6 d-flex flex-column justify-content-center p-5">
                        <div class="content">
                            <header class="section-header">
                                <h2>Tentang</h2>
                                <p>Tentang Kami</p>
                            </header>
                            <?php
                                $tentang = mysqli_query($conn, "SELECT * FROM tentang WHERE id=1");
                                $t = mysqli_fetch_assoc($tentang);
                            ?>
                            <h2><?php echo $t['judul']; ?></h2>
                            <p><?php echo $t['deskripsi']; ?></p>
                        </div>
                    </div>
        
                </div>
            </div>
        </section><!-- End Tentang -->

        <!-- ======= Hubungi Section ======= -->
        <section id="anggota" class="team">
            <div class="container">
                <header class="section-header">
                  <h2>Anggota</h2>
                  <p>Anggota Kami</p>
                </header>
                <div class="row justify-content-center gy-4">
                <?php
                    $tim = mysqli_query($conn, "SELECT * FROM tim");
                    while ($a = mysqli_fetch_array($tim)) {
                ?>
                    <div class="col-md-3">
                        <div class="card h-100">
                            <img src="assets/images/<?php echo $a['gambar']; ?>" class="card-img-top">
                            <div class="card-body">
                                <h5 class="card-title"><i class="bx bx-tag-alt"></i> <?php echo $a['nama']; ?></h5>
                                <p class="card-text"><b><?php echo $a['nim']; ?></b></p>
                                <p class="card-text"><?php echo $a['tugas']; ?></p>
                            </div>
                        </div>
                    </div>
                <?php
                    }
                ?>
                </div>
              </div>
        </section><!-- End Hubungi -->

        <!-- ======= Hubungi Section ======= -->
        <section id="hubungi" class="contact">
            <div class="container">
            <?php
                $kontak = mysqli_query($conn, "SELECT * FROM kontak WHERE id=1");
                $k = mysqli_fetch_assoc($kontak);
            ?>
                <header class="section-header">
                  <h2>Kontak</h2>
                  <p>Hubungi Kami</p>
                </header>
                <div class="row gy-4">
                  <div class="col-lg-12 text-center">
                    <div class="row gy-4">
                      <div class="col-md-6">
                        <div class="info-box">
                          <i class="bi bi-geo-alt"></i>
                          <h3>Langsung ke eClothing</h3>
                          <p><?php echo $k['alamat']; ?></p>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="info-box">
                          <i class="bi bi-telephone"></i>
                          <h3>Telpon/Whatsapp</h3>
                          <p><?php echo $k['telpon']; ?></p>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="info-box">
                          <i class="bi bi-envelope"></i>
                          <h3>Email</h3>
                          <p><?php echo $k['email']; ?></p>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="info-box">
                          <i class="bi bi-clock"></i>
                          <h3>Jam Kerja</h3>
                          <p><?php echo $k['jam_kerja_buka']; ?> - <?php echo $k['jam_kerja_tutup']; ?></p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
        </section><!-- End Hubungi -->
    </main><!-- End Main -->

    <!-- ======= Footer ======= -->
    <footer id="footer" class="bg-light text-center">
        <div class="container">
            <span class="mb-0 h3">
                <i class="bx bxs-t-shirt bx-border bx-tada-hover"></i>
                eClothing
            </span>
            <p>Kami adalah toko yang diciptakan untuk penampilan terbaik anda.</p>
            <div class="social-links">
                <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
                <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
                <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
            </div>
            <div class="copyright">
                &copy; Copyright
                <strong>
                    <span>
                        eClothing
                    </span>
                </strong>
                2021
            </div>
        </div>
    </footer><!-- End Footer -->
    
    <script src="assets/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
</body>
</html>