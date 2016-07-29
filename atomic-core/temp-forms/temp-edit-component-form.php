<div class="aa_fileFormGroup">
    <form id="edit-comp-file" class="aa_fileForm"  method="post">
        <div class="inputGroup">
            <label class="aa_label">Change name</label>
            <input type="text" class="form-control" name="compName">
        </div>
        <label class="aa_label">Change description.</label>
        <textarea class="form-control" name="compNotes"></textarea>
        <label class="aa_label">Change contextual background color.</label>
        <div class="bgColorWrap">
            <input class="bgColor" type="text" name="bgColor" value=""/>
        </div>
        <button class="aa_btn aa_btn-pos" type="submit" name="update_button" value="update">Update</button>
    </form>
</div>

<form id="delete-comp-file">
    <button class="delete-txt" type="submit" name="delete_button" value="delete"><i class="fa fa-times"></i> Delete Component</button>
</form>