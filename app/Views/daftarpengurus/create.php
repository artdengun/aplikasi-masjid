<?php echo view('_partials/header'); ?>
<?php echo view('_partials/sidebar'); ?>

<div class="content-wrapper">
  <div class="content-header">
    <div class="container-fluid  text-center">
      <marquee style="color: red;">
        <p class="mb-2"><b>Untuk menjaga Keamanan data, Lakukan Pencadangan Data Secara Mandiri</b></p>
      </marquee>

      <h1 class="h3 mb-2 text-gray-800"> Data Pengurus Masjid Al-Hikmah Kp. payangan</h1>
      <p class="mb-4">Data Pengurus yang dimasukan adalah data yang sudah valid dan sesuai dengan data internal masjid</p>
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="<?php echo base_url('/') ?>">Dashboard</a></li>
          <li class="breadcrumb-item"><a href="<?php echo base_url('/daftarpengurus') ?>">Data Pengurus</a></li>
          <li class="breadcrumb-item" aria-current="page">Tambah Pengurus</li>
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
          <?php echo form_open_multipart('daftarpengurus/store'); ?>
          <div class="card">
            <div class="card-body">
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <?php
                    echo form_label('Nama Imam');
                    $nama = [
                      'type'  => 'text',
                      'name'  => 'namapengurus',
                      'id'    => 'namapengurus',
                      'value' => $inputs['namapengurus'],
                      'class' => 'form-control',
                      'placeholder' => 'Masukan Nama imam'
                    ];
                    echo form_input($nama);
                    ?>
                  </div>
                  <div class="form-group">
                    <?php
                    echo form_label('Jenis Kelamin', 'jk');
                    echo form_dropdown('jk', ['' => 'Pilih', 'PRIA' => 'PRIA', 'WANITA' => 'WANITA'], $inputs['jk'], ['class' => 'form-control']);
                    ?>
                  </div>
                  <div class="form-group">
                    <?php
                    echo form_label('Pekerjaan');
                    $pekerjaan = [
                      'type'  => 'text',
                      'name'  => 'pekerjaan',
                      'id'    => 'pekerjaan',
                      'value' => $inputs['pekerjaan'],
                      'class' => 'form-control',
                      'placeholder' => 'Masukan Pekerjaan...'
                    ];
                    echo form_input($pekerjaan);
                    ?>
                  </div>
                  <div class="form-group">
                    <?php
                    echo form_label('Alamat Rumah Imam');
                    $alamat = [
                      'type'  => 'text',
                      'name'  => 'alamat',
                      'id'    => 'alamat',
                      'value' => $inputs['alamat'],
                      'class' => 'form-control',
                      'placeholder' => 'Masukan alamat imam'
                    ];
                    echo form_input($alamat);
                    ?>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <?php
                    echo form_label('Kontak Pengurus');
                    $handphone = [
                      'type'  => 'number',
                      'name'  => 'telephone',
                      'id'    => 'telephone',
                      'value' => $inputs['telephone'],
                      'class' => 'form-control',
                      'placeholder' => 'Masukan Nomer telephone'
                    ];
                    echo form_input($handphone);
                    ?>
                  </div>
                  <div class="form-group">
                    <?php
                    echo form_label('Jabatan Pengurus', 'jabatan');
                    echo form_dropdown('jabatan', ['' => 'Pilih', 'PENASEHAT' => 'PENASEHAT', 'KETUA' => 'KETUA', 'WAKIL KETUA' => 'WAKIL KETUA', 'SEKERTARIS' => 'SEKERTARIS', 'SEKSI PERLENGKAPAN' => 'SEKSI PERLENGKAPAN', 'SEKSI HUMAS' => 'SEKSI HUMAS', 'SEKSI BENDAHARA' => 'SEKSI BENDAHARA', 'SEKSI BENDAHARA' => 'SEKSI BENDAHARA', 'SEKSI PBHI' => 'SEKSI PBHI', 'SEKSI TEKNISI' => 'SEKSI TEKNISI'], $inputs['jabatan'], ['class' => 'form-control']);
                    ?>
                  </div>
                  <div class="form-group">
                    <?php
                    echo form_label('Status Keaktifan Imam', 'Status');
                    echo form_dropdown('status', ['' => 'Pilih', 'AKTIF' => 'AKTIF', 'OFF' => 'OFF'], $inputs['status'], ['class' => 'form-control']);
                    ?>
                  </div>
                  <div class="form-group">
                    <?php
                    echo form_label('Tanggal  Terdata');
                    $tanggalmasuk = [
                      'type'  => 'date',
                      'name'  => 'tanggalmasuk',
                      'id'    => 'tanggalmasuk',
                      'value' => $inputs['tanggalmasuk'],
                      'class' => 'form-control',
                      'placeholder' => 'tanggalmasuk'
                    ];
                    echo form_input($tanggalmasuk);
                    ?>
                  </div>

                </div>
              </div>
            </div>
            <div class="card-footer">
              <a href="<?php echo base_url('daftarpengurus'); ?>" class="btn btn-outline-info">Back</a>
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