<?php
$f3 = Base::instance();

$catID = $f3->get('catID');

?>

<div class="atomic-sideBar">




    <div class="atomic-controlBar">
        <ul class="atomic-actions">
            <li><a href="<?= baseAlias('updateSidebar') ?>" class="js-atomic-dash__hide atomic-dash__hide ajax-link"><i class="fa fa-arrow-left" aria-hidden="true"></i></a></li>
            <li><a href="#" class="js-atomic-searchTrigger"><i class="fa fa-search" aria-hidden="true"></i></a></li>
            <li><a href="#" class="js-atomic-open-editPanel"><i class="fa fa-cog" aria-hidden="true"></i></a></li>
        </ul>
    </div>


    <div class="atomic-logoBox">
        <img src="<?= $f3->get('BASE') ?>/img/atomic-logo.svg" alt="">
    </div>


    <div class="atomic-sideContent">
        <div class="atomic-fileSystem">

            <div class="atomic-catItemGroup" data-parent="root">





                <?php foreach ( $categories as $cat ) {

                    if($catID == $cat->categoryId){
                        $dirActive = 'atomic-catItem-active';
                        $iconActive = 'atomic-folder-active';
                    }
                    else{
                        $dirActive = null;
                        $iconActive = null;
                    }

                    ?>

                    <?php if ( $cat->parentCatId == null ) { ?>

                        <div class="atomic-catItem <?= $dirActive ?>" data-cat="<?= $cat->name ?>">


                                <a href="<?= baseAlias('category', ['catId' => $cat->categoryId]); ?>"><i class="js-atomic-catContent-trigger fa fa-folder" aria-hidden="true"></i> <?= $cat->name ?></a>



                                <div class="atomic-catContent">





                         <?php foreach ( $categories as $subCat ) {  ?>

                            <?php if ( $subCat->parentCatId == $cat->categoryId ) {  ?>


                                    <div class="atomic-catItemGroup" data-parent="<?= $subCat->name ?>">
                                        <div class="atomic-catItem <?= $dirActive ?>" data-cat="headers">



                                            <a href="<?= baseAlias('categorySub', ['catId' => $cat->categoryId, 'catSubId' => $subCat->categoryId]); ?>"><i class="js-atomic-catContent-trigger fa fa-folder" aria-hidden="true"></i> <?= $subCat->name ?></a>






                                            <div class="atomic-catContent">
                                                <div class="atomic-fileDrop" data-cat="<?= $cat->name ?>/<?= $subCat->name ?>">

                                                    <?php foreach ( $components as $comp ) {  ?>

                                                        <?php if ( $comp->categoryId == $subCat->categoryId ) {  ?>
                                                            <a href="#" class="atomic-file" data-comp="<?= $comp->name ?>"><i class="fa fa-file-o"></i> <?= $comp->name ?></a>
                                                        <?php }  ?>

                                                    <?php }  ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                             <?php }  ?>
                        <?php }  ?>




                                    <div class="atomic-fileDrop"  data-cat="<?= $cat->name ?>">

                                        <?php foreach ( $components as $comp ) {  ?>

                                            <?php if ( $comp->categoryId == $cat->categoryId ) {  ?>
                                                <a href="#" class="atomic-file" data-comp="<?= $comp->name ?>"><i class="fa fa-file-o"></i> <?= $comp->name ?></a>
                                            <?php }  ?>

                                        <?php }  ?>

                                    </div>
                                </div>
                            </div>




                    <?php }  ?>
                <?php }  ?>







            </div>


        </div>


        <div class="atomic-dirBoxGroup atomic-catDest">

            <div class="atomic-dirBoxGroup__footer">
                <a href="<?= baseAlias('addCategory'); ?>" data-target="panel" class="atomic-btn atomic-btn-3 atomic-add-category ajax-link"><i class="fa fa-plus" aria-hidden="true"></i> Add Category</a>
            </div>
        </div>

    </div>

</div>