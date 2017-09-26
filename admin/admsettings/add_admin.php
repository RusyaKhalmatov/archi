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
<html>
<head>
	<title>New admin profile</title>
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

            <?php 

            if($data["superadmin"]!=1)
            {?>
              
              <h2 style="margin-left: 50px;">Only Super Admin can add new admins</h2>  
            <?php } else {?>
            <div class="col-lg-10" style=" padding-top:20px;  padding-left: 20px;">
                <h2>Please fill all the fields below</h2>
               <div class="col-lg-6" style="margin-top: 30px;">
                   <form class="form-horizontal" id="add-form" action="controller/addAdmController.php" method="POST">
    				  
                      <div class="form-group">
                        <label class="control-label col-sm-2" for="name">Name:</label>
                       <div class="col-sm-10">
                        <input type="text" class="form-control" id="name" placeholder="Enter name" name="name">
                      </div>
                     </div> 
                      <div class="form-group">
                        <label class="control-label col-sm-2" for="login">Login:</label>
                       <div class="col-sm-10">
                        <input type="text" class="form-control" id="login" placeholder="Enter login" name="login">
                            </div>
                        </div>
                      <div class="form-group">
                        <label class="control-label col-sm-2" for="password">Password:</label>
                       <div class="col-sm-10">
                        <input type="password" class="form-control" id="password" placeholder="Enter password" name="password">
                        </div>  
                      </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="password2">Repeat password:</label>
                           <div class="col-sm-10">
                            <input type="password" class="form-control" id="password2" placeholder="Repeat password" name="password2">
                             </div>
                        </div>
                    <div class="form-group"> 
                        <div class="col-sm-offset-2 col-sm-10">
                            <div class="checkbox">
                              <label><input type="checkbox" name="supadm" value="">Super admin</label>
                            </div>
                        </div>
                     </div>    
                    <div class="form-group"> 
                        <div class="col-sm-offset-2 col-sm-10">
                          <button type="submit" class="btn btn-default" name="add-admin">Add new admin</button>
                        </div>
                    </div>
    				</form>
                </div>
				<?php 
            };
				if (isset($_SESSION["message"]))
            {
            ?>
            <div id="message" style="color: red; font-size: 18px;
        "><?=$_SESSION["message"]?></div>
            <?php
                unset($_SESSION["message"]);
            }
                ?> 
         </div>
            </div>
        </div>
    </div>
</body>
</html>
