<?php
/**
 * Created by PhpStorm.
 * User: michael
 * Date: 6/23/16
 * Time: 7:33 AM
 */
global $Atomic;
global $Component;

$createOrUpdate = 'create';

if( $_GET['form'] === 'component-edit'){
	$createOrUpdate = 'update';
}
?>
<div class="aa_fileFormGroup">
	<form id="form-<?= $createOrUpdate; ?>-file" class="aa_fileForm " action="" method="get">

		<div class="inputGroup">
			<label class="aa_label">What's your component's name?</label>
			<input type="text" class="form-control" name="fileCreateName" value="">
		</div>
		<label class="aa_label">Component description.</label>
		<textarea class="form-control" name="compNotes"></textarea>
		<label class="aa_label">Contextual background color.</label>
		<div class="bgColorWrap">
			<input class="bgColor" type="text" name="bgColor" value="" />
		</div>
		<button class="aa_btn aa_btn-pos" type="submit" >Add</button>
		<input type="hidden" name="compDir" value="<?= $_GET['category']; ?>"/>
		<input type="hidden" name="action" value="<?= $_GET['form']; ?>"/>
	</form>
</div>