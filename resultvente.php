<?php
$q =$_GET['q'];

$tempid=0;
$tempsomme=0;


$con = mysqli_connect('localhost','root','Xternet19832020','kpos');
if (!$con) {
  die('Could not connect: ' . mysqli_error($con));
}

mysqli_select_db($con,"kpos");
$sql="select * ,prixvente*quantite as subtotalvente from detail_vente,vente,produit where detail_vente.venteid=vente.venteid and detail_vente.produitid=produit.produitid and vente.datevente>='".$q."';";
$result = mysqli_query($con,$sql);

if($result=="")
{
echo("email was not found");

//echo $sql;
}
else
{
	$n=0;
	echo'<table><tr>
 <th>venteid</th>
 <th>datevente</th>
 <th>nom</th>
 <th>description</th>
 <th>categorie </th>
 <th>prix_vente</th>
 <th>quantite</th>
 <th>subvente</th>
 </tr>';
	while($row = mysqli_fetch_array($result)) {
  
  //echo '<a href="setproduit.php?id='.$n.'&value='.$row['produitid'].'"   >edit</a><input readonly id=display'.$n.' style="font-size:20;" value="'.$row['nom'].'" size="50"/></br>';
 
 if($tempid!=$row['venteid'])
 {
	 $tempid=$row['venteid'];
	 echo'<tr>
 <td style="background-color:#FF0000"> <br> </td>
 <td style="background-color:#FF0000">   </td>
 <td style="background-color:#FF0000">   </td>
 <td style="background-color:#FF0000">   </td>
 <td style="background-color:#FF0000">   </td>
 <td style="background-color:#FF0000">   </td>
 <td style="background-color:#FF0000">   </td>
 <td style="text-align:center;background-color:#00FF00">'.$tempsomme.' HTG</td>
 </tr>';
 echo'<tr>
 <td> <br> </td>
 <td >   </td>
 <td >   </td>
 <td >   </td>
 <td >   </td>
 <td >   </td>
 <td >   </td>
 <td ></td>
 </tr>';
$tempsomme=0;	 
 }
echo'
 <tr>
 <td>'.$row['venteid'].' </td>
 <td>'.$row['datevente'].' </td>
 <td>'.$row['nom'].' </td>
 <td>'.$row['description'].' </td>
 <td>'.$row['categorie'].' </td>
 <td>'.$row['prixvente'].' HTG</td>
 <td>'.$row['quantite'].' </td>
 <td style="text-align:center">'.$row['subtotalvente'].' HTG</td>
 
 </tr>';

$tempsomme=$tempsomme+$row['subtotalvente'];




 $n++;
}
echo'<tr>
 <td> <br> </td>
 <td>   </td>
 <td>   </td>
 <td>   </td>
 <td>   </td>
 <td>   </td>
 <td>   </td>
 <td style="text-align:center;background-color:#00FF00" >'.$tempsomme.' HTG</td>
 </tr>';
 echo'</table>';	
	
	
	
}
mysqli_close($con);
?>