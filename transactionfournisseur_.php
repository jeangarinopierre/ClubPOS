<?php


$transactionid=$_GET['transactionid'];
$fournisseurid=$_GET['fournissid'];
$amount=$_GET['amount'];
$invoice=$_GET['invoice'];
$type=$_GET['type'];
$datetransaction=$_GET['datetransaction'];

$notes=$_GET['notes'];






 $con = mysqli_connect('localhost','root','Xternet19832020','kpos');

if($con === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 if(!isset($_GET['transactionid']) or $_GET['transactionid']==""){

$sql = "insert into accounts(fournisseurid,amount,invoice_number,type,date_transaction,notes)values('".$fournisseurid."','".$amount."','".$invoice."','".$type."','".$datetransaction."','".$notes."');";
if(mysqli_query($con, $sql)){
    echo "Records inserted successfully insert.";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($con);
}

 }
else
{
	
	$sql = "update accounts set fournisseurid='".$fournisseurid."',amount='".$amount."',invoice_number='".$invoice."',type='".$type."',date_transaction='".$datetransaction."',notes='".$notes."' where accountid='".$transactionid."';";
if(mysqli_query($con, $sql)){
    echo "Records inserted successfully.";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($con);
}
	
	
	
	
}







 mysqli_close($con);
// Close connection




?>