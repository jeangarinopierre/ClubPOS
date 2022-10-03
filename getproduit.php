<?php
$q = intval($_GET['q']);
$n = $_GET['n'];
$con = mysqli_connect('localhost','root','Xternet19832020','kpos');
if (!$con) {
  die('Could not connect: ' . mysqli_error($con));
}

mysqli_select_db($con,"kpos");
$sql="select * from stock_item,produit where produit.produitid=stock_item.produitid and produit.nom like '".$q."%';";
$result = mysqli_query($con,$sql);

if($result=="")
{
echo("email was not found");
}
else
{
	
	
	while($row = mysqli_fetch_array($result)) {
  if($row['quantite']>0){
  echo '<input type="hidden"  id="hiddenid'.$n.'" value="'.$row['produitid'].'"/>
  <input type="hidden"  id="quantite'.$n.'" value="'.$row['quantite'].'"/>
 // <input type="hidden"  id="prixachat'.$n.'" value="'.$row['prix_achat'].'"/>
  <input type=hidden  id="hiddenbarecode'.$n.'" value="'.$row['barcode'].'"/>
  <input type="text" readonly id=display'.$n.'  value="'.$row['nom'].'" />
  <input type="text" class="input1" value="1" onchange="updatetotal(this.id,'.$n.');" id=qty'.$n.' />
  <input type="text" class="input1" readonly id="prix_vente'.$n.'"  value="'.$row['prix_vente'].'" />
  <input type="text" class="input1" readonly id="prix'.$n.'"  value=""  />
  <button  value='.$n.'  id='.$n.' onclick="removeproduit(this.id);" >REMOVE</button>';
	}
  else
	echo '<a href="#" onclick="alert("testtttt");">Click Me</a>';
}

	
	
	
	
}
mysqli_close($con);
?>