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
            <h2 id="welcome">Trips content</h2>
<!--Table for TRIP-->            
            <form action="" method="post">
            <?php
    $query = mysql_query("SELECT * FROM trips");
        echo "<table>";
    echo "<tr>";
        echo "<td>"; echo "Select";  echo "</td>";
    echo "<td>"; echo "Trip id";  echo "</td>";
    echo "<td>"; echo "Country";  echo "</td>";
    echo "<td>"; echo "City";  echo "</td>";
    echo "<td>"; echo "Hotel";  echo "</td>";
    echo "<td>"; echo "Price for adult";  echo "</td>";
    echo "<td>"; echo "Price for children";  echo "</td>";
    echo "<td>"; echo "Decsription";  echo "</td>";
    echo "<td>"; echo "Number of days";  echo "</td>";
    echo "</tr>";    
        while ($row=mysql_fetch_array($query))
        {
            echo "<tr>";
            
             echo "<td>";?> 
            <input type="checkbox" name="check[]" value="<?php echo $row["trip_id"]?>">
            <?php echo "</td>";
            echo "<td>"; echo $row["trip_id"];  echo "</td>";
            echo "<td>"; echo $row["country"]; echo "</td>";
            echo "<td>"; echo $row["city"];   echo "</td>";
            echo "<td>"; echo $row["hotel"];   echo "</td>";
            echo "<td>"; echo $row["price_adult"]."$";   echo "</td>";
            echo "<td>"; echo $row["price_child"]."$";   echo "</td>";
            echo "<td>"; echo $row["details"];   echo "</td>";
            echo "<td>"; echo $row["days"];   echo "</td>";
            
            echo "</tr>";
        }
        echo "</table>";?>
        <input type="submit" name="delete1" class="buts" value="Delete">
         <input type="submit" name="modify1" class="buts" value="Modify">
          </form>  
 <!--END OF TRIP CONTENT-->        
          
 <!--Dream content-->
         <h2>Dreams content</h2>
          <form action="" method="post">
            <?php
    $query = mysql_query("SELECT * FROM dreams");
        echo "<table>";
    echo "<tr>";
        echo "<td>"; echo "Select";  echo "</td>";
    echo "<td>"; echo "Dream id";  echo "</td>";
    echo "<td>"; echo "Title";  echo "</td>";
    echo "<td>"; echo "Description";  echo "</td>";
    echo "<td>"; echo "Image 1";  echo "</td>";
    echo "<td>"; echo "Image 2";  echo "</td>";
    echo "<td>"; echo "Image 3";  echo "</td>";          
    echo "<td>"; echo "Price";  echo "</td>";
    echo "<td>"; echo "Address";  echo "</td>";
    echo "</tr>";    
        while ($row=mysql_fetch_array($query))
        {
            echo "<tr>";
            
             echo "<td>";?> 
            <input type="checkbox" name="check[]" value="<?php echo $row["trip_id"]?>">
            <?php echo "</td>";
            echo "<td>"; echo $row["id"];  echo "</td>";
            echo "<td>"; echo $row["name"]; echo "</td>";
            echo "<td>"; echo $row["description"];   echo "</td>";
            echo "<td>"; echo $row["img1"];   echo "</td>";
            echo "<td>"; echo $row["img2"];   echo "</td>";
            echo "<td>"; echo $row["img3"];   echo "</td>";
            echo "<td>"; echo $row["price"]."$";   echo "</td>";
            echo "<td>"; echo $row["address"];   echo "</td>";  echo "</tr>";
        }
        echo "</table>";?>
        <input type="submit" name="delete2" class="buts" value="Delete">
         <input type="submit" name="modify2" class="buts" value="Modify">
          </form>  
          
<!--END OF DREAM CONTENT-->          
           
           
           
             <?php 
    if(isset($_POST["delete1"]))
    {
        $choose=$_POST["check"];

        while( list($key,$val)=@each($choose))
        {
            mysql_query("delete from trips where trip_id=$val");
        }

        ?><script type="text/javascript">
      window.location.href=window.location.href;             
    </script>       
    <?php
    }
 
    ?>       
    
                
                 <?php 
    if(isset($_POST["delete2"]))
    {
        $choose=$_POST["check"];

        while( list($key,$val)=@each($choose))
        {
            mysql_query("delete from dreams where id=$val");
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
        margin-left: 50px;
    }
    #mainBut
    {
        overflow: scroll;
        border-radius: 5px; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
    }
table
    {
        text-align: center;
    }
   
    
</style>            


</body>
</html>

