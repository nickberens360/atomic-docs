<h1>Cat Actions</h1>

<form class="ad_fileForm " action="/atomic-docs/atomic-core/index.php" method="post">
  <div class="formInputGroup">
	  <label class="ad_label">Add a category</label>
	  <div class="inputBtnGroup">
	    <div class="fcWrap"><input type="text" class="form-control" name="inputName" required></div>
        <button class="ad_btn" type="submit">Submit</button>
	  </div>
  </div>
  <input type="hidden" name="createDir" value="createDir"/>
</form>

<form class="ad_fileForm " action="/atomic-docs/atomic-core/index.php" method="post" onsubmit="return confirm('Deleting a category deletes all files within it as well. Are you sure about this?');">
  <div class="formInputGroup">
	  <label class="ad_label">Delete a category</label>
	  <input type="text" class="form-control" name="inputName" placeholder="Must type category name" required>
  </div>
  <input type="hidden" name="deleteDir" value="deleteDir"/>
</form>