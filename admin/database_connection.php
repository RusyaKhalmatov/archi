<?php
if (!isset($_SESSION))
           session_start();
require_once ("app_config.php");

#return true if password is correct
function is_password_correct($login,$password)
{
    include ("../scripts/acont.php");
    db_connect();
    $query = mysql_query("SELECT name,login,password FROM admins WHERE login='$login'");
     $data=mysql_fetch_assoc($query);
    $pwd = trim(decr($data['password']));
        if($pwd==$password && $pwd!=null)
        {
            return true;
        }
    else
        return false;
}

function verify_user($email, $password)
{
    db_connect();
    $query = mysql_query("SELECT name,email,password FROM users WHERE email='$email'");
     $data=mysql_fetch_assoc($query);
 
        if($data['password']==$password && $data['password']!=null)
        {
            return true;
        }
    else
        return false;
}
function db_connect()
{
    require_once ("app_config.php");
	$link=mysql_connect(DATABASE_HOST, DATABASE_USERNAME, DATABASE_PASSWORD);
	mysql_select_db(DATABASE_NAME);
}

function redirect($url,$message)
{
    
    $_SESSION["message"]=$message;
    
    header("Location: $url");
}

function ensure_login()
{
    if(!isset($_SESSION["name"]))
        redirect("../access.php","First you must login");
}

function get_order_trip()
    {
    db_connect();
    $query = mysql_query("SELECT * FROM events LEFT OUTER JOIN dream_order ON events.dream_id=dream_order.id WHERE events.dream_id!=0");
        echo "<table>";
    echo "<tr>";
         echo "<td>"; echo "Check";  echo "</td>";
        echo "<td>"; echo "ID";  echo "</td>";
         echo "<td>"; echo "User id";  echo "</td>";
      echo "<td>"; echo "Dream id";  echo "</td>";
    echo "<td>"; echo "Total cost";  echo "</td>";
    echo "<td>"; echo "Phone number";  echo "</td>";
    echo "</tr>";    
    
        while ($row=mysql_fetch_array($query))
        {
            echo "<tr>";
            
             echo "<td>";?> 
            <input type="checkbox" name="check[]" value="<?php echo $row["id"]?>">
            <?php echo "</td>";
            echo "<td>"; echo $row["id"];  echo "</td>";
            echo "<td>"; echo $row["user_id"]; echo "</td>";
            echo "<td>"; echo $row["order_id"]; echo "</td>";
             echo "<td>"; echo $row["cost"]; echo "</td>";
            echo "<td>"; echo $row["phone_numb"]; echo "</td>";

            echo "</tr>";
        }
        echo "</table>";
        
             
    }

function get_order_dream()
{
    db_connect();
    $query = mysql_query("SELECT * FROM events LEFT OUTER JOIN tour_order ON events.tour_id=tour_order.id WHERE events.tour_id!=0");
        echo "<table>";
    echo "<tr>";
         echo "<td>"; echo "Check";  echo "</td>";
        echo "<td>"; echo "ID";  echo "</td>";
         echo "<td>"; echo "User id";  echo "</td>";
      echo "<td>"; echo "Trip id";  echo "</td>";
    echo "<td>"; echo "Phone number";  echo "</td>";
    echo "<td>"; echo "Number of adults";  echo "</td>";
    echo "<td>"; echo "Number of children";  echo "</td>";
    echo "<td>"; echo "Total cost";  echo "</td>";
    echo "</tr>";    
    
        while ($row=mysql_fetch_array($query))
        {
            echo "<tr>";
            
             echo "<td>";?> 
            <input type="checkbox" name="check[]" value="<?php echo $row["id"]?>">
            <?php echo "</td>";
            echo "<td>"; echo $row["id"];  echo "</td>";
            echo "<td>"; echo $row["user_id"]; echo "</td>";
            echo "<td>"; echo $row["order_id"]; echo "</td>";
            echo "<td>"; echo $row["phone_numb"]; echo "</td>";
            echo "<td>"; echo $row["numb_adult"]; echo "</td>";
            echo "<td>"; echo $row["numb_child"]; echo "</td>";
            echo "<td>"; echo $row["total_price"]; echo "</td>";
            echo "</tr>";
        }
        echo "</table>";
}

function hotel_exist($name, $city,$des)
{
   
     $query=mysql_query("SELECT name, city, description FROM hotels WHERE name='$name' AND city='$city' AND description='$des'");
    $data=mysql_fetch_assoc($query);
    if($data!=NULL)
    {
        return true;
    }else
        return false;
}

?>


 