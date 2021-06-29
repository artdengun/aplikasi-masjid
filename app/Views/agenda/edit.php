<?php echo view('_partials/header'); ?>
<?php echo view('_partials/sidebar'); ?>
<div class="content-wrapper">
  <div class="content-header">
    <div class="container-fluid text-center">
      <marquee style="color: red;">
        <p class="mb-2"><b>Untuk menjaga Keamanan data, Lakukan Pencadangan Data Secara Mandiri</b></p>
      </marquee>

      <h1 class="h3 mb-2 text-gray-800"> Data agenda Masjid Al-Hikmah Kp. payangan</h1>
      <p class="mb-4">Data agenda yang dimasukan adalah data yang sudah valid dan sesuai dengan data internal masjid</p>

      Alamat : <p><b>Jl. Wibawa Mukti II Jl. Diman, RT.004/RW.006, Jatisari, Kec. Jatiasih, Kota Bks, Jawa Barat 17426</b></p>
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="<?php echo base_url('/') ?>">Dashboard</a></li>
          <li class="breadcrumb-item"><a href="<?php echo base_url('/agenda') ?>">Data agenda</a></li>
          <li class="breadcrumb-item" aria-current="page">Edit agenda</li>
          
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
            <?php echo form_open_multipart('agenda/update/' . $agenda['idagenda']); ?>
            <div class="card-header">Form Edit Produk</div>
            <div class="card-body">
              <?php echo form_hidden('idagenda', $agenda['idagenda']); ?>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <?php echo form_label('Nama Pengurus', 'Pengurus'); ?>
                    <?php echo form_dropdown('idpengurus', $daftarpengurus, $agenda['idpengurus'], ['class' => 'form-control']); ?>
                  </div>
                  <div class="form-group">
                    <?php echo form_label('nama', 'Name'); ?>
                    <?php echo form_input('nama', $agenda['nama'], ['class' => 'form-control', 'placeholder' => 'Product Name']); ?>
                  </div>
                  <div class="form-group">
                    <?php echo form_label('tempat', 'Price'); ?>
                    <?php echo form_input('tempat', $agenda['tempat'], ['class' => 'form-control', 'placeholder' => 'Product Price', 'type' => 'text']); ?>
                  </div>
                  <div class="form-group">
                    <?php echo form_label('keterangan', 'keterangan'); ?>
                    <?php echo form_input('keterangan', $agenda['keterangan'], ['class' => 'form-control', 'placeholder' => 'Product SKU', 'type' => 'number']); ?>
                  </div>
                  
                </div>
                <div class="col-md-6">
                <div class="form-group">
                    <?php echo form_label('Tanggal Masuk', 'Description'); ?>
                    <?php echo form_input('tanggal', $agenda['tanggal'], ['class' => 'form-control', 'placeholder' => 'Product Description']); ?>
                  </div>
                  <div class="form-group">
                    <?php echo form_label('Tanggal Posting', 'Description'); ?>
                    <?php echo form_input('tgl_post', $agenda['tgl_post'], ['class' => 'form-control', 'placeholder' => 'Product Description']); ?>
                  </div>
                </div>
              </div>
            </div>
            <div class="card-footer">
              <a href="<?php echo base_url('agenda'); ?>" class="btn btn-outline-info">Back</a>
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