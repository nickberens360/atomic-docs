<?php



$errors         = array();      // array to hold validation errors
$data           = array();      // array to pass back data



$compName = $_POST["compName"];
$catName = $_POST["catName"];
$newCode = $_POST["newCode"];



echo $compName;
echo $catName;
echo $newCode;





if ($_POST['newCode'] == ""){
    $errors['name'] = 'Name is required.';
}






// return a response ===========================================================
// if there are any errors in our errors array, return a success boolean of false
if ( ! empty($errors)) {
    // if there are items in our errors array, return those errors
    $data['success'] = false;
    $data['errors']  = $errors;
} else {
    // if there are no errors process our form, then return a message


    // DO ALL YOUR FORM PROCESSING HERE


    /**/

    function editorCodeUpdate($compName,$catName, $newCode){
        $file = '../../src/components/'.$catName.'/'.$compName.'.php';
        file_put_contents($file, $newCode);
    }

    editorCodeUpdate($compName,$catName, $newCode);











    // show a message of success and provide a true success variable
    $data['success'] = true;
    $data['message'] = 'Success!';
}
// return all our data to an AJAX call
echo json_encode($data);