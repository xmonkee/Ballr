
<!-- Le javascript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="js/jquery.min.js"></script>
<script src="bootstrap/js/bootstrap.js"></script>
<script src="js/jquery.rating.pack.js"></script>
<script>
$(function() {
	$('#theme_switcher ul li a').bind('click',
		function(e) {
			$("#switch_style").attr("href", "http://bootswatch.com/"+$(this).attr('rel')+"/bootstrap.min.css");    		
			return false;
		}
	);
});
</script>

