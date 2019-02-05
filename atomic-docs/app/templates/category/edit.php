<?php
$f3 = \Base::instance();
/** @var CategoryModel $category */
$category = $f3->get('category');
?>
<form class="ajax-form" method="post" action="<?= $f3->get('BASE') ?><?= $f3->PATH; ?>">

    <div class="atomic-formGroup">
        <label for="" class="atomic-label">Category Names</label>
        <input type="text" name="atomic-cat-name" class="atomic-input" value="<?= $category->name; ?>">
    </div>

    <div class="atomic-formGroup">
        <label for="" class="atomic-label">Edit Description</label>
        <textarea name="atomic-cat-description" id="" class="atomic-textarea"><?= $category->description; ?></textarea>
    </div>


    <div class="atomic-btnGroup">
        <button class="atomic-btn atomic-btn-1">Update</button>
    </div>

    <input type="hidden" name="action" value="atomic-edit-category">

</form>

<!--<div class="atomic-hint">
    <h4 class="atomic-hint__title">Title</h4>
    <p>To change the order the components appear on the page you can simply drag and drop them in the sidebar. You can
        also move them to a different category by dragging and dropping them into the desired category's component list.
        All changes will also be reflected in the project's file structure as well as the @import style strings order as
        well!</p>
</div>-->


