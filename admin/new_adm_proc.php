<?php

if(!isset($_SESSION))
    {
        session_start();
    }
require_once("database_connection.php");
    db_connect();

$name=$_POST["name"];
$login=$_POST["login"];
$password1=$_POST["pass"];
$password2=$_POST["pass2"];

if($name!=NULL && $login!=NULL && $password1!=NULL && $password2!=NULL)
{
    if($password1==$password2)
    {
        $query=mysql_query("SELECT * FROM admins WHERE login='$login'");
        $data=mysql_fetch_array($query);
        if($data!=NULL)
        {
            redirect("new_admin.php","The admin is alredy exist!");
        }else
        {
           $query=mysql_query("INSERT INTO admins (name, login, password) VALUES ('$name','$login','$password1')");

             redirect("new_admin.php","Successully created");   
        }
    }else
        redirect("new_admin.php","Passwords doesn't match");
    
}else
{
    redirect("new_admin.php","Fill all the fields");
}

?>