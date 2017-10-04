<?php
    include ("../database_connection.php");
    if(!isset($_SESSION))
   session_start();
    ensure_login();
    db_connect();
    $login = $_SESSION['login'];
	$query = mysql_query("SELECT superadmin FROM admins WHERE login='$login'");
    $data=mysql_fetch_array($query);


?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>List of admins</title>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="../css/bootstrap.css" rel="stylesheet">
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
	
	<div class="container-fluid">
        <div class="row">
            <?php require("nav.php"); ?>
        </div>
        <div class="row" style="">
            <div class="col-lg-2" style="border-right: 1px solid lightblue;"><?php require("left.php");?></div>
        </div>








    </div>
</body>
</html>