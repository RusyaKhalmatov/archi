<!DOCTYPE html>
<html>
<?php 
include ("database_connection.php");?>
<head>
    <title>Admin</title>
     <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Contact page dreamsatellite"/>
 
   <link href="css/headerStyle.css" rel="stylesheet" type="text/css" />
     <link href="css/main_bodyStyle.css" rel="stylesheet" type="text/css" />
     <link href="css/left_sidebar.css" rel="stylesheet" type="text/css" />
     
</head>
<body>

   
   
              <?php require ("header.php");?>
              <?php require ("left_sidebar.php");?>
          
            <div id="first">
                <div id="mainBut">
                    <h3 style="color:black;">Here you can add new admin to your website</h3>
                    <div class="mod1" style="border:1px solid black;">
                        
                        <h2>Add new admin:</h2>
                    </div>
                    
                    <div class="pass" style="border:1px solid black;">
                        <h3 style="color:black">Fill the form</h3>
                        <form action="new_adm_proc.php" method="post">
                            <table>
                                <tr>
                                    <th>Name </th>
                                    <th><input type="text" name="name"></th>
                                </tr>
                                
                                <tr>
                                    <th>Login: </th>
                                    <th><input type="text" name="login"></th>
                                </tr>
                                <tr>
                                    <th>Password:</th>
                                    <th><input type="password" name="pass"></th>
                                </tr>
                                <tr>
                                    <th>Repeat password:</th>
                                    <th><input type="password" name="pass2"></th>
                                </tr>
                            </table>
                            
                            <input type="submit">
                        </form>
                        <?php 
                        if(isset($_SESSION["message"]))
            {
            ?>
            <div id="message"><?=$_SESSION["message"]?></div>
            <?php
                unset($_SESSION["message"]);
            }
                ?>
                    </div>
                    
                </div>
            </div>
             

</body>
</html>
