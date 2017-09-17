<!DOCTYPE html>
<html>

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
                    <h3 style="color:black;">Here you can modify your information:</h3>
                    <div class="mod1" style="border:1px solid black;">
                        
                        <h2>Check your data and modify it if you want:</h2>
                    </div>
                    
                    <div class="pass" style="border:1px solid black;">
                        <h3 style="color:black">Change password</h3>
                        <form action="change_password.php" method="post">
                            <table>
                                <tr>
                                    <th>Old password: </th>
                                    <th><input type="password" name="passold"></th>
                                </tr>
                                
                                <tr>
                                    <th>New password: </th>
                                    <th><input type="password" name="pass1"></th>
                                </tr>
                                <tr>
                                    <th>Repeat new password:</th>
                                    <th><input type="password" name="pass2"></th>
                                </tr>
                            </table>
                            
                            <input type="submit">
                        </form>
                       
                    </div>
                    
                </div>
            </div>
             
            
     
    
    
	
	




  

</body>
</html>
