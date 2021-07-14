<?php echo view('_partials/header'); ?>
<?php echo view('_partials/sidebar'); ?>
<div class="content-wrapper">
  <div class="content-header">
    <div class="container-fluid  text-center">
      <p style="color:green;"> <b>MASJID AL-HIKMAH KAMPUNG PAYANGAN <b /><br></p>
      <h4><b><i>MANAGEMENT INFORMATION SYSTEM</i></b></h4>
      <img src="<?php echo base_url('dist/img/logo.ico'); ?>" alt="gambar al-hikmah" height="187"> <br><br>
      <h3 class="h3 mb-2 text-gray-800"> Data bilal <br>
      </h3>
      <p class="mb-4">Update Data Secara Rutin Agar Konsistensi Data Akan Terjaga Dengan Baik</p>
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="<?php echo base_url('/dashboard') ?>"> <i class="nav-icon fas  fa-mosque"></i> Dashboard</a></li>
          <li class="breadcrumb-item"><a href="<?php echo base_url('/daftarbilal') ?>"> <i class="nav-icon fas  fa-users"></i> Data bilal</a></li>
          <li class="breadcrumb-item" aria-current="page"><i class="nav-icon fas  fa-user"></i> Edit Data</li>
        </ol>
      </nav>
    </div>
  </div>

  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <?php
          $inputs = session()->getFlashdata('inputs');
          $errors = session()->getFlashdata('errors');
          if (!empty($errors)) { ?>
            <div class="alert alert-danger" role="alert">
              Whoops! Ada kesalahan saat input data, yaitu:
              <ul>
                <?php foreach ($errors as $error) : ?>
                  <li><?= esc($error) ?></li>
                <?php endforeach ?>
              </ul>
            </div>
          <?php } ?>
          <div class="card">
            <?php echo form_open_multipart('daftarbilal/update/' . $daftarbilal['idbilal']); ?>
            <div class="card-header">Form Edit Data Bilal</div>
            <div class="card-body">
              <?php echo form_hidden('idbilal', $daftarbilal['idbilal']); ?>
              <div class="row">

                <div class="col-md-12">
                  <div class="form-group">
                    <?php echo form_label('Nama Petugas', 'Category'); ?>
                    <?php echo form_dropdown('idpengurus', $daftarpengurus, $daftarbilal['idpengurus'], ['class' => 'form-control']); ?>
                  </div>
                  <div class="form-group">
                    <?php echo form_label('nama Bilal', 'Name'); ?>
                    <?php echo form_input('nama', $daftarbilal['nama'], ['class' => 'form-control', 'placeholder' => 'Product Name']); ?>
                  </div>
                  <div class="form-group">
                    <?php echo form_label('Alamat', 'Price'); ?>
                    <?php echo form_input('alamat', $daftarbilal['alamat'], ['class' => 'form-control', 'placeholder' => 'Product Price', 'type' => 'text']); ?>
                  </div>
                  <div class="form-group">
                    <?php echo form_label('Handphone', 'Handphone'); ?>
                    <?php echo form_input('handphone', $daftarbilal['handphone'], ['class' => 'form-control', 'placeholder' => 'Product SKU', 'type' => 'number']); ?>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <?php echo form_label('Status', 'Status'); ?>
                    <?php echo form_dropdown('status', ['' => 'Pilih', 'AKTIF' => 'AKTIF', 'OFF' => 'OFF'], $daftarbilal['status'], ['class' => 'form-control']); ?>
                  </div>
                  <div class="form-group">
                    <?php echo form_label('Tanggal Masuk', 'Description'); ?>
                    <?php echo form_input('tahun', $daftarbilal['tahun'], ['class' => 'form-control', 'placeholder' => 'Product Description']); ?>
                  </div>
                </div>
              </div>
            </div>
            <div class="card-footer">
              <a href="<?php echo base_url('daftarbilal'); ?>" class="btn btn-outline-info">Back</a>
              <button type="submit" class="btn btn-primary float-right">Update Data</button>
            </div>
            <?php echo form_close(); ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
<?php echo view('_partials/footer'); ?>