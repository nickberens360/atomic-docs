




<script src="atomic-core/js/min/compiled.min.js"></script>
<!--<script src="atomic-core/vendor/jquery-ui/jquery-ui.min.js"></script>-->

<script src="atomic-core/Sortable/jquery.fn.sortable.js"></script>


<script>
	$(".aa_fileSection").sortable({
		group: ".aa_dir ",
		onUpdate: function (evt) {
			var itemEl = evt.item;  // dragged HTMLElement
			

		}
	});

</script>


<!--<style>
	.js-show-form{
		display: none;
	}
</style>


<script>
	$(function() {



		$( ".aa_fileSection" ).droppable();



	});
</script>-->



<?php
$filename = '../atomic-foot.php';
if (file_exists($filename)) {
	include ("../atomic-foot.php");
}
?>



</body>
</html>