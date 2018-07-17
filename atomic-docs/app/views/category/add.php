<?php
$f3 = \Base::instance();
?>
<form class="ajax-form" action="<?= $f3->get('BASE') ?><?= $f3->PATH; ?>">
    <div class="atomic-formGroup">
        <label for="" class="atomic-label">Category Name</label>
        <input type="text" name="atomic-cat-name" class="atomic-input">
    </div>
    <div class="atomic-formGroup">
        <label for="" class="atomic-label">Category Description</label>
        <textarea name="atomic-cat-description" class="atomic-textarea"></textarea>
    </div>


    <div class="atomic-btnGroup">
        <button class="atomic-btn atomic-btn-1">Save</button>
    </div>

    <input type="hidden" name="action" value="atomic-add-category">

</form>

<div class="atomic-hint">
    <h4 class="atomic-hint__title">Title</h4>
    <p>To change the order the components appear on the page you can simply drag and drop them in the sidebar. You can
        also move them to a different category by dragging and dropping them into the desired category's component list.
        All changes will also be reflected in the project's file structure as well as the @import style strings order as
        well!</p>
</div>



