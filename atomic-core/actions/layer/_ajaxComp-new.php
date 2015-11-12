<div class="ad_fileFormGroup">
    <form class="ad_fileForm " action="/atomic-docs/atomic-core/index.php" method="post">
      <div class="formInputGroup">
        <div class="inputBtnGroup">
          <label class="ad_label">Type <span class="ad_label__file">new</span> to delete the component files</label>
          <button class="ad_btn ad_btn-neg" type="submit" >Delete</button>
          <div class="inputBtnGroup__inputWrap"><input type="text" class="form-control" name="compName" required></div>
        </div>  
      </div>
      <input type="hidden" name="compDir" value="layer"/>
      <input type="hidden" name="delete" value="delete"/>
    </form>
    
    <form class="ad_fileForm " action="/atomic-docs/atomic-core/index.php" method="post">
      <div class="formInputGroup">
        <div class="inputBtnGroup">
          <label class="ad_label">Rename <span class="ad_label__file">new</span> component file</label>
          <button class="ad_btn ad_btn-pos" type="submit" >Rename</button>
          <div class="inputBtnGroup__inputWrap"><input type="text" class="form-control" name="compName" required></div>
        </div>  
      </div>
      <input type="hidden" name="compDir" value="layer"/>
      <input type="hidden" name="rename" value="rename"/>
      <input type="hidden" name="oldName" value="new"/>
    </form>
    
</div>