<?php
require_once ("database_connection.php");
db_connect();

$query1=mysql_query("SELECT * FROM events ORDER BY count DESC LIMIT 1;");
           
            $data=mysql_fetch_assoc($query1);
$query2=mysql_query("SELECT * FROM message");
$result=mysql_num_rows($query2);
?>
    <div class="main">
        <h3 >Home</h3>
        <h3><a href="../main_page/MAIN.php" style="color:white;">See your website</a></h3>
        <h3><a href="admin.php" style="color:white;">Main</a></h3>
    <div class="side">
        <ul class="menu">
            <li class ="menu__list"><a href="">Content</a>
            <ul class="menu__drop">
                <li><a href="add_trip.php">Add trip</a></li>
                <li><a href="add_dream.php">Add dream</a></li>
                <li><a href="add_hotel.php">Add hotel</a></li>
                <li><a href="list_content.php">List of content</a></li>
                <li><a href="list_of_news.php">List of news</a></li>
                
            </ul> 
            </li>
            <li><a href="list_of_orders.php">Orders<span class="badge" style="margin-left:20px;"><?=$data["count"]; ?></span></a>  </li>
            <li class ="menu__list"><a href="#">Admins</a>
             <ul class="menu__drop">
                 <li><a href="admins_all-admins.php">All admins</a></li>
                 <li><a href="new_admin.php">Add new admin</a></li>
                 
            
             </ul>
            </li>
            <li><a href="list_of_messages.php">Messages<span class="badge" style="margin-left:20px;"><?=$result; ?></span></a>  </li>
            <li><a href="statistics.php">Statistics</a></li>
            <li class ="menu__list"><a href="#">Users</a>
             <ul class="menu__drop">
                 <li><a href="user_all-users.php">List of users</a></li>
                 
                 <li><a href="#">Settings</a></li>
                
             </ul>
            </li>
        </ul>
    </div>                
</div>
      
 