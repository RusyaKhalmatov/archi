<?php
require_once ("admin/database_connection.php");
db_connect();

date_default_timezone_set('UTC');
    $visitor_ip=$_SERVER["REMOTE_ADDR"];
    $date= date("Y-m-d");

    $query=mysql_query("SELECT visit_id FROM visits WHERE date='$date'");

//if there is no visits today from that ip address then
    if(mysql_num_rows($query)==0)
    {
        //clean ips table 
        mysql_query("DELETE FROM ips");
        
        //add to the database current user
        mysql_query("INSERT INTO ips SET ip_address='$visitor_ip'");
        //add to the database the date of visit and set # of views 
        
        $res_count=mysql_query("INSERT INTO visits SET date='$date', hosts='1', views='1'");
    }else // if there is visits today
    {
        //check if there is an address in database, from where user visit page
        $current_ip=mysql_query("SELECT ip_id FROM ips WHERE ip_address='$visitor_ip'");
        if(mysql_num_rows($current_ip)==1)
        {
            mysql_query("UPDATE visits SET views=views+'1' WHERE date='$date'");
        }else //if there is no such ip address
        {
            //add to database unique visitor's ip address
            mysql_query("INSERT INTO ips SET ip_address='$current_ip'");
            
            //add +1 to views of that visitor
            mysql_query("UPDATE visits SET hosts=hosts+'1', views=views+'1' WHERE date='$date'");
        }
        
    }
?>