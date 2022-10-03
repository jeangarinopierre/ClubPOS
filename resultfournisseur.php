<?php
$q =$_GET['q'];

$tempid=0;
$tempsomme=0;


$con = mysqli_connect('localhost','root','Xternet19832020','kpos');
if (!$con) {
  die('Could not connect: ' . mysqli_error($con));
}

mysqli_select_db($con,"kpos");
$sql="select * from fournisseur where nom like '%".$q."%' or telephone like '%".$q."%';";
$result = mysqli_query($con,$sql);

if($result=="")
{
echo("email was not found");

//echo $sql;
}
else
{
	
	echo"<table style='width:50%'>";
	
	while($row = mysqli_fetch_array($result)) {
  

echo "<tr><td><button id='".$row['nom']."' name='".$row['fournisseurid']."' onclick='testval(this.id,this.name);'>Select</button></td><td> ".$row['nom']." </td><td>".$row['adresse']." </td><td> ".$row['telephone']." </td><td> ".$row['email']."</td></tr>";

  
}
	
echo"</table>";	
	
	
}
mysqli_close($con);
?>