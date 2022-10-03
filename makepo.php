<?php


$ponumber=$_GET['ponumber'];
$shipaddress=$_GET['shipaddress'];
$billaddress=$_GET['billaddress'];
$orderdate=$_GET['orderdate'];
$fournissid=$_GET['fournissid'];
$shipdate=$_GET['shipdate'];
$status=$_GET['status'];
$canceldate=$_GET['canceldate'];
$terms=$_GET['terms'];
$paymentduedate=$_GET['paymentduedate'];
$instructions=$_GET['instructions'];




$con = mysqli_connect('localhost','root','Xternet19832020','kpos');
//mysqli_autocommit($con,FALSE);

if($con === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 

$sql = "insert into po(fournisseurid,status,ship_address,bill_address,order_date,cancel_date,payment_due_date,instructions,terms) values ('".$fournissid."','".$status."','".$shipaddress."','".$billaddress."','".$orderdate."','".$canceldate."','".$paymentduedate."','".$instructions."','".$terms."');";

if(mysqli_query($con, $sql)){
   echo "Records inserted successfully.";
	
	
}
else 
	echo "ERROR: Could not able to execute $sql. " . mysqli_error($con);










/*produit0
produits0
ordernum0
unitprice0

qtyr0
qtyd0
vf
quant

subtotal
qtyor
qtyr

qtyd
tot*/


?>