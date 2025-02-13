

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Masjid Alhikmah Payangan </title>
  <meta name="description" content="">
  <meta name="keywords" content="">

  <!-- Favicons -->
  <link href="<?php echo base_url('assets/logo/brand.png'); ?>" rel="icon">
  <link href="<?php echo base_url('assets/logo/brand.png'); ?>" rel="apple-touch-icon">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&family=Marcellus:wght@400&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">

  <!-- Main CSS File -->
  <link href="assets/css/main.css" rel="stylesheet">
  <style>
    .rating {
        color: #ffc107; /* Warna kuning untuk bintang */
        font-size: 1.2em;
        margin-top: 5px;
        }
  </style>
</head>

<body class="index-page">

  <header id="header" class="header d-flex align-items-center position-relative">
    <div class="container-fluid container-xl position-relative d-flex align-items-center justify-content-between">

      <a href="index.html" class="logo d-flex align-items-center">
        <img src="assets/logo/brand.jpg" alt="MasjidAlHikmahPayangan">
        <h4 class="sitename">Masjid AL Hikmah Payangan</h4> 
      </a>

      <nav id="navmenu" class="navmenu">
        <ul>
          <li><a href="<?php echo base_url('/') ?>" class="active">Halaman Utama</a></li>
          <li><a href="<?php echo base_url('/sejarah') ?>">Sejarah</a></li>
          <!-- <li><a href="<?php echo base_url('/layanan') ?>">Layanan</a></li> -->
          <li><a href="<?php echo base_url('/informasi-acara') ?>">Informasi Acara</a></li>
          <!-- <li><a href="blog.html">Informasi</a></li> -->
          <li class="dropdown"><a href="#"><span>Laporan Masjid</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
            <ul>
              <li><a href="<?php echo base_url('/laporan-keuangan')?>">Laporan Keuangan</a></li>
            </ul>
          </li>
          <li><a href="<?php echo base_url('/kontak')?>">Kontak Masjid</a></li>
        </ul>
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav>

    </div>
  </header>