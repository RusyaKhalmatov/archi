<html>
    <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Log in | Main</title>
    <link href="admin/css/bootstrap.css" rel="stylesheet">
    <script src = "js/accessControl.js"></script>
    </head>
    <body>
        
        <?php  if(!isset($_SESSION))
        {
            session_start();    
        }
        
        if(isset($_SESSION["name"]))
            header("Location: admin/admin.php");  
        ?>
            <div class="container-fluid">
                <div class="container">
                <div class="row" style=" width: 50%; margin: auto;  margin-top: 15%;">
                    <h1 style="margin-bottom: 5%;">Welcome back, my dear admin!</h1>
                </div>
                    <div class="row" style="width:40%; margin: auto; ">
                        
                        <form class="form-horizontal" action="admin/adm_log_action.php"  method="post">
                            <div class="form-group">
                              <label class="control-label col-sm-2" for="login">Login:</label>
                              <div class="col-sm-10">
                                <input type="text" class="form-control" id="login" placeholder="Enter login" name="login">
                              </div>
                            </div>
                            <div class="form-group">
                              <label class="control-label col-sm-2" for="pwd">Password:</label>
                              <div class="col-sm-10">          
                                <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="password">
                              </div>
                            </div>
                            <!--div class="form-group">        
                              <div class="col-sm-offset-2 col-sm-10">
                                <div class="checkbox">
                                  <label><input type="checkbox" name="remember"> Remember me</label>
                                </div>
                              </div>
                            </div-->
                            <div class="form-group">        
                              <div class="col-sm-offset-2 col-sm-10">
                                <button type="submit" class="btn btn-primary">Enter</button>
                              </div>
                            </div>
                        </form>
                    </div>
                </div>


            </div>
           <?php 
       
            if (isset($_SESSION["message"]))
            {
            ?>
            <div class="container" style="width:20%; margin: auto;">
                <h3 style="color:red;"><?=$_SESSION["message"];?></h3>
            </div>
            <?php
               unset($_SESSION["message"]);
            }
                ?>
        </div>
        
    </body>
    
</html>