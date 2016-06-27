<?php


if ($_SERVER["REQUEST_METHOD"] == "POST") {

$price = $_POST["price"];

require "fllat.php";
$pie = new Fllat("pie");

$nom = array("name" => "bacon", "price" => $price );

$pie -> update(2, $nom);



	//$bPrice = $pie -> get("price", "name", "bacon");

}
	

?>
