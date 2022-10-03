<?php
$q = $_GET['q'];
$n = $_GET['n'];
$con = mysqli_connect('localhost','root','Xternet19832020','kpos');
if (!$con) {
  die('Could not connect: ' . mysqli_error($con));
}

mysqli_select_db($con,"kpos");
$sql="select * from produit where nom like '".$q."%';";
$result = mysqli_query($con,$sql);

if($result=="")
{
echo("email was not found");
}
else
{
	
	
	while($row = mysqli_fetch_array($result)) {
  
  echo '<input type="hidden"  id="hiddenid'.$n.'" value="'.$row['produitid'].'"/>
  
  <input readonly id=display'.$n.' style="font-size:20;" value="'.$row['nom'].'" size="50"/>
    <button  value='.$n.' style="font-size:20;"  id='.$n.' onclick="removeproduit(this.id);" >remove</button>';
  
}

	
	
	
	
}
mysqli_close($con);
?>