<?php
    include ("../database_connection.php");
    db_connect();



	if(isset($_POST["add-admin"])){

       $name = $_POST["name"];
       $login = $_POST["login"];
       $psw = $_POST["password"];
       $psw2 = $_POST["password2"];

       $query = mysql_query("SELECT name,login FROM admins WHERE login='$login'");
        $data=mysql_fetch_array($query);
       if(isset($_POST["supadm"])){
           $super = true;

       }else
       {
           $super = false;
       }

       if($query==NULL)
       {
           if($psw===$psw2)
           {
               if($super==true)
               {
                   mysql_query("INSERT INTO admins(name,login,password,superadmin) VALUES ('$name','$login','psw','1')");
               }else
               {
                   mysql_query("INSERT INTO admins(name,login,password) VALUES ('$name','$login','psw')");
               }

           }else{
               redirect("../add_admin.php","Passwords don't match");
           }

       }else
       {
           redirect("../add_admin.php","Login is already exist");
       }


	}


 ?>