<?php

require_once('../inc/lib/Atomic.php');
require_once(Atomic::includePath() . '/vendor/prequel.php');
require_once(Atomic::includePath() . '/inc/lib/FllatCategory/FllatCategory.php');

$errors         = array();      // array to hold validation errors

$data           = array();      // array to pass back data





$oldPosition = $_POST["oldPosition"];
$newPosition = $_POST["newPosition"];
$catName = $_POST["catName"];







/*if ($newCode == ""){
    $errors['name'] = 'No change detected';
}*/


// return a response ===========================================================
// if there are any errors in our errors array, return a success boolean of false
if ( ! empty($errors)) {
    // if there are items in our errors array, return those errors
    $data['success'] = false;
    $data['errors']  = $errors;
} else {
    // if there are no errors process our form, then return a message


    // DO ALL YOUR FORM PROCESSING HERE



    function navCatOrder($oldPosition,$newPosition, $catName){





        //echo 'yo';

    }

    navCatOrder($oldPosition,$newPosition, $catName);





    // show a message of success and provide a true success variable
    $data['success'] = true;
    $data['message'] = 'Success!';
}
// return all our data to an AJAX call
echo json_encode($data);








