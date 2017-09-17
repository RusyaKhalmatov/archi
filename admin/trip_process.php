<?php
require("database_connection.php");
db_connect();

$country=$_POST["country"];
$city=$_POST["city"];
$hotel=$_POST["hotel"];
$adult_p=$_POST["adult"];
$child_p=$_POST["child"];
$numb_days=$_POST["numb_of_days"];
$image=$_POST["img"];
$details=$_POST["details"];

if(trip_verify($country,$city,$hotel,$adult_p,$child_p,$numb_days,$image,$details))
{
    if (is_exist($country,$city,$hotel,$adult_p,$child_p,$numb_days,$image,$details))
    {
        redirect("add_trip.php","Trip is already exist");//checks whether new tris is already exist (function in file database_connection.php)
    }else
    $data=mysql_query("INSERT INTO trips (country, city, hotel, price_adult, price_child, details, days, img) VALUES ('$country','$city','$hotel','$adult_p','$child_p','$details','$numb_days','$image')");
    redirect("add_trip.php","Trip is created");
}else
    redirect("add_trip.php","Fill all the fields");
?>