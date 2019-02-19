<?php
$f3 = \Base::instance();
?>




<form class="ajax-form add-comp-form" method="post" action="<?= $f3->get('BASE') ?><?= $f3->PATH; ?>">
    <input type="hidden" name="action" value="componentNew">


    <div class="atomic-compBar atomic-compWrap-inliner">
        <div class="atomic-compBarLeft">
            <input class="atomic-comp-edit-title" type="text" name="atomic-comp-name" value="" placeholder="Component Name">


            <div class="atomic-inline-block">


                    <input class="atomic-colorPicker" type="text" name="atomic-bgColor" value="">

                    <label class="atomic-compBar__label"><input class="atomic-js-input" type="checkbox"  name="atomic-comp-js"> Add JS File</label>

                    <button type="submit" class="btnSimple">save</button>
                    <button type="reset" class="btnSimple-alt btnSimple js-atomic-inline-cancel">cancel</button>


            </div>


        </div>

    </div>


    <div class="atomic-add-form__plc"></div>



</form>




