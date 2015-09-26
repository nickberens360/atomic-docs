<?php 	
	require ("partial-mngr/config.php");
	
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

	<span class="atoms-side_hide">Hide Sidebar</span>


	<nav>
		<ul class="atoms-nav">
			<li class="atom-side_head"><a href="#">Components</a></li>
			<?php include ("includes/_sidebar.php");?>
			<li class="show-hide cat-form-group">
				<span class="cat-form-btn show-hide_btn">+ Manage Categories</span>
				<span class="cat-form-btn show-hide_cls">- Manage Categories</span>
				<div class="cat-form show-hide_content">
					<form class="atomic-sub-form " action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
						<input type="text" class="form-control" id="inputDefault" name="inputName" placeholder="Create Category" required>
						<input type="hidden" name="createDir" value="createDir"/>
					</form>
			
					<form class="atomic-sub-form " action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
						<input type="text" class="form-control" id="inputDefault" name="inputName" placeholder="Delete Category" required>
						<input type="hidden" name="deleteDir" value="deleteDir"/>
					</form>
				</div>
			</li>
			
			
		</ul>
	</nav>
	
</aside>

