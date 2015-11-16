<?php



/*if (!empty($_POST['create'])){


$fileName = test_input($_POST["compName"]);
$catName = test_input($_POST["compDir"]);



createScssFile($catName, $fileName );

writeScssImportFile($catName, $fileName );

createCompFile($catName, $fileName );

createIncludeString($catName, $fileName );

createAjaxIncludeAndCompFile($catName, $fileName);

header("location: http://127.0.0.1/atomic-docs/atomic-core/$catName.php");
}*/


?>

<?php

$errors         = array();  	// array to hold validation errors
$data 			= array(); 		// array to pass back data

// validate the variables ======================================================
	// if any of these variables don't exist, add an error to our $errors array

	if (empty($_POST['name']))
		$errors['name'] = 'Name is required.';

	if (empty($_POST['email']))
		$errors['email'] = 'Email is required.';

	if (empty($_POST['superheroAlias']))
		$errors['superheroAlias'] = 'Superhero alias is required.';

// return a response ===========================================================

	// if there are any errors in our errors array, return a success boolean of false
	if ( ! empty($errors)) {

		// if there are items in our errors array, return those errors
		$data['success'] = false;
		$data['errors']  = $errors;
	} else {

		// if there are no errors process our form, then return a message

		// DO ALL YOUR FORM PROCESSING HERE
		// THIS CAN BE WHATEVER YOU WANT TO DO (LOGIN, SAVE, UPDATE, WHATEVER)

		// show a message of success and provide a true success variable
		$data['success'] = true;
		$data['message'] = 'Success!';
	}

	// return all our data to an AJAX call
	echo json_encode($data);

?>

