<?php
$q =$_GET['q'];

$tempid=0;
$tempsomme=0;


$con = mysqli_connect('localhost','root','Xternet19832020','kpos');
if (!$con) {
  die('Could not connect: ' . mysqli_error($con));
}

mysqli_select_db($con,"kpos");
$sql="select * ,produit.produitid as pproduitid,prixvente*quantite as subtotalvente from detail_vente,vente,produit,utilisateur where utilisateur.personneid=vente.utilisateurid and detail_vente.venteid=vente.venteid and detail_vente.produitid=produit.produitid and vente.venteid='".$q."';";
$result = mysqli_query($con,$sql);
if($result==""){
	
	
echo"no record found";	
	
	
}else{
echo'<table border="0"><tr><th>Select</th><th>Date vente</th><th>Caissier</th><th>Mode de paiement</th><th>Produit</th><th>Categorie</th><th>Prix unitaire</th><th>Quantite</th><th>Quantite a retourner</th><th>sous total</th></tr>';
$n=0;
$vid=0;
	while($row = mysqli_fetch_array($result)) {
  $vid=$row['venteid'];
 
 
//echo"<tr><td><button onclick='openline(".json_encode($n).",".$row['pproduitid'].",".$row['venteid'].",".json_encode($row['datevente']).",".$row['username'].",".$row['mode_paiement'].",".$row['numero_authorisation'].",".$row['status'].",".json_encode($row['nom']).",".json_encode($row['description']).",".json_encode($row['categorie']).",".$row['prixvente'].",".$row['quantite'].");' >edit</button></td>";
echo"<tr><td><button onclick='openline(".json_encode($n).",".$row['pproduitid'].",".$row['venteid'].",".json_encode($row['datevente']).",".json_encode($row['username']).",".json_encode($row['mode_paiement']).",0,".json_encode($row['status']).",".json_encode($row['nom']).",".json_encode($row['description']).",".json_encode($row['categorie']).",".$row['prixvente'].",".$row['quantite'].");' >Select</button></td>";


echo'
 <td>'.$row['datevente'].' </td>
 <td>'.$row['username'].' </td>
 <td>'.$row['mode_paiement'].' </td>
 <td>'.$row['nom'].'<input type="hidden" id="pproduitid'.$n.'" name="pproduitid'.$n.'" value="'.$row['pproduitid'].'" /> </td>
 <td>'.$row['description'].' </td>

 <td>'.$row['prixvente'].' HTG</td>
 <td>'.$row['quantite'].'</td>
 <td><input type="text" id="quantitee'.$n.'" name="quantitee'.$n.'"  value="0" readonly /> </td>
 <td style="text-align:center">'.$row['subtotalvente'].' HTG</td></tr>';
 
$n++;
	
	
}
}
echo'</table><input type="hidden" id="qty" name="qty"  value="'.$n.'" /></table><input type="hidden" id="venteid" name="qty"  value="'.$vid.'" />';

mysqli_close($con);
?>