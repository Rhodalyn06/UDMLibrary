<script src="assets/js/jquery-1.10.2.js"></script>
<script src="assets/js/jquery-2.1.0.min.js"></script>
      <!-- BOOTSTRAP SCRIPTS -->
<script src="assets/js/bootstrap.min.js"></script>
    <!-- METISMENU SCRIPTS -->
<script src="assets/js/jquery.metisMenu.js"></script>
<!-- DATA TABLE SCRIPTS -->
<script src="assets/js/dataTables/jquery.dataTables.js"></script>
<script src="assets/js/dataTables/dataTables.bootstrap.js"></script>
<script>
    $(document).ready(function () {
        $('#dataTables-example').dataTable();
        if (typeof init === 'function') {
            init();
        }
    });
</script>
     <!-- CUSTOM SCRIPTS -->
<script src="assets/js/custom.js"></script>
