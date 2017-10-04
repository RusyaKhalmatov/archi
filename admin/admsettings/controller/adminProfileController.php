<?php 
	include("../../database_connection.php");
	db_connect();

	if(!isset($_SESSION))
  		 session_start();
  
	    $login = $_SESSION['login'];
    	$name= trim($_POST['name1']);
    	$login = trim($_POST['login1']);
    	$email = trim($_POST['email1']);
        $sql = mysql_query("UPDATE admins SET name = '$name', email='$email' WHERE login ='$login'");
        




 ?>