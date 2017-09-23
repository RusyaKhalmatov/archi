<?php
/**
 * Created by PhpStorm.
 * User: Рустам
 * Date: 19.09.2017
 * Time: 18:57
 */
include("../scripts/acont.php");
if(isset($_POST['password']))
{
    $pass = $_POST["password"];

   // echo $pass;
    echo encr($pass);
    echo decr(encr($pass));
}

?>

<!DOCTYPE html>
<html>
    <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Log in</title>
    <link href="css/bootstrap.css" rel="stylesheet">
    </head>
    <body>
        
        <?php  if(!isset($_SESSION))
        {
            session_start();    
        }
        ?>
            <div class="container-fluid">
                <div class="container">
                <div class="row" style=" width: 50%; margin: auto;  margin-top: 15%;">
                    <h1 style="margin-bottom: 5%;">Welcome back, my dear admin!</h1>
                </div>
                    <div class="row" style="width:40%; margin: auto; ">
                        
                        <form class="form-horizontal" action=""  method="post">
                            <div class="form-group">
                              <label class="control-label col-sm-2" for="pwd">Password:</label>
                              <div class="col-sm-10">
                                <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="password">
                              </div>
                            </div>
                            <div class="form-group">        
                              <div class="col-sm-offset-2 col-sm-10">
                                <button type="submit" class="btn btn-primary">Enter</button>
                              </div>
                            </div>
                        </form>
                    </div>
                </div>


            </div>
        </div>
        
    </body>
    
</html>