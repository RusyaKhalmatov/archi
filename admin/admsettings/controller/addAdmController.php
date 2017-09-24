<?php
    include ("../../database_connection.php");
    include ("../../../scripts/acont.php");
    db_connect();



	if(isset($_POST["add-admin"])){

       $name = $_POST["name"];
       $login = $_POST["login"];
       $psw = $_POST["password"];
       $psw2 = $_POST["password2"];

<<<<<<< HEAD:admin/scripts/addAdmController.php

       $query = mysql_query("SELECT name,login FROM admins WHERE login='$login'");
=======
       $query = mysql_query("SELECT login FROM admins WHERE login='$login'");
>>>>>>> forwork:admin/admsettings/controller/addAdmController.php
        $data=mysql_fetch_array($query);
       if(isset($_POST["supadm"])){
           $super = true;
       }else
       {
           $super = false;
       }

       if($data==NULL)
       {
           if($psw===$psw2)
           {
           		$encpwd = encr($psw);
               if($super==true)
               {
<<<<<<< HEAD:admin/scripts/addAdmController.php
                  mysql_query("INSERT INTO admins(name,login,password,superadmin) VALUES ('$name','$login','psw','1')");
               }else
               {
                  mysql_query("INSERT INTO admins(name,login,password) VALUES ('$name','$login','psw')");
=======
                  mysql_query("INSERT INTO admins(name,login,password,superadmin) VALUES ('$name','$login','$encpwd','1')");
                  redirect("../add_admin.php","Admin successfully created");
               }else
               {
                   mysql_query("INSERT INTO admins(name,login,password) VALUES ('$name','$login','$encpwd')");
                   redirect("../add_admin.php","Admin successfully created");
>>>>>>> forwork:admin/admsettings/controller/addAdmController.php
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