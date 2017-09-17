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
	
	<div id="first" style="height:1200px;">
            <h1 id="page_name"></h1>
        <div id="mainBut" style="height:1000px;">
            <h2 id="welcome">Messages content</h2>
<!--Table for Message-->            
            <form action="" method="post">
            <?php
    $query = mysql_query("SELECT * FROM message");
        echo "<table>";
    echo "<tr>";
        echo "<td>"; echo "Select";  echo "</td>";
    echo "<td>"; echo "Message id";  echo "</td>";
    echo "<td>"; echo "Email";  echo "</td>";
    echo "<td>"; echo "Name";  echo "</td>";
    echo "<td>"; echo "Phone number";  echo "</td>";
    echo "<td>"; echo "Text";  echo "</td>";
    echo "</tr>";    
        while ($row=mysql_fetch_array($query))
        {
            echo "<tr>";
            
             echo "<td>";?> 
            <input type="checkbox" name="check[]" value="<?php echo $row["id"]?>">
            <?php echo "</td>";
            echo "<td>"; echo $row["id"];  echo "</td>";
            echo "<td>"; echo $row["email"]; echo "</td>";
            echo "<td>"; echo $row["name"];   echo "</td>";
            echo "<td>"; echo $row["phone_number"];   echo "</td>";
            echo "<td>"; echo $row["text"];   echo "</td>";
            echo "</tr>";
        }
        echo "</table>";?>
        <input type="submit" name="delete" class="buts" value="Delete">
          </form>  
 <!--END OF Message CONTENT-->        
          
         
           
           
           
             <?php 
    if(isset($_POST["delete"]))
    {
        $choose=$_POST["check"];

        while( list($key,$val)=@each($choose))
        {
            mysql_query("delete from message where id=$val");
        }

        ?><script type="text/javascript">
      window.location.href=window.location.href;             
    </script>       
    <?php
    }
 
    ?>              
                  
      </div>
 </div>
     
<style>
    .buts
    {
        height: 50px;
        width: 100px;
        margin-top: 30px;
        margin-left: 100px;
    }
    #mainBut
    {
        overflow: scroll;
        border-radius: 5px; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
    }
table
    {
        margin-left: 100px;
        margin-top: 50px;
        text-align: center;
    }
   
    
</style>            


</body>
</html>

