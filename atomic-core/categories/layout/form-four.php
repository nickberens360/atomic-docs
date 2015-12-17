<div class="ad_fileFormGroup">
<label class="ad_label js-showHide-trigger"><span class="ad_label__file">Rename</span> four component file</label>
<div class="showHide">
	<form id="form-rename-file"  class="ad_fileForm " action="/atomic-core/partial-mngr/file-rename.php" method="post">
      <div class="formInputGroup">
        <div class="inputBtnGroup">
          
          <button class="ad_btn ad_btn-pos" type="submit" >Rename</button>
          <div class="inputBtnGroup__inputWrap"><input type="text" class="form-control" name="renameFileName" required></div>
        </div>     
      </div>
      <input type="hidden" name="compDir" value="layout"/>
      <input type="hidden" name="rename" value="rename"/>
      <input type="hidden" name="oldName" value="four"/>
    </form>
</div>
<label class="ad_label js-showHide-trigger">Change the description for <span class="ad_label__file">four</span></label>
<div class="showHide">
   <form id="form-rename-notes"  class="ad_fileForm " action="/atomic-core/partial-mngr/notes-rename.php" method="post">
        <textarea class="form-control" name="compNotesNew"></textarea>        
        <button class="ad_btn ad_btn-pos" type="submit" >Rename</button>
      <input type="hidden" name="compDir" value="layout"/>
      <input type="hidden" name="fileName" value="four"/>
      <input type="hidden" name="compNotes" value=""/>
    </form>
</div>
<label class="ad_label js-showHide-trigger">Move <span class="ad_label__file">four</span> to...</label>
<div class="showHide">
	<form id="form-file-move" class="ad_fileForm " action="/atomic-core/partial-mngr/file-move.php" method="post">
      <div class="formGroup">
        <div class="formInputGroup">
          <div class="inputBtnGroup">
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
      <input type="hidden" name="fileMoveName" value="four"/>
      <input type="hidden" name="moveFile" value="moveFile"/>
      <input type="hidden" name="compNotes" value=""/>
    </form>
</div>
<label class="ad_label js-showHide-trigger">Type <span class="ad_label__file">four</span> to delete the component files</label>
<div class="showHide">
    <form id="form-delete-file" class="ad_fileForm " action="/atomic-core/partial-mngr/delete.php" method="post">
      <div class="formInputGroup">
        <div class="inputBtnGroup">
          <button class="ad_btn ad_btn-neg" type="submit" >Delete</button>
          <div class="inputBtnGroup__inputWrap"><input type="text" class="form-control" name="deleteFileName" placeholder="Must type component name"></div>
        </div>  
      </div>
      <input type="hidden" name="compDir" value="layout"/>
      <input type="hidden" name="delete" value="delete"/>
      <input type="hidden" name="compNotes" value=""/>
    </form>
</div>
</div>