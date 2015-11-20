<?php
require '../../config.php';
require 'functions/functions.php';


$errors         = array();      // array to hold validation errors
$data           = array();      // array to pass back data

// validate the variables ======================================================
    // if any of these variables don't exist, add an error to our $errors array
    
    $dirName = test_input($_POST["dirName"]);
    
    
    
    $filename = '../../components/'.$dirName.'';
    
    if (!file_exists($filename) && $dirName != ""){
        $errors['exists'] = 'Category does not exists.';
    }
    
    elseif ($_POST['dirName'] == ""){
        $errors['name'] = 'Input is required.';
    }
        

// return a response ===========================================================

    // if there are any errors in our errors array, return a success boolean of false
    if ( ! empty($errors)) {

        // if there are items in our errors array, return those errors
        $data['success'] = false;
        $data['errors']  = $errors;
    } else {

        
        
        // DO ALL YOUR FORM PROCESSING HERE
  

   
       deleteCompDir($dirName );
        
        
        
        
        

        // show a message of success and provide a true success variable
        $data['success'] = true;
        $data['message'] = 'Success!';
    }

    // return all our data to an AJAX call
    echo json_encode($data);
    

?>



<?php


/*if (!empty($_POST['deleteDir'])){



$inputName = test_input($_POST["inputName"]);


deleteSidebarIncludeString($inputName );

deleteCatPageFile($inputName );

deleteCatSidebarIncludeFile($inputName );

deleteCompDir($inputName );



deleteCatScssImportString($inputName );


deleteScssDir($inputName );


deleteAjaxDir($inputName);



header("location:index.php");

}*/



?>

