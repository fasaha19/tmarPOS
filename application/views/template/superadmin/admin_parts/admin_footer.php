 <footer class="main-footer" style="z-index: 1;">
  
    All rights reserved.
    <!-- <div class="float-right  d-sm-inline-block"> -->
      <b>Powered by</b> Fasaha Software Solutions
    <!-- </div> -->
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->

</div>
<!-- ./wrapper -->


<!-- jQuery UI 1.11.4 -->
<script src="../assets/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="../assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="../assets/plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="../assets/plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="../assets/plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="../assets/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="../assets/plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="../assets/plugins/moment/moment.min.js"></script>
<script src="../assets/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="../assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="../assets/plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="../assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>

<!-- AdminLTE for demo purposes -->
<script src="../assets/dist/js/demo.js"></script>
  
<script src="../assets/plugins/summernote/summernote-bs4.min.js"></script>
<script src="../assets/fishcart/vendor/sweetalert/sweetalert.min.js"></script>


<script src="../assets/plugins/datatables/jquery.dataTables.js"></script>
<script src="../assets/plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>

<script src="../assets/plugins/moment/moment.min.js"></script>
<script src="../assets/plugins/fullcalendar/main.min.js"></script>
<script src="../assets/plugins/fullcalendar-daygrid/main.min.js"></script>
<script src="../assets/plugins/fullcalendar-timegrid/main.min.js"></script>
<script src="../assets/plugins/fullcalendar-interaction/main.min.js"></script>
<script src="../assets/plugins/fullcalendar-bootstrap/main.min.js"></script>

<script type="text/javascript">
     function validate(id){

    // alert('#'+id+'err');
    // console.log($('#'+id).length);

    if ($('#'+id).val() == '' ) {
        $('#'+id).addClass('border-danger');
        $('#'+id+'err').show();

    }
    else{
          $('#'+id+'err').hide();
         $('#'+id).removeClass('border-danger');

    }


    };
    var btn = $('#button_to_top');

    $(window).scroll(function() {
      if ($(window).scrollTop() > 300) {
        btn.addClass('show');
      } else {
        btn.removeClass('show');
      }
    });

    btn.on('click', function(e) {
      e.preventDefault();
      $('html, body').animate({scrollTop:0}, '300');
    });
</script>



</body>
</html>
