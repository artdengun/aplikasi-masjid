<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="<?php echo base_url('/dashboard'); ?>" class="brand-link">
        <img src="<?php echo base_url('dist/img/brand.jpg'); ?>" alt="logo masjid al-hikmah" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">AL - HIKMAH</span>
    </a>

    <div class="sidebar">
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <!-- <div class="image">
            <img src="dist/img/default-150x150.png" class="img-fluid" width="100">
            </div> -->
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
                <li class="nav-header">Data Pengurus Dan Penyumbang</li>

                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-dashcube"></i>
                        <p>
                            Pendataan Jamaah Masjid
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <!-- <li class="nav-item">
                            <a href="<?php echo base_url('/daftarzakat'); ?>" class="nav-link">
                                <i class="fas fa-user nav-icon"></i>
                                <p>Data Zakat</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo base_url('/daftarmaal'); ?>" class="nav-link">
                                <i class="fas fa-user nav-icon"></i>
                                <p>Data Maal</p>
                            </a>
                        </li> -->
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
                <!-- 

                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            Data Kegiatan Masjid
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?php echo base_url('/agenda'); ?>" class="nav-link">
                                <i class="fas fa-user nav-icon"></i>
                                <p> Agenda</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo base_url('/berita'); ?>" class="nav-link">
                                <i class="fas fa-user nav-icon"></i>
                                <p>Berita</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo base_url('/profil'); ?>" class="nav-link">
                                <i class="fas fa-user nav-icon"></i>
                                <p>Profil</p>
                            </a>
                        </li>
                        <li class="nav-item">
                        <li class="nav-item">
                            <a href="<?php echo base_url('/jadwal'); ?>" class="nav-link">
                                <i class="fas fa-user nav-icon"></i>
                                <p>Jadwal</p>
                            </a>
                        </li>
                        <a href="<?php echo base_url('/sampul'); ?>" class="nav-link">
                            <i class="fas fa-user nav-icon"></i>
                            <p>Sampul</p>
                        </a>
                </li>
               </ul> -->
                </li>
                <!-- <li class="nav-header">Data Terkait Content System</li>

            <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-users"></i>
                    <p>
                        Konten Website
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="<?php echo base_url('/'); ?>" class="nav-link">
                            <i class="fas fa-user nav-icon"></i>
                            <p>Data Zakat</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?php echo base_url('/'); ?>" class="nav-link">
                            <i class="fas fa-user nav-icon"></i>
                            <p>Data Maal</p>
                        </a>
                    </li>
                </ul>
            </li> -->
                <!-- <li class="nav-header">Data Terkait Keuangan</li>
            <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-users"></i>
                    <p>
                        Pemasukan Masjid
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="<?php echo base_url('/'); ?>" class="nav-link">
                            <i class="fas fa-user nav-icon"></i>
                            <p>Penerimaan Qurban</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?php echo base_url('/'); ?>" class="nav-link">
                            <i class="fas fa-user nav-icon"></i>
                            <p>Penyaluran Qurban</p>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-dollar-sign"></i>
                    <p>
                        Pengeluaran Masjid
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="<?php echo base_url('/'); ?>" class="nav-link">
                            <i class="fas fa-user nav-icon"></i>
                            <p>Penerimaan Qurban</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?php echo base_url('/'); ?>" class="nav-link">
                            <i class="fas fa-user nav-icon"></i>
                            <p>Penyaluran Qurban</p>
                        </a>
                    </li>
                </ul>
            </li>


            <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-users"></i>
                    <p>
                        Pendataan Qurban
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="<?php echo base_url('/'); ?>" class="nav-link">
                            <i class="fas fa-user nav-icon"></i>
                            <p>Penerimaan Qurban</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?php echo base_url('/'); ?>" class="nav-link">
                            <i class="fas fa-user nav-icon"></i>
                            <p>Penyaluran Qurban</p>
                        </a>
                    </li>
                </ul>
            </li> -->
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