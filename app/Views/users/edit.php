<?php echo view('_partials/header'); ?>
<?php echo view('_partials/sidebar'); ?>
<div class="content-wrapper">
  <div class="content-header">
    <div class="container-fluid text-center">
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
          <li class="breadcrumb-item" aria-current="page">Edit users</li>
          
        </ol>
      </nav>
      
    </div>
    <p class="mb-2 text-center " style="color: red;"><b>Setiap Edit Data Foto Harus Diganti</b></p>

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
            <?php echo form_open_multipart('users/update/' . $users['id']); ?>
            <div class="card-header">Form Edit Produk</div>
            <div class="card-body">
              <?php echo form_hidden('id', $users['id']); ?>
              <div class="row">
                <div class="col-md-4">
                </div>
                <div class="col-md-8">
                  <div class="form-group">
                    <?php echo form_label('Nama Users', 'Nama'); ?>
                    <?php echo form_input('nama_user', $users['nama_user'], ['class' => 'form-control', 'placeholder' => 'Nama Users']); ?>
                  </div>
                  <div class="form-group">
                    <?php echo form_label('Username', 'Username'); ?>
                    <?php echo form_input('username', $users['username'], ['class' => 'form-control', 'placeholder' => 'Username', 'type' => 'text']); ?>
                  </div>
                  <div class="form-group">
                    <?php echo form_label('Password Users', 'Password'); ?>
                    <?php echo form_input('password', $users['password'], ['class' => 'form-control', 'placeholder' => 'Password Users', 'type' => 'text']); ?>
                  </div>
                  
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <?php echo form_label('Level Hak Akses Users', 'hak akses'); ?>
                    <?php echo form_input('level', $users['level'], ['class' => 'form-control', 'placeholder' => 'Level Akses Users']); ?>
                  </div>
                </div>
              </div>
            </div>
            <div class="card-footer">
              <a href="<?php echo base_url('users'); ?>" class="btn btn-outline-info">Back</a>
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