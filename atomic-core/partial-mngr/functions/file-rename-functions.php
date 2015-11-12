<?php
  function getScssFileContents($catName, $fileName, $oldName)
  {
    
    //$homepage = file_get_contents('../scss/'.$catName.'/_'.$oldName.'.scss');
    //echo $homepage;
    
    //echo $fileName;
    
    rename("..scss/'.$catName.'/_'.$oldName.'","..scss/'.$catName.'/_'.$fileName.'");
    

    
    echo "test";

      
  }
?>