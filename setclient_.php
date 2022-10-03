<?php
$pid=$_GET['pid'];
$nom=$_GET['nom'];
$prenom=$_GET['prenom'];
$sex=$_GET['sex'];
$cin=$_GET['cin'];
$date_naissance=date('Y-m-d');//$_GET['date_naissance'];
$email=$_GET['email'];

$telephone=$_GET['telephone'];
$telephone2=$_GET['telephone2'];
$createdate=$_GET['createdate'];


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


/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */

 $con = mysqli_connect('localhost','root','Xternet19832020','kpos');
// Check connection
if($con === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
// Attempt insert query execution
//$sql = "insert into personne(nom,prenom,sex,date_naissance,CIN,email,telephone,telephone2,create_date) values('".$nom."','".$prenom."','".$sex."','".$date_naissance."','".$cin."','".$email."','".$telephone."','".$telephone2."','".$createdate."');";
$sql = "insert into personne(nom,prenom,sex,date_naissance,CIN,email,telephone,telephone2,create_date) values('".$nom."','".$prenom."','".$sex."','".$date_naissance."','".$cin."','".$email."','".$telephone."','".$telephone2."','".$createdate."');";



if(mysqli_query($con, $sql)){
    echo "Records inserted successfully.";
	 $pid=mysqli_insert_id($con);
	 
/////////////////// 
	 $sql = "insert into client(personneid,codeclient) values('".$pid."','00000');";
if(mysqli_query($con, $sql)){
    echo "Records inserted successfully.";
	 
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($con);
}
	 
/////////////////	 
	 
	 
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($con);
}



 mysqli_close($con);
// Close connection

OperationSuccess();


?>