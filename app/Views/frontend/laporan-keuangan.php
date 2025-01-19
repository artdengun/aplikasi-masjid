<?php echo view('frontend/_partials/head'); ?>

<main class="main">

  <!-- Page Title -->
  <div class="page-title dark-background" data-aos="fade"
    style="background-image: url(assets/img/ui/background_header.jpg);">
    <div class="container position-relative">
      <h1>Laporan Keuangan Masjid Alhikmah </h1>
      <nav class="breadcrumbs">
        <ol>
          <li><a href="<?php echo base_url('/'); ?>">Halaman Utama</a></li>
          <li class="current">Laporan Tahunan</li>
        </ol>
      </nav>
    </div>
  </div><!-- End Page Title -->

  <div class="container">
    <div class="row">

      <div class="col-lg-12">

        <!-- Table Section -->
        <section id="table-section" class="section">
          <div class="container">
            <div class="categories-menu"
              style="overflow-x: auto; white-space: nowrap; background-color: #f8f9fa; padding: 10px 0; border-bottom: 1px solid #ddd;">
              <ul class="nav nav-tabs"
                style="display: flex; flex-wrap: nowrap; gap: 10px; margin: 0; padding: 0; list-style: none;">
                <li class="nav-item">
                  <a class="nav-link active" data-bs-toggle="tab" href="#laporan-keuangan"
                    style="flex-shrink: 0;">Laporan Keuangan</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" data-bs-toggle="tab" href="#laporan-jumat" style="flex-shrink: 0;">Laporan
                    Jumat</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" data-bs-toggle="tab" href="#laporan-tahunan" style="flex-shrink: 0;">Laporan
                    Tahunan</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" data-bs-toggle="tab" href="#laporan-lainnya" style="flex-shrink: 0;">Laporan
                    Lainnya</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" data-bs-toggle="tab" href="#laporan-lainnya" style="flex-shrink: 0;">Laporan
                    Lainnya</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" data-bs-toggle="tab" href="#laporan-lainnya" style="flex-shrink: 0;">Laporan
                    Lainnya</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" data-bs-toggle="tab" href="#laporan-lainnya" style="flex-shrink: 0;">Laporan
                    Lainnya</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" data-bs-toggle="tab" href="#laporan-lainnya" style="flex-shrink: 0;">Laporan
                    Lainnya</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" data-bs-toggle="tab" href="#laporan-lengkap" style="flex-shrink: 0;">Laporan
                    Lengkap</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" data-bs-toggle="tab" href="#laporan-proyek" style="flex-shrink: 0;">Laporan
                    Proyek</a>
                </li>
              </ul>
            </div>
            <div class="tab-content mt-3">
              <!-- Laporan Keuangan -->
              <div class="tab-pane fade show active" id="laporan-keuangan">
                <h3>Laporan Keuangan</h3>
                <input type="text" class="search-input" placeholder="Cari di tabel..." data-target="table-keuangan">
                <table id="table-keuangan" class="table table-striped table-bordered" style="width:100%">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Keterangan</th>
                      <th>Tanggal</th>
                      <th>Jumlah</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>1</td>
                      <td>Keuangan Bulan Januari</td>
                      <td>2023-01-10</td>
                      <td>10,000,000</td>
                    </tr>
                    <tr>
                      <td>2</td>
                      <td>Keuangan Bulan Februari</td>
                      <td>2023-02-12</td>
                      <td>8,500,000</td>
                    </tr>
                  </tbody>
                </table>
              </div>

              <!-- Laporan Jumat -->
              <div class="tab-pane fade" id="laporan-jumat">
                <h3>Laporan Jumat</h3>
                <input type="text" class="search-input" placeholder="Cari di tabel..." data-target="table-jumat">
                <table id="table-jumat" class="table table-striped table-bordered" style="width:100%">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Kegiatan</th>
                      <th>Tanggal</th>
                      <th>Penanggung Jawab</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>1</td>
                      <td>Pengajian Jumat Pertama</td>
                      <td>2023-01-06</td>
                      <td>Ust. Abdullah</td>
                    </tr>
                    <tr>
                      <td>2</td>
                      <td>Gotong Royong Jumat Kedua</td>
                      <td>2023-01-13</td>
                      <td>Ust. Rahman</td>
                    </tr>
                  </tbody>
                </table>
              </div>

              <!-- Laporan Tahunan -->
              <div class="tab-pane fade" id="laporan-tahunan">
                <h3>Laporan Tahunan</h3>
                <div class="filter-section">
                  <!-- Year range filter -->
                  <label for="year-range-start">From Year:</label>
                  <input type="number" id="year-range-start" placeholder="Start Year">
                  <label for="year-range-end">To Year:</label>
                  <input type="number" id="year-range-end" placeholder="End Year">
                </div>
                <input type="text" class="search-input" placeholder="Cari di tabel..." data-target="table-tahunan">
                <table id="table-tahunan" class="table table-striped table-bordered" style="width:100%">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Judul</th>
                      <th>Tahun</th>
                      <th>Status</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>1</td>
                      <td>Laporan Tahunan 2021</td>
                      <td>2021</td>
                      <td>Selesai</td>
                    </tr>
                    <tr>
                      <td>2</td>
                      <td>Laporan Tahunan 2022</td>
                      <td>2022</td>
                      <td>Dalam Proses</td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>

          </div>
        </section><!-- /Table Section -->

      </div>

    </div>
  </div>

</main>

<?php echo view('frontend/_partials/footer'); ?>

<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
<script>
  $(document).ready(function() {
    $('#table-keuangan').DataTable();
    $('#table-jumat').DataTable();
    $('#table-tahunan').DataTable();
    // Fungsi untuk search per tabel
    $('.search-input').on('input', function() {
      const tableId = $(this).data('target');
      const searchValue = $(this).val();
      $('#' + tableId).DataTable().search(searchValue).draw();
    });
    // Custom filter for year range
    $('#year-range-start, #year-range-end').on('input', function() {
      var minYear = $('#year-range-start').val();
      var maxYear = $('#year-range-end').val();
      // Apply the filter to the Tahun column (column index 2)
      table.columns(2).search(function(data, row, column, settings) {
        var year = parseInt(data);
        if ((minYear && year < minYear) || (maxYear && year > maxYear)) {
          return false; // Don't show this row if it doesn't match the range
        }
        return true; // Show this row if it's within the range
      }).draw();
    });
  });
</script>