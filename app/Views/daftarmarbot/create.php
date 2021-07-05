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
          <li class="breadcrumb-item"><a href="<?php echo base_url('/') ?>"> <i class="nav-icon fas  fa-mosque"></i> Dashboard</a></li>
          <li class="breadcrumb-item"><a href="<?php echo base_url('/daftarmarbot') ?>"> <i class="nav-icon fas  fa-users"></i> Data Marbot</a></li>
          <li class="breadcrumb-item" aria-current="page"><i class="nav-icon fas  fa-user"></i> Tambah Data</li>
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
          <?php echo form_open_multipart('daftarmarbot/store'); ?>
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
                    echo form_label('Nama marbot');
                    $nama = [
                      'type'  => 'text',
                      'name'  => 'nama',
                      'id'    => 'nama',
                      'value' => $inputs['nama'],
                      'class' => 'form-control',
                      'placeholder' => 'Masukan Nama marbot'
                    ];
                    echo form_input($nama);
                    ?>
                  </div>
                  <div class="form-group">
                    <?php
                    echo form_label('Alamat Rumah marbot');
                    $alamat = [
                      'type'  => 'text',
                      'name'  => 'alamat',
                      'id'    => 'alamat',
                      'value' => $inputs['alamat'],
                      'class' => 'form-control',
                      'placeholder' => 'Masukan alamat marbot'
                    ];
                    echo form_input($alamat);
                    ?>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <?php
                    echo form_label('Kontak marbot');
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
                    echo form_label('Tahun marbot Terdata');
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
                    echo form_label('Status Keaktifan marbot', 'Status');
                    echo form_dropdown('status', ['' => 'Pilih', 'AKTIF' => 'AKTIF', 'OFF' => 'OFF'], $inputs['status'], ['class' => 'form-control']);
                    ?>
                  </div>
                </div>
              </div>
            </div>
            <div class="card-footer">
              <a href="<?php echo base_url('daftarmarbot'); ?>" class="btn btn-outline-info">Back</a>
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