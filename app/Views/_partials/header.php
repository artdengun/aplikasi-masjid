<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Masjid Al Hikmah</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="assets/logo/brand.jpg" rel="icon">
    <link href="assets/logo/brand.jpg" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="<?php echo base_url('dash/vendor/bootstrap/css/bootstrap.min.css'); ?>" rel="stylesheet">
    <link href="<?php echo base_url('dash/vendor/bootstrap-icons/bootstrap-icons.css'); ?>" rel="stylesheet">
    <link href="<?php echo base_url('dash/vendor/boxicons/css/boxicons.min.css'); ?>" rel="stylesheet">
    <link href="<?php echo base_url('dash/vendor/quill/quill.snow.css'); ?>" rel="stylesheet">
    <link href="<?php echo base_url('dash/vendor/quill/quill.bubble.css'); ?>" rel="stylesheet">
    <link href="<?php echo base_url('dash/vendor/remixicon/remixicon.css'); ?>" rel="stylesheet">
    <link href="<?php echo base_url('dash/vendor/simple-datatables/style.css'); ?>" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="<?php echo base_url('dash/css/style.css'); ?>" rel="stylesheet">
</head>

<body>

    <!-- ======= Header ======= -->
    <header id="header" class="header fixed-top d-flex align-items-center">

        <div class="d-flex align-items-center justify-content-between">
            <a href="index.html" class="logo d-flex align-items-center">
                <img src="assets/logo/brand.jpg" alt="">
                <span class="d-none d-lg-block">Web Application</span>
            </a>
            <i class="bi bi-list toggle-sidebar-btn"></i>
        </div><!-- End Logo -->

        <div class="search-bar">
            <form class="search-form d-flex align-items-center" method="POST" action="#">
                <input type="text" name="query" placeholder="Search" title="Enter search keyword">
                <button type="submit" title="Search"><i class="bi bi-search"></i></button>
            </form>
        </div><!-- End Search Bar -->

        <nav class="header-nav ms-auto">
            <ul class="d-flex align-items-center">

                <li class="nav-item d-block d-lg-none">
                    <a class="nav-link nav-icon search-bar-toggle " href="#">
                        <i class="bi bi-search"></i>
                    </a>
                </li><!-- End Search Icon-->

                <li class="nav-item dropdown">

                    <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
                        <i class="bi bi-bell"></i>
                        <span class="badge bg-primary badge-number"></span>
                    </a><!-- End Notification Icon -->

                    <!-- <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow notifications">
            <li class="dropdown-header">
              You have 4 new notifications
              <a href="#"><span class="badge rounded-pill bg-primary p-2 ms-2">View all</span></a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="notification-item">
              <i class="bi bi-exclamation-circle text-warning"></i>
              <div>
                <h4>Lorem Ipsum</h4>
                <p>Quae dolorem earum veritatis oditseno</p>
                <p>30 min. ago</p>
              </div>
            </li>

            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="notification-item">
              <i class="bi bi-x-circle text-danger"></i>
              <div>
                <h4>Atque rerum nesciunt</h4>
                <p>Quae dolorem earum veritatis oditseno</p>
                <p>1 hr. ago</p>
              </div>
            </li>

            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="notification-item">
              <i class="bi bi-check-circle text-success"></i>
              <div>
                <h4>Sit rerum fuga</h4>
                <p>Quae dolorem earum veritatis oditseno</p>
                <p>2 hrs. ago</p>
              </div>
            </li>

            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="notification-item">
              <i class="bi bi-info-circle text-primary"></i>
              <div>
                <h4>Dicta reprehenderit</h4>
                <p>Quae dolorem earum veritatis oditseno</p>
                <p>4 hrs. ago</p>
              </div>
            </li>

            <li>
              <hr class="dropdown-divider">
            </li>
            <li class="dropdown-footer">
              <a href="#">Show all notifications</a>
            </li>

          </ul> -->

                    <!-- End Notification Dropdown Items -->

                </li><!-- End Notification Nav -->

                <li class="nav-item dropdown">

                    <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
                        <i class="bi bi-chat-left-text"></i>
                        <span class="badge bg-success badge-number"></span>
                    </a><!-- End Messages Icon -->

                    <!-- <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow messages">
            <li class="dropdown-header">
              You have 3 new messages
              <a href="#"><span class="badge rounded-pill bg-primary p-2 ms-2">View all</span></a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="message-item">
              <a href="#">
                <img src="dash/img/messages-1.jpg" alt="" class="rounded-circle">
                <div>
                  <h4>Maria Hudson</h4>
                  <p>Velit asperiores et ducimus soluta repudiandae labore officia est ut...</p>
                  <p>4 hrs. ago</p>
                </div>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="message-item">
              <a href="#">
                <img src="dash/img/messages-2.jpg" alt="" class="rounded-circle">
                <div>
                  <h4>Anna Nelson</h4>
                  <p>Velit asperiores et ducimus soluta repudiandae labore officia est ut...</p>
                  <p>6 hrs. ago</p>
                </div>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="message-item">
              <a href="#">
                <img src="dash/img/messages-3.jpg" alt="" class="rounded-circle">
                <div>
                  <h4>David Muldon</h4>
                  <p>Velit asperiores et ducimus soluta repudiandae labore officia est ut...</p>
                  <p>8 hrs. ago</p>
                </div>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="dropdown-footer">
              <a href="#">Show all messages</a>
            </li>

          </ul -->
                    <!-- End Messages Dropdown Items -->

                </li><!-- End Messages Nav -->

                <li class="nav-item dropdown pe-3">

                    <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
                        <img src="dash/img/profile-img.jpg" alt="Profile" class="rounded-circle">
                        <span class="d-none d-md-block dropdown-toggle ps-2">Administrator</span>
                    </a><!-- End Profile Iamge Icon -->

                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                        <li class="dropdown-header">
                            <span>IT Application App</span>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li>
                            <a class="dropdown-item d-flex align-items-center"
                                href="<?php echo base_url('/profile'); ?>">
                                <i class="bi bi-gear"></i>
                                <span>Account Settings</span>
                            </a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li>
                            <a class="dropdown-item d-flex align-items-center" href="<?php echo base_url('/faq'); ?>">
                                <i class="bi bi-question-circle"></i>
                                <span>Butuh Bantuan?</span>
                            </a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li>
                            <a class="dropdown-item d-flex align-items-center" href="#">
                                <i class="bi bi-box-arrow-right"></i>
                                <span>Sign Out</span>
                            </a>
                        </li>

                    </ul><!-- End Profile Dropdown Items -->
                </li><!-- End Profile Nav -->

            </ul>

        </nav><!-- End Icons Navigation -->

    </header><!-- End Header -->

    <!-- ======= Sidebar ======= -->
    <aside id="sidebar" class="sidebar">

        <ul class="sidebar-nav" id="sidebar-nav">

            <li class="nav-item">
                <a class="nav-link " href="index.html">
                    <i class="bi bi-grid"></i>
                    <span>Dashboard</span>
                </a>
            </li><!-- End Dashboard Nav -->

            <li class="nav-heading">Manajemen Masjid</li>

            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#keuangan-nav" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-cash-stack"></i><span>Keuangan</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="keuangan-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="transaksi.html">
                            <i class="bi bi-credit-card"></i><span>Transaksi Keuangan</span>
                        </a>
                    </li>
                    <li>
                        <a href="kotak-amal.html">
                            <i class="bi bi-box"></i><span>Kotak Amal</span>
                        </a>
                    </li>
                    <li>
                        <a href="zakat-infaq.html">
                            <i class="bi bi-wallet"></i><span>Zakat & Infaq</span>
                        </a>
                    </li>
                    <li>
                        <a href="laporan-keuangan.html">
                            <i class="bi bi-file-earmark-bar-graph"></i><span>Laporan Keuangan</span>
                        </a>
                    </li>
                </ul>
            </li><!-- End Keuangan Nav -->

            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#aset-nav" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-building"></i><span>Manajemen Aset</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="aset-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="inventaris.html">
                            <i class="bi bi-archive"></i><span>Inventaris Masjid</span>
                        </a>
                    </li>
                    <li>
                        <a href="pemeliharaan.html">
                            <i class="bi bi-tools"></i><span>Pemeliharaan & Perbaikan</span>
                        </a>
                    </li>
                </ul>
            </li><!-- End Aset Nav -->

            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#kegiatan-nav" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-calendar-event"></i><span>Kegiatan Masjid</span><i
                        class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="kegiatan-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="jadwal-shalat.html">
                            <i class="bi bi-clock"></i><span>Jadwal Shalat</span>
                        </a>
                    </li>
                    <li>
                        <a href="jadwal-kajian.html">
                            <i class="bi bi-book"></i><span>Jadwal Kajian</span>
                        </a>
                    </li>
                    <li>
                        <a href="kegiatan-lainnya.html">
                            <i class="bi bi-person-circle"></i><span>Kegiatan Sosial</span>
                        </a>
                    </li>
                </ul>
            </li><!-- End Kegiatan Nav -->

            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#jamaah-nav" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-people"></i><span>Manajemen Jamaah</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="jamaah-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="data-jamaah.html">
                            <i class="bi bi-person"></i><span>Data Jamaah</span>
                        </a>
                    </li>
                    <li>
                        <a href="relawan.html">
                            <i class="bi bi-person-plus"></i><span>Pendaftaran Relawan</span>
                        </a>
                    </li>
                </ul>
            </li><!-- End Jamaah Nav -->

            <li class="nav-heading">Panduan Penggunaan</li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="bantuan-keuangan.html">
                    <i class="bi bi-question-circle"></i>
                    <span>Panduan Keuangan</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="bantuan-aset.html">
                    <i class="bi bi-question-circle"></i>
                    <span>Panduan Aset</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="bantuan-kotak-amal.html">
                    <i class="bi bi-question-circle"></i>
                    <span>Panduan Kotak Amal</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="bantuan-kegiatan.html">
                    <i class="bi bi-question-circle"></i>
                    <span>Panduan Kegiatan</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="bantuan-jamaah.html">
                    <i class="bi bi-question-circle"></i>
                    <span>Panduan Jamaah</span>
                </a>
            </li>

    </aside><!-- End Sidebar-->