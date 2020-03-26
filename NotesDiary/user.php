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
$password = mysqli_real_escape_string($link, $_POST['password']); 


$sql = "SELECT  `username`,`password` from tabel_user where `username`='".$username."'";
$result = $link->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        if($row["password"] == $password){
			echo "1";//login sukses
			
		} else{
			
			echo "0";
		}
    }
} else {
	// Attempt insert query execution
			$sql1 = "INSERT INTO tabel_user(`username`,`password`) VALUES 
			('$username', '$password' )";
			if(mysqli_query($link, $sql1)){
				echo "2";//daftar user baru
			} else{
				echo "3";
			}
    
}
 

 
// Close connection
mysqli_close($link);
?>