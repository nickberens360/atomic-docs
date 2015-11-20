<!-- <form id="create_form" class="ad_fileForm " action="/atomic-docs/atomic-core/partial-mngr/create-category.php" method="post">
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
<style>
/* example styles for validation form demo */
#register-form {
    background: url("form-fieldset.gif") repeat-x scroll left bottom #F8FDEF;
    border: 1px solid #DFDCDC;
    border-radius: 15px 15px 15px 15px;
    display: inline-block;
    margin-bottom: 30px;
    margin-left: 20px;
    margin-top: 10px;
    padding: 25px 50px 10px;
    width: 350px;
}

#register-form .fieldgroup {
    background: url("form-divider.gif") repeat-x scroll left top transparent;
    display: inline-block;
    padding: 8px 10px;
    width: 340px;
}

#register-form .fieldgroup label {
    float: left;
    padding: 15px 0 0;
    text-align: right;
    width: 110px;
}

#register-form .fieldgroup input, #register-form .fieldgroup textarea, #register-form .fieldgroup select {
    float: right;
    margin: 10px 0;
    height: 25px;
}

#register-form .submit {
    padding: 10px;
    width: 220px;
    height: 40px !important;
}

#register-form .fieldgroup label.error {
    color: #FB3A3A;
    display: inline-block;
    margin: 4px 0 5px 125px;
    padding: 0;
    text-align: left;
    width: 220px;
}
</style>


<!-- HTML form for validation demo -->
<form action="/atomic-docs/atomic-core/partial-mngr/create-category.php" method="post" id="create-form">
    Name: <input type="text" name="inputName"  type="text"/> 
    <input type="submit" value="Submit Comment" /> 
</form>






