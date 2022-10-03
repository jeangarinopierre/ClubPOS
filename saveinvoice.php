<?php

 include 'mainphp.php';

session_start();
if(!isset($_SESSION["nom"])){

		header("Location: login.php", true, 301);
exit();
	
	
}








 $su=0;
$c=0;  
$i=0;
$z=0;
$n = $_GET['numberp'];
$dateinvoice=$_GET['dateinvoice'];
$fournissid=$_GET['fournissid'];
$invoicenum=$_GET['invoicenum'];
$datevente=date('Y-m-d\TH:i:s');












$con = mysqli_connect('localhost','root','Xternet19832020','kpos');
//mysqli_autocommit($con,FALSE);
// Check connection
if($con === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
// Attempt insert query execution
$sql = "insert into invoice(fournisseurid,date,invoicenumber,utilisateurid) values('".$fournissid."','".$dateinvoice."','".$invoicenum."','".$_SESSION["personneid"]."');";
if($n>0){
if(mysqli_query($con, $sql)){
   echo "Records inserted successfully.";
	 $invoiceid=mysqli_insert_id($con);
	
	 ///////////////////

$b=0;

for($i=0;$i<$n;$i++){
	
	
$t1="produitid".$i;
$t2="quantite".$i;
$t3="prixvente".$i;





	
if(isset($_GET[$t1])){
$id = $_GET[$t1];
$qty = $_GET[$t2];
$pv = $_GET[$t3];
//$p = $_GET[$t4];
//$desc = $_GET[$t5];	
	//$c++;
	//$z++;
	//echo"<label id='prod".$c."'>".$desc."-".$id."-(".$qty.")-----".$pv."-----".$p."<br> ";


$sql = "insert invoice_item(invoiceid,produitid,quantite,prix) values('".$invoiceid."','".$id."','".$qty."','".$pv."');";
if(mysqli_query($con, $sql)){
   echo "Records inserted successfully.";
	 $idl[$b]=$id;
	 $qtyl[$b]=$qty;
	$b++;
	 
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($con);
}

	
}
	

	
}


//echo "Total:".$total."HTG <br>";	

//echo"printing receipt";


/*
for($i=0;$i<$b;$i++){
	
	


$sql="SELECT * from stock_item where produitid='".$idl[$i]."';";
$result = mysqli_query($con,$sql);
       

while($row = mysqli_fetch_array($result)) {
 
  $qtyl[$i]=$row['quantite']-$qtyl[$i];
  
  
}	
	
	
	
	
	
	

	
	
	
}
 







for($i=0;$i<$b;$i++){
	
	//echo"-----".$idl[$i];

$sql = "update stock_item set quantite='".$qtyl[$i]."' where produitid=".$idl[$i].";";
if(mysqli_query($con, $sql)){
   echo "stock updated successfully.";
	
	 
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($con);
}
	
	
	
}
*/
///////////////////////////



} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($con);
}

}
else
echo"pas de produit";



// Attempt insert query execution






 mysqli_close($con);
// Close connection

echo"<input type='hidden' id='cc' value='10' />";

OperationSuccess();

?>