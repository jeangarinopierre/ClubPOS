<?php
$q =$_GET['q'];

$con = mysqli_connect('localhost','root','Xternet19832020','kpos');
if (!$con) {
  die('Could not connect: ' . mysqli_error($con));
}

mysqli_select_db($con,"kpos");
$sql="select  unite_vente,unite,produit.nom as pnom,produit.produitid as pproduitid,description as pdescription, categorie as pcategorie,prix_vente,prix_achat,quantite,dateachat,date_expiration ,prix_vente*quantite as subtotalvente,prix_achat* quantite as subtotalachat , (prix_vente-prix_achat)*quantite as profit from stock_item,produit where stock_item.produitid=produit.produitid and produit.nom like '".$q."%';";
$result = mysqli_query($con,$sql);

if($result=="")
{
echo("email was not found");

echo $sql;
}
else
{
	$n=0;
	echo'<table><tr>
 <th>Editer</th> 
 <th>Nom Produit</th>
 <th>Description</th>
 <th>Categorie </th>

 <th>Prix de vente</th>
 <th>Date achat</th>
 <th>Prix achat</th>
 <th>Quantite disponible</th>
 <th>Unite</th>
  <th>Instruction</th>

 </tr>';
	while($row = mysqli_fetch_array($result)) {
  
  //echo '<a href="setproduit.php?id='.$n.'&value='.$row['produitid'].'"   >edit</a><input readonly id=display'.$n.' style="font-size:20;" value="'.$row['nom'].'" size="50"/></br>';
 
echo'
 <tr>
 <td><a href="registerproduit.php?id='.$n.'&value='.$row['pproduitid'].'&nom='.$row['pnom'].'&description='.$row['pdescription'].' &categorie='.$row['pcategorie'].'
 &prixvente='.$row['prix_vente'].'&prixachat='.$row['prix_achat'].'&quantite='.$row['quantite'].'&dateachat='.$row['dateachat'].'&dateexpiration='.$row['date_expiration'].'&instructions='.$row['unite_vente'].'&unite='.$row['unite'].'"   ><button>Select</button></a></td>
 <td>'.$row['pnom'].' </td>
 <td>'.$row['pdescription'].' </td>
 <td>'.$row['pcategorie'].' </td>
 <td>HTG '.$row['prix_vente'].' </td>
 <td>'.$row['dateachat'].' </td>
 <td><center>HTG '.$row['prix_achat'].'</center> </td>
 <td><center>'.$row['quantite'].' </center></td>
  <td><center>'.$row['unite'].' </center></td>
 <td><center>'.$row['unite_vente'].' </center></td>
 
 
 </tr>
 
 ';






 $n++;
}

 echo'</table>';	
	
	
	
}
mysqli_close($con);
?>