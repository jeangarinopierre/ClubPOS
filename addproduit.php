<?php

include 'mainphp.php';

$nomproduit=$_GET['nomproduit'];
$descproduit=$_GET['descproduit'];

$createdate=$_GET['createdate'];



/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */

 $con = mysqli_connect('localhost','root','Xternet19832020','kpos');
// Check connection
if($con === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
// Attempt insert query execution
$sql = "insert into produit(nom,description,create_date,update_date) values('".$nomproduit."','".$descproduit."','".$createdate."','".$createdate."');";
if(mysqli_query($con, $sql)){
    
	
	OperationSuccess();
} else{
    OperationFaile();
	echo "ERROR: Could not able to execute $sql. " . mysqli_error($con);
}
 mysqli_close($con);
// Close connection




?>