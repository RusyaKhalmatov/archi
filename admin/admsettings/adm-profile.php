<?php
    include ("../database_connection.php");
    if(!isset($_SESSION))
   session_start();
    ensure_login();
    db_connect();
    $login = $_SESSION['login'];
$query = mysql_query("SELECT * FROM admins WHERE login='$login'");
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
    <script src="js/profileValidate.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>



	<div class="container-fluid">
        <div class="row">
            <?php require("nav.php"); ?>
        </div>
        <div class="row" style="">
            <div class="col-lg-2" style="border-right: 1px solid lightblue;"><?php require("left.php");?></div> 
            
            <div class="col-lg-5">
                <h2>Please fill all the fields below</h2>
               <div class="col-lg-12" style="margin-top: 30px;">
                   <form class="form-horizontal" id="profile-form" action="controller/adminProfileController.php" method="POST">
    				  
                      <div class="form-group">
                        <label class="control-label col-sm-2" for="name">Name:</label>
                       <div class="col-sm-6">
                        <input type="text" class="form-control" id="name_1" value="<?=$data['name']; ?>" name="name1">
                      </div>
                        <div class="col-sm-2" style="padding: 5px;"><span id="name-span" class="er-span"></span></div>
                     </div> 
                      <div class="form-group">
                        <label class="control-label col-sm-2" for="login" >Login:</label>
                       <div class="col-sm-6">
                        <input type="text" class="form-control" id="login_1" value="<?=$data['login'];?>" name="login" readonly>
                            </div>

                        </div>
                        <div class="form-group">
                        <label class="control-label col-sm-2" for="email">Email:</label>
                       <div class="col-sm-6">
                        <input type="text" class="form-control" id="email_1" value="<?=$data['email'];?>" name="email1">
                            </div>
                            <div class="col-sm-2"style="padding: 5px;"><span  id="email-val" class="er-span" ></span></div> 
                        </div>  
                    <div class="form-group"> 
                        <div class="col-sm-offset-2 col-sm-10">
                          <button type="submit" class="btn btn-warning" name="save-adm">Save changes</button>
                        </div>
                    </div>
    				</form>
                </div>
				<?php 
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

         <div class="col-lg-5">
           <h2>Status</h2>
           <h3>Super admin</h3>

           <div class="row" style="padding: 20px;">
           <button class="btn btn-primary" id="ch-pwd">Change password</button>
         </div>
          
          <div class="col-lg-12" id="pwd-panel" style="//border:1px solid black; display: none;">
            <form  class="form-horizontal" action="controller/adminProfileController.php" method="POST">
                <div class="form-group">
                    <label class="control-label col-sm-2" for="password">Old password:</label>
                  <div class="col-sm-6">
                    <input type="password" class="form-control" id="Oldpassword" placeholder="Enter  old password" name="Oldpassword">
                  </div>
                  <div class="col-sm-4">
                    <span id="old-pwd"></span>
                  </div>  
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2" for="password">Password:</label>
                  <div class="col-sm-6">
                    <input type="password" class="form-control" id="password" placeholder="Enter new password" name="password">
                  </div>  
                  <div class="col-sm-4">
                    <span id="new-pwd"></span>
                  </div> 
                </div>
                  <div class="form-group">
                    <label class="control-label col-sm-2" for="password2">Repeat password:</label>
                    <div class="col-sm-6">
                      <input type="password" class="form-control" id="password2" placeholder="Repeat password" name="password2">
                    </div>
                    <div class="col-sm-4">
                    <span id="per-pwd"></span>
                  </div> 
                  </div>  
                    <div class="form-group"> 
                        <div class="col-sm-offset-2 col-sm-10">
                          <button type="submit" class="btn btn-warning" name="save-pwd">Save new password</button>
                        </div>
                    </div>
            </form>

          </div>
         </div>
        </div>

      <div class="row">

        <div class="col-lg-6 col-lg-offset-2" id="pwd-change" style="padding-left: 50px;">
         
        </div>


      </div>



        </div>
    </div>
</body>
</html>

<script>
$(document).ready(function(){
    $("#ch-pwd").click(function(){
        $("#pwd-panel").slideToggle("slow");
    });
});
</script>