<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$link = mysqli_connect("localhost", "root", "", "notesdiary");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

$username = mysqli_real_escape_string($link, $_POST['username']);
$notes = mysqli_real_escape_string($link, $_POST['notes']); 
$title = mysqli_real_escape_string($link, $_POST['title']); 
 
 
	// Attempt insert query execution
			$sql1 = "INSERT INTO `notes`(`username`,`notes`,`title` ) VALUES 
			('".$username."', '".$notes."','".$title."')";
			 if(mysqli_query($link, $sql1)){
				echo "1";//data ke insert
			} else{
				echo "0";
			} 
    
 
 

 
// Close connection
mysqli_close($link);
 ?>