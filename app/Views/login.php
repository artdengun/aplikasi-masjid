<?php echo view('_partials/header'); ?>
<body class="hold-transition login-page">
    <div class="login-box">
        <!-- /.login-logo -->
        <div class="card card-outline card-primary shadow-lg">
            <div class="card-header text-center">
                <a href="#" class="h1"><b>MIS</b></a>
            </div> <br>
            <div class="text-center">
                <img src="<?php echo base_url('dist/img/logo.ico'); ?>" class="rounded-circle mx-auto" alt="gambar al-hikmah" height="180"> <br><br>
                <h4>Management Information System</h4>

            </div>
            <p class="login-box-msg"></p>

            <div class="">
            </div>
            <div class="card-body">
                <?php
                if (!empty(session()->getFlashdata('sukses'))) { ?>
                    <div class="alert alert-success">
                        <?php echo session()->getFlashdata('sukses'); ?>
                    </div>
                <?php } ?>

                <?php if (!empty(session()->getFlashdata('haruslogin'))) { ?>
                    <div class="alert alert-info">
                        <?php echo session()->getFlashdata('haruslogin'); ?>
                    </div>
                <?php } ?>

                <?php if (!empty(session()->getFlashdata('gagal'))) { ?>
                    <div class="alert alert-warning">
                        <?php echo session()->getFlashdata('gagal'); ?>
                    </div>
                <?php } ?>
                <?php
                echo form_open('LoginController/cek_login');
                ?>
                <form action="../../index3.html" method="post">
                    <div class="input-group mb-3">
                        <input type="text" name="username" class="form-control" placeholder="Input Username " required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" name="password" class="form-control" placeholder="Input Password" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">

                        <div class="col-md-12">
                            <button type="submit" class="btn btn-primary btn-block">Sign In</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>
                <?php echo form_close(); ?>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
    <!-- /.login-box -->

    <!-- jQuery -->
    <script src="<?= base_url() ?>/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="<?= base_url() ?>/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?= base_url() ?>/dist/js/adminlte.min.js"></script>
</body>

</html>