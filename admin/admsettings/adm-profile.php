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

<style>
  .er-span
  {color:red;}

</style>
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
  <script src="js/adm-settings.js"></script>
  <script src="js/save_pwd.js"></script>
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
                <form class="form-horizontal" name="profile-form" id="profile-form">
    			
                      <div class="form-group has-feedback nameBlock">
                        <label class="control-label col-sm-2" for="name">Name:</label>
                       <div class="col-sm-6 for-span-name">
                        <input type="text" class="form-control" id="name_1" value="<?=$data['name']; ?>" name="name1" aria-describedby="inputSuccess2Status">
                      </div>
                        <div class="col-sm-2" style="padding: 5px;"><span id="name-error" class="er-span"></span></div>
                     </div> 
                      <div class="form-group">
                        <label class="control-label col-sm-2" for="login" >Login:</label>
                       <div class="col-sm-6">
                        <input type="text" class="form-control" id="login_1" value="<?=$data['login'];?>" name="login1" readonly>
                            </div>

                        </div>
                        <div class="form-group has-feedback emailBlock">
                        <label class="control-label col-sm-2" for="email">Email:</label>
                       <div class="col-sm-6 for-span-email">
                        <input type="text" class="form-control" id="email_1" value="<?=$data['email'];?>" name="email1" aria-describedby="inputSuccess2Status">
                            </div>
                            <div class="col-sm-2"style="padding: 5px;"><span  id="email-error" class="er-span" ></span></div> 
                        </div>  
                    <div class="form-group"> 
                        <div class="col-sm-offset-2 col-sm-10">
                          <button type="submit" class="btn btn-warning" id="save-adm" name="save-adm">Save changes</button>
                        
                        </div>
                    </div>
    				</form>
                </div>
				
         </div>

         <div class="col-lg-5">
           <h2>Status</h2>
           <h3>Super admin</h3>

           <div class="row" style="padding: 20px;">
           <button class="btn btn-primary" id="ch-pwd">Change password</button>
         </div>
          
          <div class="col-lg-12" id="pwd-panel" style="//border:1px solid black; display: none;">
            <form id="psswChange" name="psswChange" class="form-horizontal" action="controller/adminPwdController.php">


                <div class="form-group has-feedback OldPwdBlock">
                    <label class="control-label col-sm-2" for="Oldpassword">Old password:</label>
                  <div class="col-sm-6 for-span-oldPwd">
                    <input type="password" class="form-control" id="Oldpassword" name="Oldpassword" placeholder="Enter current password" aria-describedby="inputSuccess2Status">
                  </div>
                  <div class="col-sm-4">
                    <span id="Oldpwd-error"></span>
                  </div>  
                </div>


                <div class="form-group has-feedback NewPwdBlock">
                    <label class="control-label col-sm-2" for="password">Password:</label>
                  <div class="col-sm-6 for-span-newPwd">
                    <input type="password" class="form-control" id="password" placeholder="Enter new password" name="password">
                  </div>  
                  <div class="col-sm-4">
                    <span id="new-pwd-error"></span>
                  </div> 
                </div>



                  <div class="form-group has-feedback RepPwdBlock">
                    <label class="control-label col-sm-2" for="password2">Repeat password:</label>
                    <div class="col-sm-6 for-span-repPwd">
                      <input type="password" class="form-control" id="password2" placeholder="Repeat password" name="password2">
                    </div>
                    <div class="col-sm-4">
                    <span id="rep-pwd-error"></span>
                  </div> 
                  </div>  
                    <div class="form-group"> 
                        <div class="col-sm-offset-2 col-sm-10">
  <?php 
        if (isset($_SESSION["message"]))
            {
            ?>
            <div id="message" style="color: red; font-size: 18px; margin-bottom: 20px;
        "><?=$_SESSION["message"]?></div>
            <?php
                unset($_SESSION["message"]);
            }
                ?> 
                          <button type="submit" class="btn btn-warning" name="save-pwd">Save new password</button>
                        </div>
                    </div>
            </form>

          </div>
         </div>
        </div>

     



        </div>
    </div>
    
</body>
</html>
