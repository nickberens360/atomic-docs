<?php 	

	$current_page = basename($_SERVER['PHP_SELF']);
   
?>

    



<div class="atoms-side_show-small ">
	<span class="toggle-line"></span>
	<span class="toggle-line"></span>
	<span class="toggle-line"></span>
</div>

<div class="atoms-side_show ">
	<span class="toggle-line"></span>
	<span class="toggle-line"></span>
	<span class="toggle-line"></span>
</div>
<aside class="atoms-side">
<div class="atoms-overflow">

	<!-- <span class="atoms-side_hide"><span class="fa fa-bars"></span><span class="fa fa-code"></span></span> -->
	<span class="atoms-side_hide">Hide Sidebar</span>

	<nav>
		<ul class="atoms-nav">
			<?php include ("categories/atomic-nav.php");?>
      <li class="catAdd"><a class="ad_js-actionOpen ad_actionBtn" href="atomic-core/categories/_catActions.php"><span class="fa fa-plus"></span> Add / Delete Category</a></li>
		</ul>
		 
	</nav>


</div>

            <div class="cat-form js-showContent"></div>
            
          
</aside>
<?php /*?><aside class="atoms-side">
<div class="atoms-overflow">

	<span class="atoms-side_hide">Hide Sidebar</span>

	<nav>
		<ul class="atoms-nav">
			<?php include ("categories/atomic-nav.php");?>
      <li class="catAdd"><a class="ad_js-actionOpen ad_actionBtn" href="atomic-core/categories/_catActions.php"><span class="fa fa-plus"></span> Add / Delete Category</a></li>
		</ul>
		 
	</nav>


</div>

            <div class="cat-form js-showContent"></div>
            
          
</aside><?php */?>



