<?php



$personneid=$_GET['pid'];
$createdate=$_GET['createdate'];

$username=$_GET['username'];
$password=$_GET['password'];
$role=$_GET['role'];



/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */

 $con = mysqli_connect('localhost','root','Xternet19832020','kpos');
// Check connection
if($con === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 


$sql = "insert into utilisateur(personneid,username,password,statut,role) values('".$personneid."','".$username."','".$password."','active','".$role."');";
if(mysqli_query($con, $sql)){
    echo "Records inserted successfully.";
	
}
else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($con);
}


 mysqli_close($con);
// Close connection




?>