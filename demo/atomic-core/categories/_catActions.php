<form id="form-create-category" class="ad_fileForm " action="/atomic-core/partial-mngr/create-category.php" method="post">
  <div class="formInputGroup">
	  <label class="ad_label">Add a category</label>
	  <div class="inputBtnGroup">
      <button class="ad_btn ad_btn-pos" type="submit">Add</button>
        <div class="inputBtnGroup__inputWrap"><input type="text" class="form-control" name="dirName"></div>
	  </div>
  </div>
  <input type="hidden" name="createDir" value="createDir"/>
</form>
<form id="form-delete-category" class="ad_fileForm " action="/atomic-core/delete-category.php" method="post" >
  <div class="formInputGroup">
    <div class="inputBtnGroup">
      <label class="ad_label">Delete a category</label>
      <button class="ad_btn ad_btn-neg" type="submit" >Delete</button>
      <div class="inputBtnGroup__inputWrap"><input type="text" class="form-control" name="inputNameDelete" placeholder="Must type category name"></div>
    </div>
  </div>
  <input type="hidden" name="deleteDir" value="deleteDir"/>
</form>


