<footer class="main-footer">
    {{-- <div class="pull-right hidden-xs">
      <b> Version</b> 1.0.0
    </div> --}}
    <strong>Copyright &copy; 2018-2019 <a href="{{ aurl() }}">BAM</a>.</strong>
  </footer>

  
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="{{ url('/design/adminlte/bower_components/jquery/dist/jquery.min.js') }}"></script>


<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{ url('/design/adminlte/bower_components/jquery-ui/jquery-ui.min.js') }}"></script>
<!-- DataTables -->
  <link rel="stylesheet" href="{{ url('design/adminlte') }}/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <!-- DataTables -->
<script src="{{ url('design/adminlte') }}/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="{{ url('design/adminlte') }}/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script src="{{ url('design/adminlte') }}/bower_components/datatables.net-bs/js/dataTables.buttons.min.js"></script>
<script src="{{ url('') }}/vendor/datatables/buttons.server-side.js"></script>

<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="{{ url('/design/adminlte/bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
<!-- Morris.js charts -->
<script src="{{ url('/design/adminlte/bower_components/raphael/raphael.min.js') }}"></script>
<script src="{{ url('/design/adminlte/bower_components/morris.js/morris.min.js') }}"></script>
<!-- Sparkline -->
<script src="{{ url('/design/adminlte/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js') }}"></script>
<!-- jvectormap -->
<script src="{{ url('/design/adminlte/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js') }}"></script>
<script src="{{ url('/design/adminlte/plugins/jvectormap/jquery-jvectormap-world-mill-en.js') }}"></script>
<!-- jQuery Knob Chart -->
<script src="{{ url('/design/adminlte/bower_components/jquery-knob/dist/jquery.knob.min.js') }}"></script>
<!-- daterangepicker -->
<script src="{{ url('/design/adminlte/bower_components/moment/min/moment.min.js') }}"></script>
<script src="{{ url('/design/adminlte/bower_components/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
<!-- datepicker -->
<script src="{{ url('/design/adminlte/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="{{ url('/design/adminlte/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js') }}"></script>
<!-- Slimscroll -->
<script src="{{ url('/design/adminlte/bower_components/jquery-slimscroll/jquery.slimscroll.min.js') }}"></script>
<!-- FastClick -->
<script src="{{ url('/design/adminlte/bower_components/fastclick/lib/fastclick.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ url('/design/adminlte/dist/js/adminlte.min.js') }}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{ url('/design/adminlte/dist/js/pages/dashboard.js') }}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ url('/design/adminlte/dist/js/demo.js') }}"></script>
<script src="{{ url('/design/adminlte/dist/js/myfunctions.js') }}"></script>
<script src="{{ url('/design/adminlte/jstree/jstree.js') }}"></script>
<script src="{{ url('/design/adminlte/jstree/jstree.wholerow.js') }}"></script>
<script src="{{ url('/design/adminlte/jstree/jstree.checkbox.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/js/bootstrap-datepicker.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/locales/bootstrap-datepicker.ar.min.js"></script>
@stack('js')
@stack('css')

</body>
</html>