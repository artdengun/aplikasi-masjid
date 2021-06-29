<?php echo view('_partials/header'); ?>
<?php echo view('_partials/sidebar'); ?>


<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid  text-center">
            <marquee style="color: red;">
                <p class="mb-2"><b>Untuk menjaga Keamanan data, Lakukan Pencadangan Data Secara Mandiri</b></p>
            </marquee>

            <h1 class="h3 mb-2 text-gray-800"> Data users Masjid Al-Hikmah Kp. payangan</h1>
            <p class="mb-4">Data users yang dimasukan adalah data yang sudah valid dan sesuai dengan data internal masjid</p>

            Alamat : <p><b>Jl. Wibawa Mukti II Jl. Diman, RT.004/RW.006, Jatisari, Kec. Jatiasih, Kota Bks, Jawa Barat 17426</b></p>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?php echo base_url('/') ?>">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="<?php echo base_url('/users') ?>">Data users</a></li>
                    <li class="breadcrumb-item" aria-current="page">Show users</li>
                </ol>
            </nav>
        </div>
    </div>

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-8">
                                    <dl class="dl-horizontal">
                                        <dt>Nama users </dt>
                                        <dd><?php echo $users['nama_user']; ?></dd>
                                        <dt>Username Users</dt>
                                        <dd><?php echo $users['username']; ?></dd>
                                        <dt>Password Users</dt>
                                        <dd><?php echo $users['password']; ?></dd>
                                        <dt>Hak Akses Users</dt>
                                        <dd><?php echo $users['level']; ?></dd>
                                    </dl>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <a href="<?php echo base_url('users'); ?>" class="btn btn-outline-info float-right">Back</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<?php echo view('_partials/footer'); ?>