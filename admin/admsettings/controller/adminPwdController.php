<?php 

include("../../database_connection.php");
include("acont.php");
if(!isset($_SESSION))
  		 session_start();
  
	    $login = $_SESSION['login'];

	db_connect();

    	$old_password= trim($_POST['Oldpassword']);
    	$new_password = trim($_POST['password']);
    	$query = mysql_query("SELECT * FROM admins WHERE login='$login'");
        $data=mysql_fetch_array($query);

        $real_pwd = trim(decr($data['password']));

        if($old_password==$real_pwd)
        {
        	$set_pwd = encr("$new_password");
        	$sql = mysql_query("UPDATE admins SET password = '$set_pwd' WHERE login ='$login'");
        	/*echo $new_password;
        	echo "<br/>";
        	echo $old_password;
        	echo "<br/>";
        	echo $real_pwd;
        	echo "<br/>";
        	echo $set_pwd;*/
        	redirect("../adm-profile.php","Changes are saved");
        }
        else
        {
        	redirect("../adm-profile.php","Wrong current password");
        }

        
?>