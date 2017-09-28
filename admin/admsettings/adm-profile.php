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
    <!--script src="js/profileValidate.js"></script-->
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
                <form class="form-horizontal" name="profile-form" id="profile-form" method="post" action="controller/adminProfileController.php">
    				  
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
                        <input type="text" class="form-control" id="login_1" value="<?=$data['login'];?>" name="login1" readonly>
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
                          <button type="submit" class="btn btn-warning" id="save-adm" name="save-adm">Save changes</button>
                          <!--input type="submit"-->
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


var error_name = false;
var error_email = false;
$("#email-val").hide();
   $("#ch-pwd").click(function(){
        $("#pwd-panel").slideToggle("slow");
    });

$("#name_1").focusout(function()
    {
        check_name();
    });

$("#email_1").focusout(function()
    {
        check_email();
    });



  function check_name()
{
  var user_name = $("#name_1").val();
        //if(user_name.localeCompare("Name"))
        if (user_name=="")
            {
                $("#name-span").html("Fill the field");
                $("#name-span").show();
                error_name=true;
            } else
            {
                $("#name-span").hide();
                error_name=false;
            }
}

function check_email()
    {

        var reg = /^(?:(?:(http|https|ftp|[a-z]+)\:\/\/))?((?:(?:[a-zA-Z0-9](?‌​:[a-zA-Z0-9\-](?!\.)‌​){0,61}[a-zA-Z0-9]?)‌​\.?)+)\.([a-zA-Z]{2,‌​6})(\/[a-zA-Z0-9\-\=‌​\:\;\@\&\+\%\,\.\!\~‌​\'\(\)\/]+)*\/?(?:\?‌​([^#]+))?(?:\#(.+))?‌​$/;
        var user_email = $("#email_1").val();
        if (reg.test(user_email) == false) 
        {
            //alert('Invalid Email Address');
            $("#email-val").html("Invalid address");
                $("#email-val").show();
                error_email=true;
        }else
        {
            $("#email-val").hide();
                error_email=false;
        }

        

     // var pattern= new RegExp(/^[+a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/i);
     /* var user_email = $("#email_1").val();
        if (pattern.test(user_email))
            {
                $("#email-val").hide();
                error_email=false;
            }
        else
            {
                $("#email-val").html("Invalid address");
                $("#email-val").show();
                error_email=true;
            }*/
        
        if(user_email=="")
        {
          $("#email-val").html("Fill the field");
                $("#email-val").show();
                error_email=true;
        }
        else
              {
                $("#email-val").hide();
                  error_email=false;  
              }    

    }

$("#profile-form").submit(
    function()
        {        
          alert("Submit button is pressd");
            check_name();
            check_email();

            if (error_name==false && error_email==false)
                {
                    return true;
                }
            else
                {
                    return false;
                }
        }
    
    );


});
</script>