<?php


$con = mysqli_connect('localhost','root','Xternet19832020','kpos');
if (!$con) {
  die('Could not connect: ' . mysqli_error($con));
}

mysqli_select_db($con,"kpos");

$venteid=$_GET['venteid'];
$quantite=$_GET['qty'];
$val="";
$pid=[];
$quantity=[];
for($i=0;$i<$quantite;$i++){
	
$val="pid".$i;	
$pid[$i]=$_GET[$val];
$val="quantit".$i;	
$quantity[$i]=$_GET[$val];

//echo $pid[$i]."-----".$quantity[$i]."<br>" ;


$sql = "update detail_vente set quantite=quantite-'".intval($quantity[$i])."' where venteid='".intval($venteid)."' and produitid='".intval($pid[$i])."' ;";
if(mysqli_query($con, $sql)){
   // echo "Records inserted successfully.";
	
	 
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($con);
}	
	
}




for($i=0;$i<$quantite;$i++){
	
$val="pid".$i;	
$pid[$i]=$_GET[$val];
$val="quantit".$i;	
$quantity[$i]=$_GET[$val];

//echo $pid[$i]."-----".$quantity[$i]."<br>" ;


$sql = "update stock_item set quantite=quantite+'".intval($quantity[$i])."' where produitid='".intval($pid[$i])."' ;";
if(mysqli_query($con, $sql)){
   // echo "Records inserted successfully.";
	
	 
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($con);
}	
	
}

//echo $venteid."----".$quantite;



mysqli_close($con);

?>