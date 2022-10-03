<?php
$q =$_GET['q'];

$tempid=0;
$tempsomme=0;


$con = mysqli_connect('localhost','root','Xternet19832020','kpos');
if (!$con) {
  die('Could not connect: ' . mysqli_error($con));
}

mysqli_select_db($con,"kpos");
$sql="select personne.nom as pnom,personne.prenom as pprenom,personne.telephone as ptelephone,personne.telephone as ptelephone2,personne.email as pemail,fournisseurid, fournisseur.nom as fnom,fournisseur.adresse as fadresse,fournisseur.telephone as ftelephone,fournisseur.email as femail,notes,contactid from personne,fournisseur where (personne.personneid=contactid) and (fournisseur.nom like '%".$q."%' or fournisseur.telephone like '%".$q."%');";
$result = mysqli_query($con,$sql);

if($result=="")
{
echo("email was not found");

//echo $sql;
}
else
{
	
	echo"<table style='width:70%'>";
	
	while($row = mysqli_fetch_array($result)) {
  

echo "<tr><td><a href='"."setfournisseur.php?nom=".$row['fnom']."&adresse=".$row['fadresse']."&telephone=".$row['ftelephone'].".&email=".$row['femail']."&contactid=".$row['contactid']."&contactname=".$row['pnom'].$row['pprenom']."&fournisseurid=".$row['fournisseurid']."&'>edit </a></td><td> ".$row['fnom']." </td><td>".$row['fadresse']." </td><td> ".$row['ftelephone']." </td><td> ".$row['femail']."</td><td> <label>Contact :</label>".$row['pnom']." ".$row['pprenom']."</td><td><button onclick='showdetails(".json_encode($row['pnom']).", ".json_encode($row['pprenom'])." ,".json_encode($row['ptelephone']).",".json_encode($row['ptelephone2']).",".json_encode($row['pemail']).");'> more details</button></td></tr>";

  
}
	
echo"</table>";	
	
	
}
mysqli_close($con);
?>