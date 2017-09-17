<?php

$name = trim($_POST["name"]);
$surname = trim($_POST["surname"]);
$email=$_POST["email"];

/*echo "name : ".$name;
echo "<br>";
echo "surname: ".$surname; 
*/

$recipient="rusya.khalmatov@gmail.com";
$message = "Name: $name \nSurname: $surname \nEmail: $email";
$pageTitle = "New request from the site";

mail($recipient,$pageTitle,$message,"Content-type: text/plain, charset=\"utf-8\"\n From: $recipient");

?>
