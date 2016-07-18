<?php

/*require_once('../inc/lib/Atomic.php');
require_once(Atomic::includePath() . '/vendor/prequel.php');
require_once(Atomic::includePath() . '/inc/lib/fllat.php');*/


global $catdb;

require "fllat.php";

$catdb = new Fllat("category");


$errors = array();      // array to hold validation errors

$data = array();      // array to pass back data


/*$oldPosition = $_POST["oldPosition"];
$newPosition = $_POST["newPosition"];*/
$catName = $_POST["catName"];



/*if ($newCode == ""){
    $errors['name'] = 'No change detected';
}*/


// return a response ===========================================================
// if there are any errors in our errors array, return a success boolean of false
if (!empty($errors)) {
    // if there are items in our errors array, return those errors
    $data['success'] = false;
    $data['errors'] = $errors;
} else {
    // if there are no errors process our form, then return a message


    // DO ALL YOUR FORM PROCESSING HERE


    function navCatOrder($db, $catName)
    {

        $selectDB = $db->select(array());


        $newOrder = 0;

        foreach ($catName as $cn) {

            foreach ($selectDB as $id => $item) {
                if ($item["category"] == $cn) {
                    $update_order = array("order" => $newOrder);
                    $db->update($id, $update_order);
                    $newOrder++;
                    break;
                }

            }

        }





    }

    navCatOrder($catdb, $catName);


    // show a message of success and provide a true success variable
    $data['success'] = true;
    $data['message'] = 'Success!';
}
// return all our data to an AJAX call
echo json_encode($data);








