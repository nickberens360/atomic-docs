




<script src="atomic-core/js/min/compiled.js"></script>
<!--<script src="atomic-core/vendor/jquery-ui/jquery-ui.min.js"></script>-->

<script src="atomic-core/newSort/jquery.fn.sortable.js"></script>


<script>



	$(".atoms-nav ").sortable({
		group: ".aa_dir ",
		handle: ".aa_dir__dirNameGroup__name",
		onStart: function (evt) {
			var itemEl = evt.item;  // dragged HTMLElement
			var catName = $(itemEl).data("navitem");;


			console.log('Category name : ' + catName);
		},
		onAdd: function (evt) {
			var itemEl = evt.item;  // dragged HTMLElement
			var navItemParent = $(itemEl).closest('.aa_dir').data("navitem");

			console.log('New category: ' + navItemParent);
		},
		onEnd: function (/**Event*/evt) {
			var oldPosition = evt.oldIndex;
			var newPosition = evt.newIndex;

			console.log('Old Category position: ' + oldPosition);
			console.log('New Category position: ' + newPosition);
		}
	});




	$(".aa_fileSection").sortable({
		group: ".aa_fileSection ",
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
			var oldPosition = evt.oldIndex -1;
			var newPosition = evt.newIndex -1;

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