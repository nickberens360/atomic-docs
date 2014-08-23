$( ".atomic-link-show" ).click(function() {
  $(this).parent().next().slideToggle();
	$(this).text(function(i, text){
          return text === "-" ? "+" : "-";
      })
});



//<div class="atomic-link-grp">
//	<span class="atomic-link-show"></span>
//	<a class="atomic-link-main" href="atoms.php">Atoms</a>
//</div>
//<ul class="atoms-sub-menu">