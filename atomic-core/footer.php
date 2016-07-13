




<script src="atomic-core/js/min/compiled.min.js"></script>
<!--<script src="atomic-core/vendor/jquery-ui/jquery-ui.min.js"></script>-->

<script src="atomic-core/newSort/jquery.fn.sortable.js"></script>


<script>
	$(".aa_fileSection").sortable({
		group: ".aa_dir ",
		filter: ".aa_addFileItem",
		onStart: function (evt) {
			var itemEl = evt.item;  // dragged HTMLElement
			var currentComp = $(itemEl).data("component");
			var currentCat = $(itemEl).data("category");

			console.log('Component name: ' + currentComp);
			console.log('Current category: ' + currentCat);
		},
		onAdd: function (evt) {
			var itemEl = evt.item;  // dragged HTMLElement
			var navItemParent = $(itemEl).closest('.aa_dir').data("navitem");

			console.log('New category: ' + navItemParent);
		},
		onEnd: function (/**Event*/evt) {
			var oldPosition = evt.oldIndex;
			var newPosition = evt.newIndex;

			console.log('Old position: ' + oldPosition);
			console.log('New position: ' + newPosition);
		}
	});

</script>

<style>
	.sortable-ghost{
		opacity:0;
	}
</style>

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