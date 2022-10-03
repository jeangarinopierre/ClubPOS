<?php
$q =$_GET['q'];

$tempid=0;
$tempsomme=0;


$con = mysqli_connect('localhost','root','Xternet19832020','kpos');
if (!$con) {
  die('Could not connect: ' . mysqli_error($con));
}

mysqli_select_db($con,"kpos");
$sql="select * from departement;";
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
  

echo "<tr><td><button id='".$row['nom_dep']."' name='".$row['departement_id']."' onclick='testval2(this.id,this.name);'>edit </button></td><td> ".$row['nom_dep']." </td></tr>";

  
}
	
echo"</table>";	
	
	
}
mysqli_close($con);
?>