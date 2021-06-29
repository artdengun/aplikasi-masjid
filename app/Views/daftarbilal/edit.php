<?php echo view('_partials/header'); ?>
<?php echo view('_partials/sidebar'); ?>
<div class="content-wrapper">
  <div class="content-header">
    <div class="container-fluid text-center">
      <marquee style="color: red;">
        <p class="mb-2"><b>Untuk menjaga Keamanan data, Lakukan Pencadangan Data Secara Mandiri</b></p>
      </marquee>

      <h1 class="h3 mb-2 text-gray-800"> Data Bilal Masjid Al-Hikmah Kp. payangan</h1>
      <p class="mb-4">Data Bilal yang dimasukan adalah data yang sudah valid dan sesuai dengan data internal masjid</p>

      Alamat : <p><b>Jl. Wibawa Mukti II Jl. Diman, RT.004/RW.006, Jatisari, Kec. Jatiasih, Kota Bks, Jawa Barat 17426</b></p>
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="<?php echo base_url('/') ?>">Dashboard</a></li>
          <li class="breadcrumb-item"><a href="<?php echo base_url('/daftarbilal') ?>">Data Bilal</a></li>
          <li class="breadcrumb-item" aria-current="page">Edit Bilal</li>
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
            <div class="card-header">Form Edit Produk</div>
            <div class="card-body">
              <?php echo form_hidden('idbilal', $daftarbilal['idbilal']); ?>
              <div class="row">
                <div class="col-md-4">
                  <!-- <div class="form-group">
                    <?php echo form_label('Foto Imam', 'Image'); ?>
                    <br>
                    <img src="<?php echo base_url('uploads/bilal/' . $daftarbilal['foto']) ?>" class="img-fluid">
                    <br>
                    <br>
                    <?php echo form_label('Ganti Image', 'Ganti Image'); ?>
                    <?php echo form_upload('foto', $daftarbilal['foto']); ?>
                  </div> -->
                </div>
                <div class="col-md-8">
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