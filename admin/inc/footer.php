<!-- App Settings FAB -->
<div id="app-settings">
  <app-settings layout-active="default" :layout-location="{
      'default': 'admin-dashboard.html',
      'fixed': 'fixed-admin-dashboard.html',
      'fluid': 'fluid-admin-dashboard.html',
      'mini': 'mini-admin-dashboard.html'
    }"></app-settings>
</div>

<!-- jQuery -->
<script src="assets/vendor/jquery.min.js"></script>

<!-- Bootstrap -->
<script src="assets/vendor/popper.min.js"></script>
<script src="assets/vendor/bootstrap.min.js"></script>

<!-- Perfect Scrollbar -->
<script src="assets/vendor/perfect-scrollbar.min.js"></script>

<!-- DOM Factory -->
<script src="assets/vendor/dom-factory.js"></script>

<!-- MDK -->
<script src="assets/vendor/material-design-kit.js"></script>

<!-- Range Slider -->
<script src="assets/vendor/ion.rangeSlider.min.js"></script>
<script src="assets/js/ion-rangeslider.js"></script>

<!-- App -->
<script src="assets/js/toggle-check-all.js"></script>
<script src="assets/js/check-selected-row.js"></script>
<script src="assets/js/dropdown.js"></script>
<script src="assets/js/sidebar-mini.js"></script>
<script src="assets/js/app.js"></script>

<!-- App Settings (safe to remove) -->
<script src="assets/js/app-settings.js"></script>


<!-- Flatpickr -->
<script src="assets/vendor/flatpickr/flatpickr.min.js"></script>
<script src="assets/js/flatpickr.js"></script>

<!-- Global Settings -->
<script src="assets/js/settings.js"></script>

<!-- Chart.js -->
<script src="assets/vendor/Chart.min.js"></script>

<!-- App Charts JS -->
<script src="assets/js/charts.js"></script>

<!-- Chart Samples -->
<script src="assets/js/page.admin-dashboard.js"></script>

<!-- Vector Maps -->
<script src="assets/vendor/jqvmap/jquery.vmap.min.js"></script>
<script src="assets/vendor/jqvmap/maps/jquery.vmap.world.js"></script>
<script src="assets/js/vector-maps.js"></script>

<!-- My Custom Js -->
<script src="custom/js/admin.js"></script>

<!-- DataTables js -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.21/js/jquery.dataTables.min.js" integrity="sha512-BkpSL20WETFylMrcirBahHfSnY++H2O1W+UnEEO4yNIl+jI2+zowyoGJpbtk6bx97fBXf++WJHSSK2MV4ghPcg==" crossorigin="anonymous"></script>

<script>
  $(document).ready(function() {
    $('#myTable').DataTable();
  });
</script>
</body>

</html>