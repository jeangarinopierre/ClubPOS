<?php



$q=$_GET['q'];
$fournisseurname=$_GET['fournisseurname'];





/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */

 $con = mysqli_connect('localhost','root','Xternet19832020','kpos');
// Check connection
if($con === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

 

$sql="select * from accounts where fournisseurid='".$q."';";
$result = mysqli_query($con,$sql);

if($result=="")
{
echo("email was not found");

//echo $sql;
}
else
{
	
	echo"<table size='50%'><tr><th>Action </th><th>invoice_number  </th><th>amount   </th><th>type  </th><th>date_transaction</th></tr>";
	
	while($row = mysqli_fetch_array($result)) {
  
   echo"<tr><td><a href='transactionfournisseur.php?accountid=".$row['accountid']."&amount=".$row['amount']."&invoicenum=".$row['invoice_number']."&type=".$row['type']."&datetransaction=".$row['date_transaction']."&notes=".$row['notes']."&fournisseurname=".$fournisseurname."&fournisseurid=".$row['fournisseurid']."& '>edit</a></td><td>".$row['invoice_number']."</td><td>".$row['amount']." </td><td>".$row['type']." </td><td>".$row['date_transaction']."</td></tr>";

  
}


echo"</table>";	
}




 mysqli_close($con);
// Close connection




?>