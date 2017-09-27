<?php 
	include("../../database_connection.php");
	db_connect();

    	$name= trim($_POST['name1']);
    	$login = trim($_POST['login1']);
    	$email = trim($_POST['email1']);
        $sql = mysql_query("UPDATE admins SET name = '$name', email='$email' WHERE login ='$login'");
        




 ?>