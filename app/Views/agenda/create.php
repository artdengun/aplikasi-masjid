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

      tempat : <p><b>Jl. Wibawa Mukti II Jl. Diman, RT.004/RW.006, Jatisari, Kec. Jatiasih, Kota Bks, Jawa Barat 17426</b></p>
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="<?php echo base_url('/') ?>">Dashboard</a></li>
          <li class="breadcrumb-item"><a href="<?php echo base_url('/agenda') ?>">Data agenda</a></li>
          <li class="breadcrumb-item" aria-current="page">Tambah Data agenda</li>
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
          <?php echo form_open_multipart('agenda/store'); ?>
          <div class="card">
            <div class="card-body">
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <?php
                    echo form_label('Penanggung Jawab Data', 'daftarpengurus');
                    echo form_dropdown('idpengurus', $daftarpengurus, $inputs['idpengurus'], ['class' => 'form-control']);
                    ?>
                  </div>
                  <div class="form-group">
                    <?php
                    echo form_label('Nama Acara');
                    $nama = [
                      'type'  => 'text',
                      'name'  => 'nama',
                      'id'    => 'nama',
                      'value' => $inputs['nama'],
                      'class' => 'form-control',
                      'placeholder' => 'Masukan Nama Acara'
                    ];
                    echo form_input($nama);
                    ?>
                  </div>
                  <div class="form-group">
                    <?php
                    echo form_label('Tempat Pelaksanaan');
                    $tempat = [
                      'type'  => 'text',
                      'name'  => 'tempat',
                      'id'    => 'tempat',
                      'value' => $inputs['tempat'],
                      'class' => 'form-control',
                      'placeholder' => 'Masukan Tempat Pelaksanaan'
                    ];
                    echo form_input($tempat);
                    ?>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <?php
                    echo form_label('Tanggal Pelaksanaan ');
                    $tanggal = [
                      'type'  => 'date',
                      'name'  => 'tanggal',
                      'id'    => 'tanggal',
                      'value' => $inputs['tanggal'],
                      'class' => 'form-control',
                      'placeholder' => 'Tanggal Pelaksanaan '
                    ];
                    echo form_input($tanggal);
                    ?>
                  </div>
                  <div class="form-group">
                    <?php
                    echo form_label('Tanggal Post Acara');
                    $tgl_post = [
                      'type'  => 'date',
                      'name'  => 'tgl_post',
                      'id'    => 'tgl_post',
                      'value' => $inputs['tgl_post'],
                      'class' => 'form-control',
                      'placeholder' => 'Tanggal Posting Acara'
                    ];
                    echo form_input($tgl_post);
                    ?>
                  </div>
                  <div class="form-group">
                    <?php
                    echo form_label('Keterangan Acara');
                    $keterangan = [
                      'type'  => 'text',
                      'name'  => 'keterangan',
                      'id'    => 'keterangan',
                      'value' => $inputs['keterangan'],
                      'class' => 'form-control',
                      'placeholder' => 'Keterangan Acara'
                    ];
                    echo form_textarea($keterangan)
                    ?>
                  </div>
                </div>
              </div>
            </div>
            <div class="card-footer">
              <a href="<?php echo base_url('agenda'); ?>" class="btn btn-outline-info">Back</a>
              <button type="submit" class="btn btn-primary float-right">Simpan</button>
            </div>
          </div>
          <?php echo form_close(); ?>
        </div>
      </div>
    </div>
  </div>

</div>
<?php echo view('_partials/footer'); ?>