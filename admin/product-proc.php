<?php 
require ("database_connection.php");

function load_files($files){
	db_connect();
	if ($files["name"]!=0)
	{
		for($i=0;$i<count($files['name']);$i++){
		 	if($files['error'][$i]==0){
		 			$uploaddir = 'images/NewDir/';
					$uploadfile = $uploaddir . basename($_FILES['load']['name'][$i]);
					$articleID = 1;
					$img_name = basename($_FILES['load']['name'][$i]);
					echo '<pre>';
					if (move_uploaded_file($_FILES['load']['tmp_name'][$i], $uploadfile)) {
						mysql_query("INSERT INTO img(id,img_name) VALUES ('$articleID','$img_name')");
					} else {
					    echo "Возможная атака с помощью файловой загрузки!\n";
					}
				

					redirect("add_order.php","File has been successfully uploaded!");
				}
		 	else
		 	{
		 		echo "Upload error\n\n";
				echo $files['error'][$i]; 
		 		print "</pre>";

		 	}
			}
	}
}

 	
 if(isset($_POST["send-request"])){
 	//if($_FILES['load']["name"][0]!=0)
 	//{
		load_files($_FILES['load']);
 	//}else
 	//{
 	//	redirect("add_order.php","Choose a file");
 	}
 	
 /*}
 else
 {
 	echo "You didn't choose a file";
 }
*/


 ?>