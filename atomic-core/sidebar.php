<?php 	
	
	/*require 'partial-mngr/functions/functions.php';

	require 'partial-mngr/create.php';
	require 'partial-mngr/delete.php';
	require 'partial-mngr/create-category.php';
	require 'partial-mngr/delete-category.php';
    require 'partial-mngr/file-rename.php';
    require 'partial-mngr/file-move.php';*/

	$current_page = basename($_SERVER['PHP_SELF']);

?>

  



<div class="atoms-side_show">
	<span class="toggle-line"></span>
	<span class="toggle-line"></span>
	<span class="toggle-line"></span>
</div>
<aside class="atoms-side">
<div class="atoms-overflow">

	<span class="atoms-side_hide">Hide Sidebar</span>

	<nav>
		<ul class="atoms-nav">
			<?php include ("includes/_sidebar.php");?>
      <li class="catAdd"><a class="ad_js-actionOpen ad_actionBtn" href="atomic-core/actions/_catActions.php"><span class="fa fa-plus"></span> Add / Delete Category</a></li>
		</ul>
		 
	</nav>


</div>

            <div class="cat-form js-showContent"></div>
            
          
</aside>



