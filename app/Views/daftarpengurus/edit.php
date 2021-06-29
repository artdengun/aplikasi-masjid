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

      Alamat : <p><b>Jl. Wibawa Mukti II Jl. Diman, RT.004/RW.006, Jatisari, Kec. Jatiasih, Kota Bks, Jawa Barat 17426</b></p>
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="<?php echo base_url('/') ?>">Dashboard</a></li>
          <li class="breadcrumb-item"><a href="<?php echo base_url('/daftarpengurus') ?>">Data Pengurus</a></li>
          <li class="breadcrumb-item" aria-current="page">Edit Data</li>
        </ol>
      </nav>
    </div>
  </div>

  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <form action="<?php echo base_url('daftarpengurus/update'); ?>" method="post">
            <div class="card">
              <div class="card-body">
                <?php
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

                <input type="hidden" name="idpengurus" value="<?php echo $daftarpengurus['idpengurus']; ?>">
                <div class="form-group">
                  <label for="">Nama</label>
                  <input type="text" class="form-control" name="namapengurus" placeholder="Masukan Nama daftarpengurus" value="<?php echo $daftarpengurus['namapengurus']; ?>">
                </div>
                <div class="form-group">
                  <label for="">Jenis Kelamin</label>
                  <select name="jk" id="" class="form-control">
                    <option value="">Pilih Kategori</option>
                    <option <?php echo $daftarpengurus['jk'] == "Akhwan" ? "selected" : ""; ?> value="Akhwan">Akhwan</option>
                    <option <?php echo $daftarpengurus['jk'] == "Akhwat" ? "selected" : ""; ?> value="Akhwat">Akhwat</option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="">Pekerjaan</label>
                  <input type="text" class="form-control" name="pekerjaan" placeholder="Masukan Pekerjaan" value="<?php echo $daftarpengurus['pekerjaan']; ?>">
                </div>
                <div class="form-group">
                  <label for="">Alamat daftarpengurus</label>
                  <input type="text" class="form-control" name="alamat" placeholder="Masukan Alamat" value="<?php echo $daftarpengurus['alamat']; ?>">
                </div>
                <div class="form-group">
                  <label for="">Telephone</label>
                  <input type="number" class="form-control" name="telephone" placeholder="Masukan No Telephone" value="<?php echo $daftarpengurus['telephone']; ?>">
                </div>
                <div class="form-group">
                  <label for="">Jabatan</label>
                  <select name="jabatan" id="" class="form-control">
                    <option value="">Pilih Kategori</option>
                    <option <?php echo $daftarpengurus['jabatan'] == "PENASEHAT"          ? "selected" : ""; ?> value="PENASEHAT"> PENASEHAT </option>
                    <option <?php echo $daftarpengurus['jabatan'] == "KETUA"              ? "selected" : ""; ?> value="KETUA"> KETUA </option>
                    <option <?php echo $daftarpengurus['jabatan'] == "WAKIL KETUA"        ? "selected" : ""; ?> value="WAKIL KETUA"> WAKIL KETUA </option>
                    <option <?php echo $daftarpengurus['jabatan'] == "SEKERTARIS"         ? "selected" : ""; ?> value="SEKERTARIS"> SEKERTARIS </option>
                    <option <?php echo $daftarpengurus['jabatan'] == "SEKSI PERLENGKAPAN" ? "selected" : ""; ?> value="SEKSI PERLENGKAPAN"> SEKSI PERLENGKAPAN </option>
                    <option <?php echo $daftarpengurus['jabatan'] == "SEKSI HUMAS"        ? "selected" : ""; ?> value="SEKSI HUMAS"> SEKSI HUMAS </option>
                    <option <?php echo $daftarpengurus['jabatan'] == "SEKSI BENDAHARA"    ? "selected" : ""; ?> value="SEKSI BENDAHARA"> SEKSI BENDAHARA </option>
                    <option <?php echo $daftarpengurus['jabatan'] == "SEKSI JUMAT"        ? "selected" : ""; ?> value="SEKSI JUMAT"> SEKSI JUMAT </option>
                    <option <?php echo $daftarpengurus['jabatan'] == "SEKSI PBHI"         ? "selected" : ""; ?> value="SEKSI PBHI"> SEKSI PBHI </option>
                    <option <?php echo $daftarpengurus['jabatan'] == "SEKSI TEKNISI"      ? "selected" : ""; ?> value="SEKSI TEKNISI"> SEKSI TEKNISI </option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="">Status daftarpengurus</label>
                  <select name="status" id="" class="form-control">
                    <option value="">Pilih Kategori</option>
                    <option <?php echo $daftarpengurus['status'] == "AKTIF" ? "selected" : ""; ?> value="AKTIF">AKTIF</option>
                    <option <?php echo $daftarpengurus['status'] == "OFF" ? "selected" : ""; ?> value="OFF">OFF</option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="">Tanggal Join</label>
                  <input type="date" class="form-control" name="tanggalmasuk" value="<?php echo $daftarpengurus['tanggalmasuk']; ?>">
                </div>

              </div>
              <div class="card-footer">
                <a href="<?php echo base_url('daftarpengurus'); ?>" class="btn btn-outline-info">Back</a>
                <button type="submit" class="btn btn-primary float-right">Update</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

</div>
<?php echo view('_partials/footer'); ?>