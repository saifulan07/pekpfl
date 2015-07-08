<script src="FL_JS/jquery.js"></script>
<script src="FL_JS/jquery-1.8.3.min.js"></script>
<script src="FL_JS/bootstrap-switch.js"></script>
<script src="FL_JS/bootstrap.min.js"></script>
<!-- <script src="js/bootstrap-modal.js"></script> -->
<script src="FL_JS/jquery.scrollTo.min.js"></script>
<script src="FL_JS/jquery.nicescroll.js" type="text/javascript"></script>
<script src="FL_JS/jquery.sparkline.js" type="text/javascript"></script>
<script src="assets/jquery-easy-pie-chart/jquery.easy-pie-chart.js"></script>
<script src="FL_JS/owl.carousel.js" ></script>
<script src="FL_JS/jquery.customSelect.min.js" ></script>

<script type="text/javascript" src="assets/data-tables/jquery.dataTables.js"></script>
<script type="text/javascript" src="assets/data-tables/DT_bootstrap.js"></script>
<script src="js/dynamic-table.js"></script>

<!--common script for all pages-->
<script src="FL_JS/common-scripts.js"></script>

<!--script for this page-->
<!-- <script src="FL_JS/sparkline-chart.js"></script>
<script src="FL_JS/easy-pie-chart.js"></script> -->

<!-- <script type="text/javascript" src="assets/bootstrap-colorpicker/js/bootstrap-colorpicker.js"></script> -->
<script src="FL_JS/form-component.js"></script>
<script src="FL_JS/jquery.tagsinput.js"></script>

<script>
    $(".confirmClick").click( function() { 
        if ($(this).attr('title')) {
            var question = 'Are you sure you want to ' + $(this).attr('title').toLowerCase() + '?';
        }else {
            var question = 'Confirm Action?';
        }
        if (confirm(question)) {
            [removed].href = this.src;
        }else {
            return false;
        }
    });
</script>