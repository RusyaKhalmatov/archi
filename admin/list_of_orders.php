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
    <meta name="description" content="Contact page dreamsatellite"/>
     <link href="css/table.css" rel="stylesheet">
    <link href="css/headerStyle.css" rel="stylesheet" type="text/css" />
     <link href="css/main_bodyStyle.css" rel="stylesheet" type="text/css" />
     <link href="css/left_sidebar.css" rel="stylesheet" type="text/css" />
     
</head>
<body>
	<?php require ("header.php");?>
	<?php require ("left_sidebar.php")?>
	<div id="first" style="height: 900px;">
            <h1 id="page_name">See the list of orders</h1>
            <div id="mainBut" style="border:1px solid black; height: 700px;">
            <h2 id="welcome" style="border:1px solid black;">Main </h2>

             <div class="cont1" style="border: 1px solid black; height:300px; margin-left:50px; overflow:scroll; padding-left:10px; padding-top:30px; text-align:center; margin-right:30px;">
               <form action="" method="post">
                <?php get_order_trip(); ?>
                <input type="submit" name="submit2" value="Delete" id="del">
          </form> 
             </div>

            <div class="cont2" style="border: 1px solid black; height:200px; overflow:scroll; margin-top: 50px; margin-right:30px; margin-left:50px;">
                <form name="userOperate" action="" method="post">
                <?php get_order_dream(); ?>
                <input type="submit" name="submit1" value="Delete" id="del">
          </form> 
                
            </div>
         </div>
 </div>
	
	<?php 
    if(isset($_POST["submit1"]))
    {
        $choose=$_POST["check"];

        while( list($key,$val)=@each($choose))
        {
            mysql_query("delete from events where tour_id=$val");
        }

        ?><script type="text/javascript">
      window.location.href=window.location.href;             
    </script>       
    <?php
    }else
        
        if(isset($_POST["modify"]))
        {
          
            header("Location: modifyAdmin.php");
        }
    
        
    if(isset($_POST["submit2"]))
    {
        $choose=$_POST["check"];

        while( list($key,$val)=@each($choose))
        {
            mysql_query("delete from events where dream_id=$val");
        }

        ?><script type="text/javascript">
      window.location.href=window.location.href;             
    </script>       
    <?php
    }else
        
        if(isset($_POST["modify"]))
        {
        
            header("Location: modifyAdmin.php");
        }
    
    ?>       
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
   

    
        <script type="text/javascript">
</body>
</html>