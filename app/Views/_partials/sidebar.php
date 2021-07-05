<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="<?php echo base_url('/dashboard'); ?>" class="brand-link">
        <img src="<?php echo base_url('dist/img/brand.jpg'); ?>" alt="logo masjid al-hikmah" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">AL - HIKMAH</span>
    </a>

    <div class="sidebar">
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <h6 style="color:azure"><?php if (session()->get('level') == 1) {
                                            echo 'DEVELOPER';
                                        } elseif (session()->get('level') == 2) {
                                            echo 'ADMIN';
                                        } else {
                                            echo 'USERS';
                                        } ?></h6>
            </div>
            <div class="info">
                <a href="#" class="d-block"><?= session()->get('nama_user'); ?></a>
            </div>
        </div>
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="<?php echo base_url('/dashboard'); ?>" class="nav-link">
                        <i class="nav-icon fas fa-mosque"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="nav-header">Data Jamaah</li>

                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            Data Jamaah Masjid
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?php echo base_url('/daftarynz'); ?>" class="nav-link">
                                <i class="fas fa-user nav-icon"></i>
                                <p>Data Yatim Dan Janda</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo base_url('/daftarpengurus'); ?>" class="nav-link">
                                <i class="fas fa-user nav-icon"></i>
                                <p>Data Pengurus</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo base_url('/daftarimam'); ?>" class="nav-link">
                                <i class="fas fa-user nav-icon"></i>
                                <p>Data Imam</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo base_url('/daftarbilal'); ?>" class="nav-link">
                                <i class="fas fa-user nav-icon"></i>
                                <p>Data Bilal</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo base_url('/daftarmarbot'); ?>" class="nav-link">
                                <i class="fas fa-user nav-icon"></i>
                                <p>Data Marbot</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo base_url('/daftarmuazin'); ?>" class="nav-link">
                                <i class="fas fa-user nav-icon"></i>
                                <p>Data Muazin</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo base_url('/daftarkhotib'); ?>" class="nav-link">
                                <i class="fas fa-user nav-icon"></i>
                                <p>Data Khotib</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo base_url('/daftarremaja'); ?>" class="nav-link">
                                <i class="fas fa-user nav-icon"></i>
                                <p>Data Remaja</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-header">Laporan</li>

                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            Data Laporan Masjid
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?php echo base_url('/daftarynz/laporan'); ?>" class="nav-link">
                                <i class="fas fa-user nav-icon"></i>
                                <p>Laporan Yatim Janda</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo base_url('/daftarpengurus/laporan'); ?>" class="nav-link">
                                <i class="fas fa-user nav-icon"></i>
                                <p>Laporan Pengurus</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo base_url('/daftarimam/laporan'); ?>" class="nav-link">
                                <i class="fas fa-user nav-icon"></i>
                                <p>Laporan Imam</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo base_url('/daftarbilal/laporan'); ?>" class="nav-link">
                                <i class="fas fa-user nav-icon"></i>
                                <p>Laporan Bilal</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo base_url('/daftarmarbot/laporan'); ?>" class="nav-link">
                                <i class="fas fa-user nav-icon"></i>
                                <p>Laporan Marbot</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo base_url('/daftarmuazin/laporan'); ?>" class="nav-link">
                                <i class="fas fa-user nav-icon"></i>
                                <p>Laporan Muazin</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo base_url('/daftarkhotib/laporan'); ?>" class="nav-link">
                                <i class="fas fa-user nav-icon"></i>
                                <p>Laporan Khotib</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo base_url('/daftarremaja/laporan'); ?>" class="nav-link">
                                <i class="fas fa-user nav-icon"></i>
                                <p>Laporan Remaja</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <?php if (session()->get('level') == 1) { ?>
                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-user-shield"></i>
                            <p>
                                Developer
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="<?php echo base_url('/users'); ?>" class="nav-link">
                                    <i class="fas fa-user-lock nav-icon"></i>
                                    <p>Tambah Admin</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                <?php  } ?>
            </ul>
        </nav>
    </div>
</aside>