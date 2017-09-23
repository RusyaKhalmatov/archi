<?php

    if(!isset($_SESSION))
        session_start();

require_once ("database_connection.php");

db_connect();
$login = $_POST["login"];
$password=$_POST["password"];
$query = mysql_query("SELECT name,login,password FROM admins WHERE login='$login'");
$data=mysql_fetch_array($query);
$name=$data["name"];

if(isset($_POST["login"]) && isset($_POST["password"]))
{
    if($data!=NULL){
        if (is_password_correct($login,$password))
          {
             $_SESSION["name"]=$name;
             $_SESSION["login"]=$login;
             redirect("admin.php","");
          }
        else
        {
            redirect("../access.php","Incorrect input");
           
        }
    }else
    {
         redirect("../access.php","Profile NOT found");
    }
    
}


?>