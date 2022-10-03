<?php
$q =$_GET['q'];

$tempid=0;
$tempsomme=0;


$con = mysqli_connect('localhost','root','Xternet19832020','kpos');
if (!$con) {
  die('Could not connect: ' . mysqli_error($con));
}

mysqli_select_db($con,"kpos");
$sql="select * from personne p,client c where p.personneid=c.personneid and (nom like '%".$q."%' or prenom like '%".$q."%' or telephone like '%".$q."%');";
$result = mysqli_query($con,$sql);

if($result=="")
{
echo("email was not found");

//echo $sql;
}
else
{
	
	echo"<table style='width:50%'><tr>
	<th>Action</th><th>ID Client</th><th>Nom</th><th>Prenom</th><th>CIN/NIF/NN</th><th>Email</th><th>Telephone</th>
	
	
	
	</tr>";
	
	while($row = mysqli_fetch_array($result)) {
  

echo "<tr><td><a href='editclient.php?pid=".$row['personneid']."&nom=".$row['nom']."&prenom=".$row['prenom']."&cin=".$row['CIN']."&email=".$row['email']."&telephone=".$row['telephone']."&date_naissance=".$row['date_naissance']."&telephone2=".$row['telephone2']."' ><button>Select</button></a></td><td>".$row['personneid']." </td><td> ".$row['prenom']." </td><td>".$row['nom']." </td><td> ".$row['CIN']." </td><td> ".$row['email']." </td><td> ".$row['telephone']." </td></tr>";

  
}
	
echo"</table>";	
	
	
}
mysqli_close($con);
?>