<?php
$q =$_GET['q'];

$tempid=0;
$tempsomme=0;


$con = mysqli_connect('localhost','root','Xternet@2022','kpos');
if (!$con) {
  die('Could not connect: ' . mysqli_error($con));
}

mysqli_select_db($con,"kpos");
$sql="SELECT * ,p.personneid as pid FROM  client c,personne p where p.personneid=c.personneid and (p.nom like '%".$q."%' or p.telephone like '%".$q."%');";
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
  

echo "<tr><td><button id='".$row['nom']." ".$row['prenom']."' name='".$row['pid']."' onclick='testval3(this.id,this.name);'>Select</button></td><td> ".$row['codeclient']." </td><td> ".$row['nom']." </td><td> ".$row['prenom']." </td><td> ".$row['telephone']." </td><td> ".$row['email']."</td></tr>";

  
}
	
echo"</table>";	
	
	
}
mysqli_close($con);
?>