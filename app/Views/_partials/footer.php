<footer class="main-footer">
  <div class="float-right d-none d-sm-inline">
    Sistem Pengelolaan Manajemen Masjid
  </div>
  <strong>Copyright &copy; 2020 <script type="text/javascript">
      new Date().getFullYear() > 2020 && document.write(" - " + new Date().getFullYear());
    </script> <a href="<?php echo base_url('/'); ?>">PAYANGANDEV</a>.</strong> All rights reserved.
</footer>


<!-- jQuery -->
<script src="<?php echo base_url('plugins/jquery/jquery.min.js'); ?>"></script>
<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<!-- Bootstrap 4 -->
<script src="<?php echo base_url('plugins/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>
<!-- DataTables  & Plugins -->
<script src="<?php echo base_url('plugins/datatables/jquery.dataTables.min.js'); ?>"></script>
<script src="<?php echo base_url('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js'); ?>"></script>
<script src="<?php echo base_url('plugins/datatables-responsive/js/dataTables.responsive.min.js'); ?>"></script>
<script src="<?php echo base_url('plugins/datatables-responsive/js/responsive.bootstrap4.min.js'); ?>"></script>
<script src="<?php echo base_url('plugins/datatables-buttons/js/dataTables.buttons.min.js'); ?>"></script>
<script src="<?php echo base_url('plugins/datatables-buttons/js/buttons.bootstrap4.min.js'); ?>"></script>
<script src="<?php echo base_url('plugins/jszip/jszip.min.js'); ?>"></script>
<script src="<?php echo base_url('plugins/pdfmake/pdfmake.min.js'); ?>"></script>
<script src="<?php echo base_url('plugins/pdfmake/vfs_fonts.js'); ?>"></script>
<script src="<?php echo base_url('plugins/datatables-buttons/js/buttons.html5.min.js'); ?>"></script>
<script src="<?php echo base_url('plugins/datatables-buttons/js/buttons.print.min.js'); ?>"></script>
<script src="<?php echo base_url('plugins/datatables-buttons/js/buttons.colVis.min.js'); ?>"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url('plugins/daterangepicker/daterangepicker.js'); ?>"></script>

<script src="<?php echo base_url('dist/js/adminlte.min.js'); ?>"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url('dist/js/demo.js'); ?>"></script>
<!-- Page specific script -->
<script>
  $(function() {
    $("#example1").DataTable({
      "responsive": true,
      "searching": false,
      "lengthChange": false,
      "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": true,
      "responsive": true,
    });
  });
</script>
</div>
</body>

</html>