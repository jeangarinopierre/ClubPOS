<?php
$q =$_GET['q'];

$tempid=0;
$tempsomme=0;


$con = mysqli_connect('localhost','root','Xternet19832020','kpos');
if (!$con) {
  die('Could not connect: ' . mysqli_error($con));
}

mysqli_select_db($con,"kpos");
$sql="select * from personne,utilisateur where personne.personneid=utilisateur.personneid and (nom like '%".$q."%' or prenom like '%".$q."%' or telephone like '%".$q."%');";
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
  

echo "<tr><td><button id='".$row['nom']."' name='".$row['personneid']."' onclick='testval(this.id,this.name);'>edit </button></td><td> ".$row['nom']." </td><td>".$row['prenom']." </td><td> ".$row['sex']." </td><td> ".$row['CIN']." </td><td> ".$row['date_naissance']." </td><td> ".$row['telephone']." </td><td> ".$row['email']."</td><td> ".$row['username']."</td></tr>";

  
}
	
echo"</table>";	
	
	
}
mysqli_close($con);
?>