<form class="ajax-form" action="<?= \Base::instance()->alias('addJsComponent', ['component' => $comp->componentId]); ?>">
    <label><input class="atomic-js-input" type="checkbox" name="atomic-add-js"> Add javascript file</label>
</form>