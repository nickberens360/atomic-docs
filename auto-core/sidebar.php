<?php 	

	$current_page = basename($_SERVER['PHP_SELF']);
   
?>

    



<div class="auto-side_show-small ">
	<span class="toggle-line"></span>
	<span class="toggle-line"></span>
	<span class="toggle-line"></span>
</div>

<div class="auto-side_show ">
	<span class="js-showSide fa fa-arrow-right"></span>
</div>
<aside class="auto-side">
<div class="auto-overflow">

	<div class="auto-side_hide">
		<span class="js-hideSide fa fa-arrow-left"></span>
		<span class="js-hideTitle fa fa-header"></span>
        </span><span class="js-hideNotes fa fa-paragraph"></span>
		</span><span class="js-hideCode fa fa-code"></span>
    </div>
	<!-- <span class="auto-side_hide">Hide Sidebar</span> -->

	<nav>
		<ul class="auto-nav">
			<?php include ("categories/auto-nav.php");?>
      <li class="catAdd"><a class="ad_js-actionOpen ad_actionBtn" href="auto-core/categories/_catActions.php"><span class="fa fa-plus"></span> Add / Delete Category</a></li>
		</ul>
		 
	</nav>


</div>

            <div class="cat-form js-showContent"></div>
            
          
</aside>
<?php /*?><aside class="auto-side">
<div class="auto-overflow">

	<span class="auto-side_hide">Hide Sidebar</span>

	<nav>
		<ul class="auto-nav">
			<?php include ("categories/auto-nav.php");?>
      <li class="catAdd"><a class="ad_js-actionOpen ad_actionBtn" href="auto-core/categories/_catActions.php"><span class="fa fa-plus"></span> Add / Delete Category</a></li>
		</ul>
		 
	</nav>


</div>

            <div class="cat-form js-showContent"></div>
            
          
</aside><?php */?>



