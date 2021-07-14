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
                    <li class="breadcrumb-item"><a href="<?php echo base_url('/dashboard') ?>"> <i class="nav-icon fas  fa-mosque"></i> Dashboard</a></li>
                    <li class="breadcrumb-item" aria-current="page"><i class="nav-icon fas  fa-users"></i> Laporan Data Marbot</li>
                </ol>
            </nav>
        </div>
    </div>

    <section class="content">
        <div class="row">
            <div class="row ms-2 mb-3">
                <div class="col-md-4">
                  <div class="form-check">
                    <input class="form-check-input" type="radio" onclick="filterCheck()" name="group1" value="" id="checkByTanggal">
                    <label class="form-check-label" for="checkByTanggal">
                      Berdasarkan Tanggal
                    </label>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-check">
                    <input class="form-check-input" type="radio" onclick="filterCheck()" name="group1" value="" id="checkByBulan">
                    <label class="form-check-label" for="checkByBulan">
                      Berdasarkan Bulan
                    </label>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-check">
                    <input class="form-check-input" type="radio" onclick="filterCheck()" name="group1" value="" id="checkByTahun">
                    <label class="form-check-label" for="checkByTahun">
                      Berdasarkan Tahun
                    </label>
                  </div>
                </div>
              </div>
              <div class="row ms-2">
                <div class="col-md-4" id="selectedTanggal" style="display: none;">
                  <form action="<?= base_url() ?>/MarbotController/filter" method="post">
                    <input value="1" type="hidden" name="filter">
                    <label class="form-label">Tanggal</label>
                    <div class="input-group mb-3">
                      <input type="date" class="form-control" name="tanggalAwal" required>
                      <span class="input-group-text">s/d</span>
                      <input type="date" class="form-control" name="tanggalAkhir" required>
                    </div>
                    <input class="btn btn-secondary" type="submit" value="Proses">
                  </form>
                </div>
                <div class="col-md-4" id="selectedBulan" style="display: none;">
                  <form action="<?= base_url() ?>/MarbotController/filter" method="post">
                    <input value="2" type="hidden" name="filter">
                    <label class="form-label">Tahun</label>
                    <select class="form-select" name="tahun1" required>
                      <option selected>-Tahun-</option>
                      
                      <?php foreach($tahun as $y) : ?>
                        <option value="<?= $y->tahun ?>"><?= $y->tahun ?></option>
                      <?php endforeach; ?>
                      
                    </select>
                    
                    <label class="form-label">Dari Bulan</label>
                    <select class="form-select" name="bulanAwal" required>
                      <option selected>-Bulan Awal-</option>
                      
                      <option value="1">Januari</option>
                      <option value="2">Februari</option>
                      <option value="3">Maret</option>
                      <option value="4">April</option>
                      <option value="5">Mei</option>
                      <option value="6">Juni</option>
                      <option value="7">Juli</option>
                      <option value="8">Agustus</option>
                      <option value="9">September</option>
                      <option value="10">Oktober</option>
                      <option value="11">November</option>
                      <option value="12">Desember</option>
                      
                    </select>
                    
                    <label class="form-label">Sampai Bulan</label>
                    <select class="form-select mb-3" name="bulanAkhir" required>
                      <option selected>-Bulan Akhir-</option>
                      
                      <option value="1">Januari</option>
                      <option value="2">Februari</option>
                      <option value="3">Maret</option>
                      <option value="4">April</option>
                      <option value="5">Mei</option>
                      <option value="6">Juni</option>
                      <option value="7">Juli</option>
                      <option value="8">Agustus</option>
                      <option value="9">September</option>
                      <option value="10">Oktober</option>
                      <option value="11">November</option>
                      <option value="12">Desember</option>
                      
                    </select>
                    
                    <input class="btn btn-secondary" type="submit" value="Proses">
                  </form>
                </div>
                <div class="col-md-4" id="selectedTahun" style="display: none;">
                  <form action="<?= base_url() ?>/MarbotController/filter" method="post">
                    <input value="3" type="hidden" name="filter">
                    <label class="form-label">Tahun</label>
                    <select class="form-select mb-3" name="tahun2" required>
                      <option selected>-Tahun-</option>
                      
                      <?php foreach($tahun as $y) : ?>
                        <option value="<?= $y->tahun ?>"><?= $y->tahun ?></option>
                      <?php endforeach; ?>
                      
                    </select>
                    
                    <input class="btn btn-secondary" type="submit" value="Proses">
                  </form>
                </div>
              </div>
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="table-responsive">

                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama marbot</th>
                                        <th>Alamat</th>
                                        <th>status</th>
                                        <th>handphone</th>
                                        <th>tahun</th>
                                        <th>Petugas</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1 + (5 * ($currentPage - 1)); ?>
                                    <?php foreach ($daftarmarbot as $row) { ?>
                                        <tr>
                                            <td class="text-center"><?= $i++; ?></td>
                                            <td><?php echo $row['nama']; ?></td>
                                            <td><?php echo $row['alamat']; ?></td>
                                            <td><?php echo $row['status']; ?></td>
                                            <td><?php echo $row['handphone']; ?></td>
                                            <td><?php echo $row['tahun']; ?></td>
                                            <td><?php echo $row['namapengurus']; ?></td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama marbot</th>
                                        <th>Alamat</th>
                                        <th>status</th>
                                        <th>handphone</th>
                                        <th>tahun</th>
                                        <th>Petugas</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>

                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
    </section>
</div>

<script>
  
  function filterCheck()
  {
    var cTgl = document.getElementById('checkByTanggal')
    var cBln = document.getElementById('checkByBulan')
    var cThn = document.getElementById('checkByTahun')
    
    var sTgl = document.getElementById('selectedTanggal')
    var sBln = document.getElementById('selectedBulan')
    var sThn = document.getElementById('selectedTahun')
    
    if(cTgl.checked == true)
    {
      sTgl.style.display = 'block'
    } else {
      sTgl.style.display = 'none'
    }
    
    if(cBln.checked == true)
    {
      sBln.style.display = 'block'
    } else {
      sBln.style.display = 'none'
    }
    
    if(cThn.checked == true)
    {
      sThn.style.display = 'block'
    } else {
      sThn.style.display = 'none'
    }
  }
</script>

<?php echo view('_partials/footer'); ?>