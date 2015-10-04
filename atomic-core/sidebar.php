<?php 	
	//require ("partial-mngr/config.php");
	
	require 'partial-mngr/functions/functions.php';

	require 'partial-mngr/create.php';
	require 'partial-mngr/delete.php';
	require 'partial-mngr/create-category.php';
	require 'partial-mngr/delete-category.php';

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
			<li class="atom-side_head"><a href="#">Components</a></li>
			<?php include ("includes/_sidebar.php");?>
			
			
			
		</ul>
		 
	</nav>


</div>
           <div class="show-hide cat-form-group ">
			  <i class="fa fa-plus-square-o fa-lg"></i>
				<span class="cat-form-btn js-showTrigger">Manage Categories</span>
				<div class="cat-form js-showContent">
					<form class="atomic-sub-form " action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
						<input type="text" class="form-control" id="inputDefault" name="inputName" placeholder="Create Category" required>
						<input type="hidden" name="createDir" value="createDir"/>
					</form>
			
					<form class="atomic-sub-form " action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" onsubmit="return confirm('Deleting a category deletes all files within it as well. Are you sure about this?');">
						<input type="text" class="form-control" id="inputDefault" name="inputName" placeholder="Delete Category" required>
						<input type="hidden" name="deleteDir" value="deleteDir"/>
					</form>
				</div>
			</div>
</aside>



