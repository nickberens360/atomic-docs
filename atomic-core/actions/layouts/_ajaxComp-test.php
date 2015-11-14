<div class="ad_fileFormGroup">
	<form class="ad_fileForm " action="/atomic-docs/atomic-core/index.php" method="post">
      <div class="formInputGroup">
        <div class="inputBtnGroup">
          <label class="ad_label">Rename <span class="ad_label__file">test</span> component file</label>
          <button class="ad_btn ad_btn-pos" type="submit" >Rename</button>
          <div class="inputBtnGroup__inputWrap"><input type="text" class="form-control" name="compName" required></div>
        </div>  
      </div>
      <input type="hidden" name="compDir" value="layouts"/>
      <input type="hidden" name="rename" value="rename"/>
      <input type="hidden" name="oldName" value="test"/>
    </form>
	<form class="ad_fileForm " action="/atomic-docs/atomic-core/index.php" method="post">
      <div class="formGroup">
        <div class="formInputGroup">
          <div class="inputBtnGroup">
            <label class="ad_label">Move <span class="ad_label__file">test</span> to...</label>
            <button class="ad_btn ad_btn-pos" type="submit">Move</button>
            <div class="inputBtnGroup__inputWrap">
              <select class="form-control" name="newDir">
                <?php
                    $path = "../../../components";
                    $dir = new DirectoryIterator($path);
                    foreach ($dir as $fileinfo) {
                        if ($fileinfo->isDir() && !$fileinfo->isDot()) {
                            
                            echo '<option value="';
                            echo $fileinfo->getFilename();
                            echo '">';          
                            echo $fileinfo->getFilename();
                            echo '</option>';  
                        }
                    }
                ?>
              </select>
            </div>
          </div>  
        </div>
      </div>
      <input type="hidden" name="compDir" value="layouts"/>
      <input type="hidden" name="fileName" value="test"/>
      <input type="hidden" name="moveFile" value="moveFile"/>
    </form>
    <form class="ad_fileForm " action="/atomic-docs/atomic-core/index.php" method="post">
      <div class="formInputGroup">
        <div class="inputBtnGroup">
          <label class="ad_label">Type <span class="ad_label__file">test</span> to delete the component files</label>
          <button class="ad_btn ad_btn-neg" type="submit" >Delete</button>
          <div class="inputBtnGroup__inputWrap"><input type="text" class="form-control" name="compName" placeholder="Must type component name" required></div>
        </div>  
      </div>
      <input type="hidden" name="compDir" value="layouts"/>
      <input type="hidden" name="delete" value="delete"/>
    </form>
</div>