<?php
    include ("database_connection.php");
    if(!isset($_SESSION))
   session_start();
    ensure_login();
    
db_connect();
$date= date("Y-m-d");
    
$query=mysql_query("SELECT * FROM visits WHERE date='$date'");

$row=mysql_fetch_assoc($query);
$q1= mysql_query("SELECT * FROM trips");
  $numbOfTrips=mysql_num_rows($q1);  
$q2=mysql_query("SELECT * FROM dreams");
    $numbOfDreams=mysql_num_rows($q2);
$q3=mysql_query("SELECT * FROM admins");
    $numbOfAdmins=mysql_num_rows($q3);
$q4=mysql_query("SELECT * FROM users");
    $numbOfUsers=mysql_num_rows($q4); 
$q5=mysql_query("SELECT * FROM tour_order");
    $numbOfDreamOrders=mysql_num_rows($q5); 
$q6=mysql_query("SELECT * FROM dream_order");
    $numbOfTripOrders=mysql_num_rows($q6);    
    ?>
<!DOCTYPE html>
<html>
<head>
   
    <title>Admin</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Contact page dreamsatellite"/>
    <link href="css/bootstrap.css" rel="stylesheet">
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link href="css/statisticsStyle.css" rel="stylesheet" type="text/css" />
     
</head>
<body>
	<div class="container-fluid">
        <div class="row">
            <?php require("nav.php"); ?>
        </div>
        <div class="row">
            <div class="col-lg-2" style="border-right: 1px solid black;"><?php require("left.php");?></div>
            <div class="col-lg-10">
            <div class="row" style="padding-left: 20px;">
                <h1>Welcome to statistics, dear <?= $_SESSION["name"]?>!</h1>
            </div>

                <div class="panel-group" id="accordion">
                      <div class="panel panel-default">
                        <div class="panel-heading">
                          <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapse1">Users</a>
                          </h4>
                        </div>
                        <div id="collapse1" class="panel-collapse collapse in">
                          <div class="panel-body">
                            <table class="table table-hover">
                             <tbody>
                                <tr>
                                    <th>Total number of users</th>
                                    <th><?=$numbOfUsers;?></th>
                                </tr>
                                 
                                <tr>
                                    <th>Users online</th>
                                    <th><?=$numbOfUsers;?></th>  <!--Допиши здесь число онлайн пользователей-->
                                </tr>
                                <tr>
                                    <th>New users during month</th>
                                    <th><?=$numbOfUsers;?></th>
                                </tr> 
                                <tr>
                                    <th>Deleted users during month</th>
                                    <th><?=$numbOfUsers;?></th>
                                </tr>
                                <tr>
                                    <th>New users during the day</th>
                                    <th><?=$numbOfUsers;?></th>
                                </tr>
                                <tr>
                                    <th>Deleted users during the day</th>
                                    <th><?=$numbOfUsers;?></th>
                                </tr>
                             </tbody>
                            </table>
                          </div>
                        </div>
                      </div>

                      <div class="panel panel-default">
                        <div class="panel-heading">
                          <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapse2">Dreams</a>
                          </h4>
                        </div>
                        <div id="collapse2" class="panel-collapse collapse">
                          <div class="panel-body">
                              <table class="table table-hover">
                             <tbody>
                                <tr>
                                    <th>Total number of dreams</th>
                                    <th><?=$numbOfUsers;?></th>
                                </tr>
                                 
                                <tr>
                                    <th>New dreams during month</th>
                                    <th><?=$numbOfUsers;?></th>
                                </tr> 
                                <tr>
                                    <th>Deleted dreams during month</th>
                                    <th><?=$numbOfUsers;?></th>
                                </tr>
                                
                             </tbody>
                            </table>
                          </div>
                        </div>
                      </div>

                        <div class="panel panel-default">
                        <div class="panel-heading">
                          <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapse3">Tours</a>
                          </h4>
                        </div>
                        <div id="collapse3" class="panel-collapse collapse">
                          <div class="panel-body">
                              <table class="table table-hover">
                             <tbody>
                                <tr>
                                    <th>Total number of tours</th>
                                    <th><?=$numbOfUsers;?></th>
                                </tr>
                                 
                                <tr>
                                    <th>New tours during month</th>
                                    <th><?=$numbOfUsers;?></th>
                                </tr> 
                                <tr>
                                    <th>Deleted tours during month</th>
                                    <th><?=$numbOfUsers;?></th>
                                </tr>
                                
                             </tbody>
                            </table>
                          </div>
                        </div>
                      </div>

                       <div class="panel panel-default">
                        <div class="panel-heading">
                          <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapse4">Visitors</a>
                          </h4>
                        </div>
                        <div id="collapse4" class="panel-collapse collapse">
                          <div class="panel-body">
                              <table class="table table-hover">
                             <tbody>
                                <tr>
                                    <th>Number of visitors during the day</th>
                                    <th><?=$numbOfUsers;?></th>
                                </tr>
                                 
                                <tr>
                                    <th>Number of visitors during month</th>
                                    <th><?=$numbOfUsers;?></th>
                                </tr> 
                                
                             </tbody>
                            </table>
                          </div>
                        </div>
                      </div>
                </div>
            </div>

        </div>

    </div>
</body>
</html>