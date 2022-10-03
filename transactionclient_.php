<?php

$client=$_GET['date1'];
$accountid=$_GET['accountid'];
$personneid=$_GET['fournissid'];
$amount=$_GET['amount'];
$invoice=$_GET['invoice'];
$type=$_GET['type'];
$datetransaction=$_GET['datetransaction'];

$notes=$_GET['notes'];


include 'mainphp.php';

session_start();
if(!isset($_SESSION["nom"])){

		header("Location: login.php", true, 301);
exit();
	
	
}




 $con = mysqli_connect('localhost','root','Xternet19832020','kpos');

if($con === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 if($accountid==""){

$sql = "insert into accounts(personneid,amount,invoice_number,type,date_transaction,notes,create_user)values('".$personneid."','".$amount."','".$invoice."','".$type."','".$datetransaction."','".$notes."','".$_SESSION["username"]."');";
if(mysqli_query($con, $sql)){
    echo "Records inserted successfully insert.";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($con);
}

 }
else
{
	
	$sql = "update accounts set personneid='".$personneid."',amount='".$amount."',invoice_number='".$invoice."',type='".$type."',date_transaction='".$datetransaction."',notes='".$notes."',update_user='".$_SESSION["username"]."' where accountid='".$accountid."';";
if(mysqli_query($con, $sql)){
    echo "Records updated successfully.";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($con);
}
	
	
	
	
}







 mysqli_close($con);


$_SESSION["para"]="<a href='print3.php?utilisateur=".$_SESSION["nom"]."&client=".$client."&numfacture=".$invoice."&amount=".$amount."&type=".$type."&datetransaction=".$datetransaction."&notes=".$notes."' target='popup' ><img src='img/print-flat.png' alt='home' width='100' height='100'></a>";

OperationSuccess2();

?>