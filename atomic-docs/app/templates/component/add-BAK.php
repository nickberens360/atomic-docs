<?php
$f3 = \Base::instance();
/** @var CategoryModel $category */
$category = $f3->get('category');

$catId = $category->categoryId;

echo 'test'.$catId;

?>

<form class="ajax-form" action="/component/add/<?= $catId ?>">
    <div class="atomic-formGroup">
        <label for="" class="atomic-label">Component Name</label>
        <input type="text" name="atomic-comp-name" class="atomic-input">
    </div>



    <div class="atomic-formGroup">
        <label for="" class="atomic-label">Component Description</label>
        <textarea name="atomic-comp-description" id="" class="atomic-textarea"></textarea>
    </div>

    <div class="atomic-formGroup">
        <label for="" class="atomic-label">Contextual Bg Color</label>
        <input class="atomic-colorPicker" type="text" name="atomic-bgColor">
    </div>





    <div class="atomic-formGroup">
        <label><input type="checkbox" name="atomic-comp-js"> Add javascript file</label>
    </div>




    <div class="atomic-btnGroup">
        <button class="atomic-btn atomic-btn-1">Save</button>
        <button class="atomic-btn atomic-btn-simple js-atomic-cancel-add-comp" type="reset">Cancel</button>
    </div>



    <input type="hidden" name="action" value="atomic-add-file">
    <!--<input id="atomic-file-cat" type="hidden" name="atomic-file-cat" value="">
    <input id="atomic-file-catID" type="hidden" name="atomic-file-catID" value="">-->

</form>



<!--<form class="ajax-form atomic-add-comp-form" action="/component/add">
    <div class="atomic-formGroup">
        <label for="" class="atomic-label">Component Name</label>
        <input type="text" name="atomic-comp-name" class="atomic-input">
    </div>
    <div class="atomic-formGroup">
        <label for="" class="atomic-label">Component Description</label>
        <textarea name="atomic-comp-description" id="" class="atomic-textarea"></textarea>
    </div>


    <div class="atomic-btnGroup">
        <button class="atomic-btn atomic-btn-1">Save</button>
        <button class="atomic-btn atomic-btn-simple js-atomic-cancel-add-comp" type="reset">Cancel</button>
    </div>

    <input type="hidden" name="action" value="atomic-add-file">
    <input id="atomic-file-cat" type="hidden" name="atomic-file-cat" value="">
    <input id="atomic-file-catID" type="hidden" name="atomic-file-catID" value="">

</form>-->

<!--<div class="atomic-hint">
    <h4 class="atomic-hint__title">Title</h4>
    <p>To change the order the components appear on the page you can simply drag and drop them in the sidebar. You can
        also move them to a different category by dragging and dropping them into the desired category's component list.
        All changes will also be reflected in the project's file structure as well as the @import style strings order as
        well!</p>
</div>-->
