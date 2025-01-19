<?php echo view('frontend/_partials/head'); ?>
  <main class="main">

    <!-- Page Title -->
    <div class="page-title dark-background" data-aos="fade" style="background-image: url(assets/img/ui/background_header.jpg);">
      <div class="container position-relative">
        <h1>Kontak Masjid</h1>
        <nav class="breadcrumbs">
          <ol>
            <li><a href="<?php echo base_url('/'); ?>">Halaman Utama</a></li>
            <li class="current">Kontak</li>
          </ol>
        </nav>
      </div>
    </div><!-- End Page Title -->

    <!-- Contact Section -->
    <section id="contact" class="contact section">

      <div class="mb-5">
        <iframe style="width: 100%; height: 400px;" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d126914.89113571603!2d106.8114953890625!3d-6.251825576619191!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e699317aa01af1b%3A0x746cd3f7443aa4d3!2sMasjid%20Al-Hikmah!5e0!3m2!1sid!2sid!4v1737261169119!5m2!1sid!2sid" frameborder="0" allowfullscreen=""></iframe>
      </div><!-- End Google Maps -->

      <div class="container" data-aos="fade">

        <div class="row gy-5 gx-lg-5">

          <div class="col-lg-4">

            <div class="info">
              <h3>Hubungi Kami</h3>
              <p>Silahkan Mengirimkan email untuk berkomunikasi dengan admin masjid alhikmah payangan</p>
              <div class="info-item d-flex">
                <i class="bi bi-geo-alt flex-shrink-0"></i>
                <div>
                  <h4>Alamat:</h4>
                  <p>Jl. Wibawa Mukti II Jl. Diman, RT.004/RW.006, Jatisari, Kec. Jatiasih, Kota Bekasi, Jawa Barat 17426</p>
                </div>
              </div><!-- End Info Item -->

              <div class="info-item d-flex">
                <i class="bi bi-envelope flex-shrink-0"></i>
                <div>
                  <h4>Email:</h4>
                  <p>masjidalhikmahpayangan@gmail.com</p>
                </div>
              </div><!-- End Info Item -->

              <div class="info-item d-flex">
                <i class="bi bi-phone flex-shrink-0"></i>
                <div>
                  <h4>Call:</h4>
                  <p><b>  Kontak 1 : </b> +62 857 1696 7806</p><br>
                  <p><b>  Kontak 2 : </b> +62 822 6199 4978</p>
                </div>
              </div><!-- End Info Item -->

            </div>

          </div>

          <div class="col-lg-8">
            <form action="forms/contact.php" method="post" role="form" class="php-email-form">
              <div class="row">
                <div class="col-md-6 form-group">
                  <input type="text" name="name" class="form-control" id="name" placeholder="Masukan Nama Anda" required="">
                </div>
                <div class="col-md-6 form-group mt-3 mt-md-0">
                  <input type="email" class="form-control" name="email" id="email" placeholder="Masukan Email Anda" required="">
                </div>
              </div>
              <div class="form-group mt-3">
                <input type="text" class="form-control" name="subject" id="subject" placeholder="Judul Email" required="">
              </div>
              <div class="form-group mt-3">
                <textarea class="form-control" name="message" placeholder="Pesan Email ..." required=""></textarea>
              </div>
              <div class="my-3">
                <div class="loading">Loading</div>
                <div class="error-message"></div>
                <div class="sent-message">Your message has been sent. Thank you!</div>
              </div>
              <div class="text-center"><button type="submit">Kirim Email</button></div>
            </form>
          </div><!-- End Contact Form -->

        </div>

      </div>

    </section><!-- /Contact Section -->
  </main>
  <?php echo view('frontend/_partials/footer'); ?>