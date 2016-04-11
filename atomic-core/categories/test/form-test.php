<div class="ad_fileFormGroup">
    <form id="form-create-file" class="ad_fileForm " action="/atomic-core/test.php" method="post">
     
      <div class="inputGroup">
        <label class="ad_label">What's your component's name?</label>
        <input type="text" class="form-control" name="fileCreateName">
      </div>
        <label class="ad_label">Component description.</label>
        <textarea class="form-control" name="compNotes"></textarea>
        <label class="ad_label">Contextual background color.</label>
        <div class="bgColorWrap">
          <input class="bgColor" type="text" name="bgColor" value="" />
        </div>
        <button class="ad_btn ad_btn-pos" type="submit" >Add</button>
      <input type="hidden" name="compDir" value="test"/>
      <input type="hidden" name="create" value="create"/>
    </form>
</div>