<?php
$f3 = \Base::instance();
?>
<form class="ajax-form" method="post" action="<?= $f3->get('BASE') ?><?= $f3->PATH; ?>">
    <input type="hidden" name="action" value="componentNew">
    <div class="atomic-formGroup">
        <label for="" class="atomic-label">Component Name</label>
        <input type="text" name="atomic-comp-name" class="atomic-input">
    </div>

    <!--<div class="atomic-formGroup">
        <label for="" class="atomic-label">Component Description</label>
        <textarea class="summernote atomic-textarea" name="atomic-comp-description"></textarea>
    </div>-->

    <!--<div class="atomic-formGroup">
        <label for="" class="atomic-label">Contextual Bg Color</label>
        <input class="atomic-colorPicker" type="text" name="atomic-bgColor">
    </div>





    <div class="atomic-formGroup">
        <label><input type="checkbox" name="atomic-comp-js"> Add javascript file</label>
    </div>-->




    <div class="atomic-btnGroup">

        <!--<div class="atomic-btnRow grid-row">
            <div class="nb-6">
                <button class="atomic-btn atomic-btn-1">Save</button>
            </div>
            <div class="nb-6">
                <button class="atomic-btn atomic-btn-4">Delete</button>
            </div>
        </div>-->

        <button class="atomic-btn atomic-btn-1">Save</button>


        <button class="atomic-btn atomic-btn-simple js-atomic-cancel-add-comp" type="reset">Move to trash</button>
    </div>


</form>




