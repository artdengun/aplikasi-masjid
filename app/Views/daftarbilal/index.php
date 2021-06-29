<?php echo view('_partials/header'); ?>
<?php echo view('_partials/sidebar'); ?>

<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid  text-center">
            <marquee style="color: red;">
                <p class="mb-2"><b>Untuk menjaga Keamanan data, Lakukan Pencadangan Data Secara Mandiri</b></p>
            </marquee>

            <h1 class="h3 mb-2 text-gray-800"> Data Bilal Masjid Al-Hikmah Kp. payangan</h1>
            <p class="mb-4">Data Bilal yang dimasukan adalah data yang sudah valid dan sesuai dengan data internal masjid</p>

            Alamat : <p><b>Jl. Wibawa Mukti II Jl. Diman, RT.004/RW.006, Jatisari, Kec. Jatiasih, Kota Bks, Jawa Barat 17426</b></p>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?php echo base_url('/') ?>">Dashboard</a></li>
                    <li class="breadcrumb-item" aria-current="page">Data Bilal</li>
                </ol>
            </nav>
        </div>
    </div>

    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <a href="<?php echo base_url('daftarbilal/create'); ?>" class="btn btn-primary float-right">Tambah Bilal</a>

                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <?php
                        if (!empty(session()->getFlashdata('success'))) { ?>
                            <div class="alert alert-success">
                                <?php echo session()->getFlashdata('success'); ?>
                            </div>
                        <?php } ?>

                        <?php if (!empty(session()->getFlashdata('info'))) { ?>
                            <div class="alert alert-info">
                                <?php echo session()->getFlashdata('info'); ?>
                            </div>
                        <?php } ?>

                        <?php if (!empty(session()->getFlashdata('warning'))) { ?>
                            <div class="alert alert-warning">
                                <?php echo session()->getFlashdata('warning'); ?>
                            </div>
                        <?php } ?>
                        <div class="table-responsive">

                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <!-- <th>Foto</th> -->
                                        <th>Nama Bilal</th>
                                        <th>Alamat</th>
                                        <th>status</th>
                                        <th>handphone</th>
                                        <th>tahun</th>
                                        <th>Petugas</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1 + (5 * ($currentPage - 1)); ?>
                                    <?php foreach ($daftarbilal as $row) { ?>
                                        <tr>
                                            <td class="text-center"><?= $i++; ?></td>
                                            <!-- <td><img src="<?= base_url('uploads/bilal/' . $row['foto']) ?>" class="rounded-circle" width="50" height="50"></td> -->
                                            <td><?php echo $row['nama']; ?></td>
                                            <td><?php echo $row['alamat']; ?></td>
                                            <td><?php echo $row['status']; ?></td>
                                            <td><?php echo $row['handphone']; ?></td>
                                            <td><?php echo $row['tahun']; ?></td>
                                            <td><?php echo $row['namapengurus']; ?></td>

                                            <td class="text-center">
                                                <div class="btn-group">
                                                    <a href="<?php echo base_url('daftarbilal/edit/' . $row['idbilal']); ?>" class="btn btn-sm btn-success">
                                                        <i class="fa fa-edit"></i>
                                                    </a>
                                                    <a href="<?php echo base_url('daftarbilal/delete/' . $row['idbilal']); ?>" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus Data ini?');">
                                                        <i class="fa fa-trash-alt"></i>
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>No</th>
                                        <!-- <th>Foto</th> -->
                                        <th>Nama Bilal</th>
                                        <th>Alamat</th>
                                        <th>status</th>
                                        <th>handphone</th>
                                        <th>tahun</th>
                                        <th>Petugas</th>
                                        <th>Action</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
    </section>
</div>


<?php echo view('_partials/footer'); ?>