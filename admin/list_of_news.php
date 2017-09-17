<!DOCTYPE html>
<html>
<?php  
    
    require_once("database_connection.php");
    db_connect();
    ?>
<head>
    <title>Admin</title>
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
            <h2 id="welcome">List of news</h2>
            <form name="userOperate" action="" method="post">
            <?php
    $query = mysql_query("SELECT * FROM news");
        echo "<table>";
        while ($row=mysql_fetch_array($query))
        {
            echo "<tr>";
            
             echo "<td>";?> 
            <input type="checkbox" name="check[]" value="<?php echo $row["id"]?>">
            <?php echo "</td>";
            echo "<td>"; echo $row["id"];  echo "</td>";
            echo "<td>"; echo $row["article"]; echo "</td>";
            echo "<td>"; echo $row["text"];   echo "</td>";
            echo "</tr>";
        }
        echo "</table>";?>
        <input type="submit" name="submit1" value="Delete">
          </form>  
          <?php 
    if(isset($_POST["submit1"]))
    {
        $choose=$_POST["check"];

        while( list($key,$val)=@each($choose))
        {
            mysql_query("delete from news where id=$val");
        }

        ?><script type="text/javascript">
      window.location.href=window.location.href;             
    </script>       
    <?php
    }
   
        
    ?>       
                 
      </div>
 </div>
     
            


</body>
</html>

