<div class="aa_fileFormGroup">
    <form id="form-create-file" class="aa_fileForm"  method="post">
        <div class="inputGroup">
            <label class="aa_label">What's your component's name?</label>
            <input type="text" class="form-control" name="compName">
        </div>
        <label class="aa_label">Component description.</label>
        <textarea class="form-control" name="compNotes"></textarea>
        <label class="aa_label">Contextual background color.</label>
        <div class="bgColorWrap">
            <input class="bgColor" type="text" name="bgColor" value=""/>
        </div>
        <button class="aa_btn aa_btn-pos" type="submit">Add</button>
    </form>
</div>

<div class="featureHints">
    <p><strong>Hint</strong></p>
    <p>To change the order the components appear on the page you can simply drag and drop them in the sidebar. You can also move them to a different category by dragging and dropping them into the desired category's component list. All changes will also be reflected in the project's file structure as well as the @import style strings order as well!</p>
</div>