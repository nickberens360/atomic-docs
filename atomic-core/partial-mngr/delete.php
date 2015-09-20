<?php




if (!empty($_POST['delete'])){

//Set user input variable
$fileName = $_POST["compName"];
$catName = $_POST["compDir"];



deleteScssImportString($catName, $fileName );
deleteScssFile($catName, $fileName );

deleteCompIncludetString($catName, $fileName );
deleteCompFile($catName, $fileName );



//header("location:../$catName.php");

}

?>