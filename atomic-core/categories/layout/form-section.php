<div class="ad_fileFormGroup">
	<form id="form-rename-file"  class="ad_fileForm " action="/atomic-core/partial-mngr/file-rename.php" method="post">
      <div class="formInputGroup">
        <div class="inputBtnGroup">
          <label class="ad_label">Rename <span class="ad_label__file">section</span> component file</label>
          <button class="ad_btn ad_btn-pos" type="submit" >Rename</button>
          <div class="inputBtnGroup__inputWrap"><input type="text" class="form-control" name="renameFileName" required></div>
        </div>  
      </div>
      <input type="hidden" name="compDir" value="layout"/>
      <input type="hidden" name="rename" value="rename"/>
      <input type="hidden" name="oldName" value="section"/>
    </form>
	<form id="form-file-move" class="ad_fileForm " action="/atomic-core/partial-mngr/file-move.php" method="post">
      <div class="formGroup">
        <div class="formInputGroup">
          <div class="inputBtnGroup">
            <label class="ad_label">Move <span class="ad_label__file">section</span> to...</label>
            <button class="ad_btn ad_btn-pos" type="submit">Move</button>
            <div class="inputBtnGroup__inputWrap">
              <select id="newDir" class="form-control" >
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
      <input type="hidden" name="compDir" value="layout"/>
      <input type="hidden" name="fileMoveName" value="section"/>
      <input type="hidden" name="moveFile" value="moveFile"/>
    </form>
    <form id="form-delete-file" class="ad_fileForm " action="/atomic-core/partial-mngr/delete.php" method="post">
      <div class="formInputGroup">
        <div class="inputBtnGroup">
          <label class="ad_label">Type <span class="ad_label__file">section</span> to delete the component files</label>
          <button class="ad_btn ad_btn-neg" type="submit" >Delete</button>
          <div class="inputBtnGroup__inputWrap"><input type="text" class="form-control" name="deleteFileName" placeholder="Must type component name"></div>
        </div>  
      </div>
      <input type="hidden" name="compDir" value="layout"/>
      <input type="hidden" name="delete" value="delete"/>
    </form>
</div>