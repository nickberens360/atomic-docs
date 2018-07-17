<?php

$f3 = \Base::instance();

$cat = $f3->get('category');

$subCat = $f3->get('isSubCat');



?>

<div class="atomic-pageBarWrap">
    <div class="atomic-pageBar">
        <div class="atomic-pageBar__item atomic-pageBar__left">

            <h1 class="atomic-catTitle"><?= $dirPath ?>



                <?php if ($subCat == false) { ?>
                    <a href="<?= baseAlias('editCategory', ['catId' => $cat->categoryId]); ?>" class="material-icons ajax-link" data-target="panel">settings</a>
                <?php } else { ?>
                    <a href="<?= baseAlias('editSubCategory', ['parentId'=> $cat->parentCatId,'catId' => $cat->categoryId]); ?>" class="material-icons ajax-link" data-target="panel">settings</a>
                <?php } ?>





                <?php if ($subCat == false) { ?>
                    <a href="<?= baseAlias('addSubCategory', ['catId' => $cat->categoryId]); ?>" class="material-icons ajax-link" data-target="panel">create_new_folder</a>
                <?php } ?>

                    <a href="<?= baseAlias('addComponent', ['catId' => $cat->categoryId]); ?>" class="material-icons ajax-link" data-target="panel">note_add</a>

            </h1>

        </div>
        <div class="atomic-pageBar__item atomic-pageBar__right">
            <ul class="atomic-dashControls">
                <li>
                    <span class="atomic-dimLabel">W:</span> <input class="atomic-compDim-val js-atomic-compWidth-val" type="text" value="100%">
                    <span class="atomic-dimDivider">x</span>
                    <span class="atomic-dimLabel">H:</span> <input class="atomic-compDim-val js-atomic-compHeight-val" type="text" value="auto" >
                </li>
                <li><a href="#" class="js-atomic-dashControl" data-atomicwidth="100%"><i class="fa fa-desktop" aria-hidden="true"></i></a></li>
                <li><a href="#" class="js-atomic-dashControl" data-atomicwidth="768px"><i class="fa fa-tablet" aria-hidden="true"></i></a></li>
                <li><a href="#" class="js-atomic-dashControl" data-atomicwidth="375px"><i class="fa fa-mobile" aria-hidden="true"></i></a></li>
            </ul>
        </div>

    </div>


</div>