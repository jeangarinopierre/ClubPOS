<?php

 include 'mainphp.php';

session_start();
if(!isset($_SESSION["nom"])){

		header("Location: login.php", true, 301);
exit();
	
	
}





$line="";


 $su=0;
$c=0;  
$i=0;
$z=0;
$n = $_GET['numberp'];
$clientid= $_GET['clientid'];
$client= $_GET['client'];
$total=$_GET['total'];
$discount=$_GET['discount'];
$datevente=date('Y-m-d\TH:i:s');

$date=date('Y-m-d');


	




 

















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
	//$c++;
	//$z++;
	
	
	 
	echo"<br>---".$p."--".$qty."--".$pv."--<br>";
$line=$line.$p."(".$up.")<br>".$qty." x ".number_format($pv,2)." HTG -----".number_format($pv*$qty,2)."  HTG<br>";



	
}
	

	
}


//echo "Total:".$total."HTG <br>";	

//echo"printing receipt";




 











$_SESSION["para"]="<a href='print2.php?test=".$line."&utilisateur=".$_SESSION["nom"]."&total=".$total."&client=".$client."&discount=".$discount."' target='popup' ><img src='img/print-flat.png' alt='home' width='100' height='100'></a>";

OperationSuccess2();












?>