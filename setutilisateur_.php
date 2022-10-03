<?php
include 'mainphp.php';



session_start();
if(!isset($_SESSION["nom"])){

		header("Location: login.php", true, 301);
exit();
	
	
}
else
{
	if($_SESSION["role"]!='administrator')
	
	header("Location: accessdenied.php", true, 301);
	
}

$nom=$_GET['nom'];
$prenom=$_GET['prenom'];
$sex=$_GET['sex'];
$cin=$_GET['cin'];
$date_naissance=$_GET['date_naissance'];
$email=$_GET['email'];

$telephone=$_GET['telephone'];
$createdate=$_GET['createdate'];

$username=strtolower($_GET['username']);
$password=$_GET['password'];
$role=$_GET['role'];
$failed=0;


/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */

 $con = mysqli_connect('localhost','root','Xternet19832020','kpos');
 mysqli_autocommit($con,FALSE);
 
 
// Check connection
if($con === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
// Attempt insert query execution
$sql = "insert into personne(nom,prenom,sex,date_naissance,CIN,email,telephone,create_date) values('".$nom."','".$prenom."','".$sex."','".$date_naissance."','".$cin."','".$email."','".$telephone."','".$createdate."');";
if(mysqli_query($con, $sql)){
    echo "Records inserted successfully.";
	$personneid=mysqli_insert_id($con);


$sql = "insert into utilisateur(personneid,username,password,statut,role) values('".$personneid."','".$username."','".$password."','active','".$role."');";
if(mysqli_query($con, $sql)){
    echo "Records inserted successfully.";
	$personneid=mysqli_insert_id($con);
}
else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($con);
	mysqli_rollback($con);
	$failed=$failed+1;
}


} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($con);
	mysqli_rollback($con);
	$failed=$failed+1;
}
 
 
 
 if($failed==0){
	mysqli_commit($con);
	 mysqli_close($con);
OperationSuccess();	
	
}
else{ mysqli_close($con);
OperationFail();
}




?>