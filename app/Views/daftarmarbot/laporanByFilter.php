<?php echo view('_partials/header'); ?>
<?php echo view('_partials/sidebar'); ?>

<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid  text-center">
            <p style="color:green;"> <b>MASJID AL-HIKMAH KAMPUNG PAYANGAN <b /><br></p>
            <h4><b><i>MANAGEMENT INFORMATION SYSTEM</i></b></h4>
            <img src="<?php echo base_url('dist/img/logo.ico'); ?>" alt="gambar al-hikmah" height="187"> <br><br>
            <h3 class="h3 mb-2 text-gray-800"> Data Marbot <br>
            </h3>
            <p class="mb-4">Update Data Secara Rutin Agar Konsistensi Data Akan Terjaga Dengan Baik</p>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?php echo base_url('/dashboard') ?>"> <i class="nav-icon fas  fa-mosque"></i> Dashboard</a></li>
                    <li class="breadcrumb-item" aria-current="page"><i class="nav-icon fas  fa-users"></i> Laporan Data Marbot</li>
                </ol>
            </nav>
        </div>
    </div>

    <section class="content">
        <div class="row">
              <div class="col-12">
                <div class="card shadow-lg">
                    <div class="card-header shadow-sm">
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">

                        <div class="table-responsive">

                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Marbot</th>
                                        <th>Alamat</th>
                                        <th>status</th>
                                        <th>handphone</th>
                                        <th>tahun</th>
                                        <th>Petugas</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1 + (5 * ($currentPage - 1)); ?>
                                    <?php foreach ($datafilter as $row) { ?>
                                        <tr>
                                            <td class="text-center"><?= $i++; ?></td> 
                                            <td><?php echo $row->nama; ?></td>
                                            <td><?php echo $row->alamat; ?></td>
                                            <td><?php echo $row->status; ?></td>
                                            <td><?php echo $row->handphone; ?></td>
                                            <td><?php echo $row->tahun; ?></td>
                                            <td><?php echo $row->namapengurus; ?></td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Marbot</th>
                                        <th>Alamat</th>
                                        <th>status</th>
                                        <th>handphone</th>
                                        <th>tahun</th>
                                        <th>Petugas</th>
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