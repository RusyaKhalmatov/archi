<!DOCTYPE html>
<html>
<head>
   <?php
    include ("database_connection.php");
    if(!isset($_SESSION))
    session_start();
    ensure_login();
   
    ?>
    <title>Admin</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Admin's page dream-satellite"/>
    <link href="css/bootstrap.css" rel="stylesheet">
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>

<body>

    <div class="container-fluid">
        <div class="row">
            <?php require("nav.php"); ?>
        </div>
        <div class="row">
            <div class="col-lg-2" style="border-right: 1px solid black;"><?php require("left.php");?></div>
            <div class="col-lg-10" >
               <?php require("main_body.php"); ?>
            </div>
        </div>

    </div>

    
	
	
</body>
</html>