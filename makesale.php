<?php

 include 'mainphp.php';

session_start();
if(!isset($_SESSION["nom"])){

		header("Location: login.php", true, 301);
exit();
	
	
}


$failed=0;


$line="";


 $su=0;
$c=0;  
$i=0;
$z=0;
$n = $_GET['numberp'];

if(isset($_GET['clientid'])&&$_GET['clientid']!="" ){
$clientid=$_GET['clientid'];	
	
	
}
else
$clientid=1;


$total=$_GET['total'];
$discount=$_GET['discount'];
$datevente=date('Y-m-d\TH:i:s');

$date=date('Y-m-d');

$modepaiement="";
$referencecard="";

if(isset($_GET['reference'])&&$_GET['reference']!=null )
{
	
	$modepaiement="CREDIT";
}
else{
$modepaiement="CASH";


}




$con = mysqli_connect('localhost','root','Xternet19832020','kpos');
//mysqli_autocommit($con,FALSE);
// Check connection

mysqli_autocommit($con,FALSE);

if($con === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
// Attempt insert query execution
$sql = "insert into vente(utilisateurid,clientid,datevente,mode_paiement,numero_authorisation,numero_recu,status,discount) values('".$_SESSION["personneid"]."','".$clientid."','".$datevente."','".$modepaiement."','".$referencecard."',(select max(venteid)+1 from detail_vente),'accepted','".$discount."');";
if($n>0){
if(mysqli_query($con, $sql)){
   echo "vente inserted successfully.";
	 $venteid=mysqli_insert_id($con);
	
	 ///////////////////


$stt=$total-$discount;


if($modepaiement=='CREDIT'){
$sql = "insert into accounts(personneid,amount,invoice_number,type,date_transaction) values('".$clientid."','".$stt."','".$venteid."','CREDIT','".$date."');";
if(mysqli_query($con, $sql)){
   echo "accounts inserted successfully.";
	 
}else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($con);
	mysqli_rollback($con);
	$failed=$failed+1;
}




}










$b=0;

for($i=0;$i<$n;$i++){
	
	
$t1="produitid".$i;
$t2="quantite".$i;
$t3="prixvente".$i;
$t4="nom".$i;
$t5="unite".$i;


	
if(isset($_GET[$t1])){
$id = $_GET[$t1];
$qty = $_GET[$t2];
$pv = $_GET[$t3];
$p = $_GET[$t4];
$up = $_GET[$t5];
//$desc = $_GET[$t5];	
	//$c++;
	//$z++;
	
	
	 
	echo"<br>---".$p."--".$qty."--".$pv."--<br>";
$line=$line.$p."(".$up.")<br>".$qty." x ".number_format($pv,2)." HTG -----".number_format($pv*$qty,2)."  HTG<br>";

$sql = "insert into detail_vente(venteid,produitid,prixvente,quantite,unite) values('".$venteid."','".$id."','".$pv."','".$qty."','".$up."');";
if(mysqli_query($con, $sql)){
   echo "detail_vente inserted successfully.";
	 $idl[$b]=$id;
	 $qtyl[$b]=$qty;
	$b++;
	 
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($con);
	mysqli_rollback($con);
	$failed=$failed+1;
}

	
}
	

	
}


//echo "Total:".$total."HTG <br>";	

//echo"printing receipt";



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
	mysqli_rollback($con);
	$failed=$failed+1;
}
	
	
	
}

///////////////////////////



} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($con);
	mysqli_rollback($con);
	$failed=$failed+1;
}

}
else
echo"pas de produit";



// Attempt insert query execution









// Close connection

$_SESSION["para"]="<a href='print.php?test=".$line."&utilisateur=".$_SESSION["nom"]."&total=".$total."&venteid=".$venteid."&discount=".$discount."' target='popup' ><img src='img/print-flat.png' alt='home' width='100' height='100'></a>";

if($failed==0){
	mysqli_commit($con);
	 mysqli_close($con);
OperationSuccess();	
	
}
else{ mysqli_close($con);
//OperationFail();
}












?>