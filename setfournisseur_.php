<?php



$fournisseurid=trim($_GET['fournisseurid'],'');
$nom=$_GET['nom'];
$adresse=$_GET['adresse'];
$telephone=$_GET['telephone'];
$email=$_GET['email'];

$notes=$_GET['notes'];
$createdate=$_GET['createdate'];
$contactid=$_GET['contactid'];

echo "==".$fournisseurid;


/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */

 $con = mysqli_connect('localhost','root','Xternet19832020','kpos');
// Check connection
if($con === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 if(!isset($_GET['fournisseurid']) or $fournisseurid==''){
// Attempt insert query execution
$sql = "insert into fournisseur(nom,adresse,telephone,email,notes,contactid,create_date) values('".$nom."','".$adresse."','".$telephone."','".$email."','".$notes."','".$contactid."','".$createdate."');";
if(mysqli_query($con, $sql)){
    echo "Records inserted successfully.";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($con);
}

 }
else
{
	
	$sql = "update fournisseur set nom='".$nom."',adresse='".$adresse."',telephone='".$telephone."',email='".$email."',notes='".$notes."',contactid='".$contactid."' where fournisseurid='".$fournisseurid."';";
if(mysqli_query($con, $sql)){
    echo "Records updated successfully.";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($con);
}
	
	
	
	
}







 mysqli_close($con);
// Close connection




?>