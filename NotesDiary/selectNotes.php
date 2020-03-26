<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$link = mysqli_connect("localhost", "root", "", "notesdiary");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
// Escape user inputs for security
$username = mysqli_real_escape_string($link, $_POST['username']); 
$searchword = mysqli_real_escape_string($link, $_POST['searchword']);

$sql = "SELECT  `username`,`notes`,`title` ,`notes_id` from notes where `username`='".$username."' and title like '".$searchword."%'";
$result = $link->query($sql);
$rows = array();
if ($result->num_rows > 0) {
    // output data of each row
     while($r = $result->fetch_assoc()) {
         $rows[]=$r;
    } 
	print json_encode($rows);
} else {
	 
				echo "0";//daftar user baru
			 
    
}
 

 
// Close connection
mysqli_close($link);
?>