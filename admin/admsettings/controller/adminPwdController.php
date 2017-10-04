<?php 

include("../../database_connection.php");
include("acont.php");

	db_connect();
echo "fUCK";
/*
    	$old_password= trim($_POST['Oldpassword']);
    	$new_password = trim($_POST['password']);
    	$query = mysql_query("SELECT * FROM admins WHERE login='$login'");
        $data=mysql_fetch_array($query);

        $real_pwd = trim(decr($data['password']));

        if($old_password!=$real_pwd)
        {
        	redirect("../adm-profile.php","Wrong current password");
        }
        else
        {
        	$set_pwd = encr("$new_password");
        	$sql = mysql_query("UPDATE admins SET password = '$set_pwd' WHERE login ='$login'");
        	redirect("../adm-profile.php","Changes are saved");
        }*/

        
?>