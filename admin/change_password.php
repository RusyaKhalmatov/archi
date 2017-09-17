<?php
 if(!isset($_SESSION))
    {
        session_start();
    }
require_once("database_connection.php");
    db_connect();

$password=$_POST["passold"];
$password_new=$_POST["pass1"];
$password_new2=$_POST["pass2"];
$login=$_SESSION["login"];
if($password!=NULL && $password_new!=NULL && $password_new2!=NULL)
{
    $query=mysql_query("SELECT password FROM admins WHERE login='$login'");
    $data=mysql_fetch_array($query);
    if($password==$data["password"])
    {
       if($password_new==$password_new2)
       {
        $proc=mysql_query("UPDATE admins SET password='$password_new' WHERE login='$login'");
            redirect("modifyAdmin.php","Sucessfully updated");
       }else
       {
           redirect("modifyAdmin.php","New passwords doesn't match");
       }
        
    }else
    {
        redirect("modifyAdmin.php","Incorrect password!");
    }
        
}else
{
    redirect("modifyAdmin.php","Fill all the fields!");
}

?>