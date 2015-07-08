<script src="js/jquery.js"></script>
<!-- <script src="js/bootstrap.js"></script> -->
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.chained.min.js"></script>
<script src="js/jquery.dataTables.js"></script>
<script src="js/canvasjs.js"></script>
<!-- <script src="js/bootstrap-modal.js"></script> -->
<!-- <script src="js/bootstrap-transition.js"></script>
<script src="js/bootstrap-alert.js"></script>
<script src="js/bootstrap-dropdown.js"></script>
<script src="js/bootstrap-scrollspy.js"></script>
<script src="js/bootstrap-tab.js"></script>
<script src="js/bootstrap-tooltip.js"></script>
<script src="js/bootstrap-popover.js"></script>
<script src="js/bootstrap-button.js"></script>
<script src="js/bootstrap-collapse.js"></script>
<script src="js/bootstrap-carousel.js"></script>
<script src="js/bootstrap-typeahead.js"></script>
 -->

 <script type="text/javascript">
  $(document).ready(function(){
    $('table#datatable').dataTable();
  });
</script>

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