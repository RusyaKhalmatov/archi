<?php
       if (!isset($_SESSION))
           session_start();
       ?>
   <html>
 
    <head>
        <meta charset = "utf-8"/>
        <link href="../style/headerStyle.css" rel="stylesheet" type="text/css" />
    </head>
    
    
    <body>
        <div id="mainWindow">
          
          <div id="login_out">
            
            <form action="logout.php">
               <input type="submit" id="log_out" value="logout">
            </form>
             </div>
           <p id="admins_page">Admin's page</p>
            <p id="name"> Hi, <?= $_SESSION["name"]?></p>
             
        </div>

    </body>


</html>