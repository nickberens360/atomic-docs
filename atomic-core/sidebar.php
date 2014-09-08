<?php include ("partial-mngr/config.php");?>


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
			<li>
				<form class="atomic-sub-form " action="atomic-core/partial-mngr/create-category.php" method="post">
					<input type="text" class="form-control" id="inputDefault" name="inputName" placeholder="Create Category">
				</form>
			</li>
		</ul>
	</nav>
</aside>
