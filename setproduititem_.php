<?php
 include 'mainphp.php';

session_start();
if(!isset($_SESSION["nom"])){

		header("Location: login.php", true, 301);
exit();
	
	
}

$nomproduit=$_GET['keyWord'];
$produitid=$_GET['keyWord2'];

$prixvente=$_GET['prixvente'];
$prixachat=$_GET['prixachat'];
$dateachat=$_GET['dateachat'];
$quantite=$_GET['quantite'];
$quantite2=$_GET['quantite2'];
$unitevente=$_GET['instructions'];
$unite=$_GET['unite'];
$nouveau=$_GET['nouveau'];
$failed=0;


 $con = mysqli_connect('localhost','root','Xternet19832020','kpos');

if($con === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
 mysqli_autocommit($con,FALSE);
 
 
 if($nouveau==0){

$sql = "insert into stock_item(produitid,prix_vente,dateachat,quantite,prix_achat,unite_vente,unite) values('".$produitid."','".$prixvente."','".$dateachat."','".$quantite."','".$prixachat."','".$unitevente."','".$unite."');";
if(mysqli_query($con, $sql)){
    echo "Records inserted successfully.";
	OperationSuccess();
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($con);
	mysqli_rollback($con);
	$failed=$failed+1;
}

 }
else{
	
	
$sql = "update stock_item set prix_vente='".$prixvente."',dateachat='".$dateachat."',quantite=quantite+'".$quantite2."',prix_achat='".$prixachat."',unite_vente='".$unitevente."',unite='".$unite."' where produitid='".$produitid."';";
if(mysqli_query($con, $sql)){
    echo "Records inserted successfully.";
	OperationSuccess();
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($con);
	mysqli_rollback($con);
	$failed=$failed+1;
}	
	
	
}
	


if($failed==0){
	mysqli_commit($con);
	 mysqli_close($con);
OperationSuccess();	
	
}
else{ mysqli_close($con);
//OperationFail();

}



?>