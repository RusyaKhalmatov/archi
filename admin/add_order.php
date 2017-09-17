<?php
    include ("database_connection.php");
    if(!isset($_SESSION))
   session_start();
    ensure_login();
    db_connect();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Add product</title>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Admin's page dream-satellite"/>
    <link href="css/bootstrap.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/add_orderStyle.css">
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
	<div class="container-fluid">
        <div class="row">
            <?php require("nav.php"); ?>
        </div>
        <div class="row" style="">
            <div class="col-lg-2" style="border-right: 1px solid lightblue;"><?php require("left.php");?></div>
            <div class="col-lg-10" style=" padding-top:20px;">
               
               <form class="form-horizontal" id="add-form" enctype="multipart/form-data" action="product-proc.php" method="POST" style="">
				  <div class="form-group">
				    <label class="control-label col-sm-2" for="email">Add image on the webpage:</label>
				    <div class="col-sm-10">
				    	
				     	<input type="file" name="load[]" multiple="multiple" value="" />
				    </div>
				  </div>
				  <div class="form-group"> 
				    <div class="col-sm-offset-2 col-sm-10">
				      <button type="submit" class="btn btn-default" name="send-request" value="Upload">Submit</button>
				    </div>
				  </div>
				</form>

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

<div class="col-lg-10 " style="">      
        <form action="" method="post">
        <?php
        $query1 = mysql_query("SELECT * FROM img");
        echo "<table class='table'>";
        echo "<thead>";
            echo "<tr>";
                echo "<th> <p>select all</p>";?>
                <input type="checkbox"  id="qwe" onclick="onCheck()" value="<?php echo $row["img_id"]; ?>"
                <?php
                echo "</th>";
                echo "<th> <p>Image</p> </th>";
            echo "</tr>";
        echo "</thead>";
        while ($row=mysql_fetch_array($query1))
        {
            echo "<tr>"; echo "<td>";?> 
            <input type="checkbox" name="check[]" id="qwe1" class="chk" value="<?php echo $row["img_id"]; ?>">
            <?php echo "</td>";
            echo "<td>";?> <img src="images/NewDir/<?=$row["img_name"];?>" alt="..." style="width:300px; height: 200px; margin-left:10px; margin: 20px 10px;"> <?php echo "</td>";
            echo "</tr>";
        }
        echo "</table>";
        ?>

        
       <button type="submit" class="btn btn-danger" id="del" name="submit" value="Delete" style="margin-top:30px;">Delete</button>
          </form>   

     <?php 
       
    if(isset($_POST["submit"]))
    {

        $choose=$_POST["check"];

        while( list($key,$val)=@each($choose))
        {
            mysql_query("delete from img where img_id=$val");
        }

        mysql_query("delete from img where img_id=$button");
        unset($_SESSION["butName"]);
        ?>
        
    <script type="text/javascript">
      window.location.href=window.location.href;             
    </script>       
    <?php
    }
    ?>       
         </div>
            </div>
        </div>
    </div>
</body>
</html>

<script type="text/javascript">
     function onCheck()
    {

        if ($("#qwe").prop("checked"))
        {
            $(".chk").attr("checked","checked");
        }else
        {
            $(".chk").removeAttr("checked","checked");
        }    
    }
</script>