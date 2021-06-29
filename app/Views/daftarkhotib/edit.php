<?php echo view('_partials/header'); ?>
<?php echo view('_partials/sidebar'); ?>
<div class="content-wrapper">
  <div class="content-header">
    <div class="container-fluid text-center">
      <marquee style="color: red;">
        <p class="mb-2"><b>Untuk menjaga Keamanan data, Lakukan Pencadangan Data Secara Mandiri</b></p>
      </marquee>

      <h1 class="h3 mb-2 text-gray-800"> Data khotib Masjid Al-Hikmah Kp. payangan</h1>
      <p class="mb-4">Data khotib yang dimasukan adalah data yang sudah valid dan sesuai dengan data internal masjid</p>

      Alamat : <p><b>Jl. Wibawa Mukti II Jl. Diman, RT.004/RW.006, Jatisari, Kec. Jatiasih, Kota Bks, Jawa Barat 17426</b></p>
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="<?php echo base_url('/') ?>">Dashboard</a></li>
          <li class="breadcrumb-item"><a href="<?php echo base_url('/daftarkhotib') ?>">Data khotib</a></li>
          <li class="breadcrumb-item" aria-current="page">Edit khotib</li>
          
        </ol>
      </nav>
      
    </div>
    <p class="mb-2 text-center " style="color: red;"><b>Setiap Edit Data Foto Harus </b></p>

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
            <?php echo form_open_multipart('daftarkhotib/update/' . $daftarkhotib['idkhotib']); ?>
            <div class="card-header">Form Edit Produk</div>
            <div class="card-body">
              <?php echo form_hidden('idkhotib', $daftarkhotib['idkhotib']); ?>
              <div class="row">
                <div class="col-md-4">
                  <div class="form-group">
                    <?php echo form_label('Foto khotib', 'Image'); ?>
                    <br>
                    <img src="<?php echo base_url('uploads/khotib/' . $daftarkhotib['foto']) ?>" class="img-fluid">
                    <br>
                    <br>
                    <?php echo form_label('Ganti Image', 'Change foto'); ?> <br/>
                    <?php echo form_upload('foto', $daftarkhotib['foto']); ?>
                  </div>
                </div>
                <div class="col-md-8">
                  <div class="form-group">
                    <?php echo form_label('Nama Pengurus', 'Pengurus'); ?>
                    <?php echo form_dropdown('idpengurus', $daftarpengurus, $daftarkhotib['idpengurus'], ['class' => 'form-control']); ?>
                  </div>
                  <div class="form-group">
                    <?php echo form_label('nama', 'Name'); ?>
                    <?php echo form_input('nama', $daftarkhotib['nama'], ['class' => 'form-control', 'placeholder' => 'Product Name']); ?>
                  </div>
                  <div class="form-group">
                    <?php echo form_label('Alamat', 'Price'); ?>
                    <?php echo form_input('alamat', $daftarkhotib['alamat'], ['class' => 'form-control', 'placeholder' => 'Product Price', 'type' => 'text']); ?>
                  </div>
                  <div class="form-group">
                    <?php echo form_label('Handphone', 'Handphone'); ?>
                    <?php echo form_input('handphone', $daftarkhotib['handphone'], ['class' => 'form-control', 'placeholder' => 'Product SKU', 'type' => 'number']); ?>
                  </div>
                  
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                <div class="form-group">
                    <?php echo form_label('Status', 'Status'); ?>
                    <?php echo form_dropdown('status', ['' => 'Pilih', 'AKTIF' => 'AKTIF', 'OFF' => 'OFF'], $daftarkhotib['status'], ['class' => 'form-control']); ?>
                  </div>
                  <div class="form-group">
                    <?php echo form_label('Tanggal Masuk', 'Description'); ?>
                    <?php echo form_input('tahun', $daftarkhotib['tahun'], ['class' => 'form-control', 'placeholder' => 'Product Description']); ?>
                  </div>
                </div>
              </div>
            </div>
            <div class="card-footer">
              <a href="<?php echo base_url('daftarkhotib'); ?>" class="btn btn-outline-info">Back</a>
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