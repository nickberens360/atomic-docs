<div class="atomic-sideBar">




    <div class="atomic-controlBar">
        <ul class="atomic-actions">
            <li><a href="<?= baseAlias('updateSidebar') ?>" class="js-atomic-dash__hide atomic-dash__hide ajax-link"><i class="fa fa-arrow-left" aria-hidden="true"></i></a></li>
            <li><a href="#" class="js-atomic-searchTrigger"><i class="fa fa-search" aria-hidden="true"></i></a></li>
            <li><a href="#" class="js-atomic-open-editPanel"><i class="fa fa-cog" aria-hidden="true"></i></a></li>
        </ul>
    </div>


    <div class="atomic-logoBox">
        <img src="<?= $logo ?>" alt="">
    </div>




    <div class="atomic-sideContent">

        <?php echo $this->render($nav,NULL,get_defined_vars(),0); ?>


        <div class="atomic-dirBoxGroup atomic-catDest">

            <div class="atomic-dirBoxGroup__footer">
                <a href="/atomic-docs/category/add" data-target="panel" class="atomic-btn atomic-btn-3 atomic-add-category ajax-link"><i class="fa fa-plus" aria-hidden="true"></i> Add Category</a>
            </div>
        </div>

    </div>

</div>