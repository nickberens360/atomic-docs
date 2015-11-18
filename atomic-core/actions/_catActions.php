<!-- <form class="ad_fileForm " action="/atomic-docs/atomic-core/partial-mngr/create-category.php" method="post">
  <div class="formInputGroup">
	  <label class="ad_label">Add a category</label>
	  <div class="inputBtnGroup">
      <button class="ad_btn ad_btn-pos" type="submit" >Add</button>
        <div class="inputBtnGroup__inputWrap"><input type="text" class="form-control" name="inputName"></div>
	  </div>
  </div>
  <input type="hidden" name="createDir" value="createDir"/>
</form>

<form id="formDeleteCat" class="ad_fileForm " action="/atomic-docs/atomic-core/index.php" method="post" onsubmit="return confirm('Deleting a category deletes all files within it as well. Are you sure about this?');">
  <div class="formInputGroup">
    <div class="inputBtnGroup">
      <label class="ad_label">Delete a category</label>
      <button class="ad_btn ad_btn-neg" type="submit" >Delete</button>
      <div class="inputBtnGroup__inputWrap"><input type="text" class="form-control" name="inputName" placeholder="Must type category name" required></div>
    </div>
  </div>
  <input type="hidden" name="deleteDir" value="deleteDir"/>
</form> -->




<form  action="/atomic-docs/atomic-core/partial-mngr/create-category.php" method="post">
  <label>First Name</label>
  <input class="test" name="first_name1" type="text"  />
  <input class="form1" type="submit" value="Submit" />
</form>

<br/><br/><br/><br/><br/>

<form id="form2"  action="/atomic-docs/atomic-core/partial-mngr/delete-category.php" method="post">
  <label>First Name</label>
  <input class="test2" name="first_name2" type="text"  />
  <input class="form2" type="submit" value="Submit" />
</form>

