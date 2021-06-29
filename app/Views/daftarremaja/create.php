<?php echo view('_partials/header'); ?>
<?php echo view('_partials/sidebar'); ?>

<div class="content-wrapper">
  <div class="content-header">
    <div class="container-fluid text-center">
      <marquee style="color: red;">
        <p class="mb-2"><b>Untuk menjaga Keamanan data, Lakukan Pencadangan Data Secara Mandiri</b></p>
      </marquee>

      <h1 class="h3 mb-2 text-gray-800"> Data remaja Masjid Al-Hikmah Kp. payangan</h1>
      <p class="mb-4">Data remaja yang dimasukan adalah data yang sudah valid dan sesuai dengan data internal masjid</p>

      Alamat : <p><b>Jl. Wibawa Mukti II Jl. Diman, RT.004/RW.006, Jatisari, Kec. Jatiasih, Kota Bks, Jawa Barat 17426</b></p>
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="<?php echo base_url('/') ?>">Dashboard</a></li>
          <li class="breadcrumb-item"><a href="<?php echo base_url('/daftarremaja') ?>">Data remaja</a></li>
          <li class="breadcrumb-item" aria-current="page">Tambah Data remaja</li>
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
          <?php echo form_open_multipart('daftarremaja/store'); ?>
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
                    echo form_label('Nama remaja');
                    $nama = [
                      'type'  => 'text',
                      'name'  => 'nama',
                      'id'    => 'nama',
                      'value' => $inputs['nama'],
                      'class' => 'form-control',
                      'placeholder' => 'Masukan Nama remaja'
                    ];
                    echo form_input($nama);
                    ?>
                  </div>
                  <div class="form-group">
                    <?php
                    echo form_label('Alamat Rumah remaja');
                    $alamat = [
                      'type'  => 'text',
                      'name'  => 'alamat',
                      'id'    => 'alamat',
                      'value' => $inputs['alamat'],
                      'class' => 'form-control',
                      'placeholder' => 'Masukan alamat remaja'
                    ];
                    echo form_input($alamat);
                    ?>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <?php
                    echo form_label('Kontak remaja');
                    $handphone = [
                      'type'  => 'number',
                      'name'  => 'handphone',
                      'id'    => 'handphone',
                      'value' => $inputs['handphone'],
                      'class' => 'form-control',
                      'placeholder' => 'Masukan Nomer Handphone'
                    ];
                    echo form_input($handphone);
                    ?>
                  </div>
                  <div class="form-group">
                    <?php
                    echo form_label('Tahun remaja Terdata');
                    $tahun = [
                      'type'  => 'date',
                      'name'  => 'tahun',
                      'id'    => 'tahun',
                      'value' => $inputs['tahun'],
                      'class' => 'form-control',
                      'placeholder' => 'tahun'
                    ];
                    echo form_input($tahun);
                    ?>
                  </div>
                  <div class="form-group">
                    <?php
                    echo form_label('Status Keaktifan remaja', 'Status');
                    echo form_dropdown('status', ['' => 'Pilih', 'AKTIF' => 'AKTIF', 'OFF' => 'OFF'], $inputs['status'], ['class' => 'form-control']);
                    ?>
                  </div>
                  <!-- <div class="form-group">
                    <?php
                    echo form_label('Foto remaja');
                    echo form_upload('foto', '', ['class' => 'form-control']);
                    ?>
                  </div> -->
                </div>
              </div>
            </div>
            <div class="card-footer">
              <a href="<?php echo base_url('daftarremaja'); ?>" class="btn btn-outline-info">Back</a>
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