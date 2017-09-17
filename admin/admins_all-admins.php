<!DOCTYPE html>
<html>
<?php  
    
     if(!isset($_SESSION))
    {
        session_start();
    }
    require_once("database_connection.php");
    db_connect();
    if(!isset($_SESSION["name"]))
    {
        redirect("../accsess.php","Log in please");
    }
    ?>
<head>
    <title>Admin</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Contact page dreamsatellite"/>
    
    <link href="css/headerStyle.css" rel="stylesheet" type="text/css" />
     <link href="css/main_bodyStyle.css" rel="stylesheet" type="text/css" />
     <link href="css/left_sidebar.css" rel="stylesheet" type="text/css" />
     <link href="css/table.css" rel="stylesheet" type="text/css" />
     
</head>
<body>
	<?php require ("header.php");?>
	<?php require ("left_sidebar.php")?>
	<!--?php require ("main_body.php")?-->
	
	<div id="first">
            <h1 id="page_name"></h1>
            <div id="mainBut">
            <h2 id="welcome">List of administrators</h2>
            
            <div class="expl">
                <h2>Hello,<?= $_SESSION["name"]?></h2>
                <p>Here you can view the entire list of administrators</p>
                
            </div>
       
    <div class="table1">      
        <form name="userOperate" action="" method="post">
        <?php

        $query = mysql_query("SELECT * FROM admins");
        echo "<table>";
        while ($row=mysql_fetch_array($query))
        {
            echo "<tr>";

            echo "<td>";?> 
            <input type="checkbox" name="check[]" value="<?php echo $row["id"]?>">
            <?php echo "</td>";
            echo "<td>"; echo $row["id"];  echo "</td>";
            echo "<td>"; echo $row["name"]; echo "</td>";
            echo "<td>"; echo $row["login"];   echo "</td>";
            echo "<td>"; echo $row["password"];  echo "</td>";
            echo "</tr>";
        }
        echo "</table>";
        ?>
    <input type="submit" name="submit1" value="Delete" id="del">
    <input type="submit" name="modify" value="Modify">
          </form>   

     <?php 
    if(isset($_POST["submit1"]))
    {
        $choose=$_POST["check"];

        while( list($key,$val)=@each($choose))
        {
            mysql_query("delete from users where id=$val");
        }

        ?><script type="text/javascript">
      window.location.href=window.location.href;             
    </script>       
    <?php
    }else
        
        if(isset($_POST["modify"]))
        {
            //header("Location: scripts/modifyAdmin.php");
            header("Location: modifyAdmin.php");
        }
        
    ?>       
                   
         </div>
         
         
         
         
      
              
          
      </div>
 </div>

</body>
</html>

