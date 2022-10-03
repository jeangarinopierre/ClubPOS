<?php
$q =$_GET['q'];
$n=0;
$tempid=0;
$tempsomme=0;


$con = mysqli_connect('localhost','root','Xternet19832020','kpos');
if (!$con) {
  die('Could not connect: ' . mysqli_error($con));
}

mysqli_select_db($con,"kpos");
$sql="SELECT *,produit.nom as pnom,produit.produitid as pproduitid  from produit,stock_item where  produit.produitid=stock_item.produitid and (produit.nom like '%".$q."%' or description like '%".$q."%');";
$result = mysqli_query($con,$sql);

if($result=="")
{
echo("email was not found");

//echo $sql;
}
else
{
	
	echo"<table style='width:60%'>";
	echo "<tr><th>Action</th><th>Produit</th><th>Description</th><th>Categorie</th><th>Status</th><th>Prix Vente</th><th>Prix Achat</th><th>Quantite</th><th>Unite</th><th>Instructions</th></tr>";
	while($row = mysqli_fetch_array($result)) {
  
$timestamp = $row['date_expiration'];
$y=date("Y", strtotime($timestamp));
$m=date("m", strtotime($timestamp));
$d=date("d", strtotime($timestamp));


$timestamp =$row['dateachat'];
$y2=date("Y", strtotime($timestamp));
$m2=date("m", strtotime($timestamp));
$d2=date("d", strtotime($timestamp));

echo "<tr><td><button id='".$row['pnom']."' name='test' onclick='testval2(this.id,".$row['pproduitid'].",".$row['prix_vente'].",".$row['prix_achat'].",".json_encode($row['unite']).");'>select</button></td><td> ".$row['pnom']."<input type='hidden' id='nomproduit' value='".$row['pnom']."' /><input type='hidden' id='produitid' value='".$row['pproduitid']."' /> </td><td>".$row['description']."<input type='hidden' id='descriptionproduit' value='".$row['description']."' /> </td><td> ".$row['categorie']."<input type='hidden' id='categorieproduit' value='".$row['categorie']."' /> </td><td> ".$row['status']."<input type='hidden' id='statusproduit' value='".$row['status']."' /></td><td> ".$row['prix_vente']." HTG<input type='hidden' id='prixventeroduit' value='".$row['prix_vente']."' /></td><td> ".$row['prix_achat']." HTG<input type='hidden' id='prixachatproduit' value='".$row['prix_achat']."' /></td><td>  ".$row['quantite']."  <input type='hidden' id='quantiteproduit' value='".$row['quantite']."' /></td><td> ".$row['unite']."</td><td> ".$row['unite_vente']."</td></tr>";

$n++;  
}

}



if($n==0){
	echo"<table>";
	
	$sql="SELECT * from produit where nom like '%".$q."%' or description like '%".$q."%';";
$result = mysqli_query($con,$sql);

if($result=="")
{
echo("email was not found");

//echo $sql;
}
else
{
	
	
	
	while($row = mysqli_fetch_array($result)) {
  




echo "<tr><td><button id='".$row['nom']."' name='".$row['produitid']."' onclick='testval2(this.id,this.name,0,0);'>edit </button></td><td> ".$row['nom']."<input type='hidden' id='nomproduit' value='".$row['nom']."' /><input type='hidden' id='produitid' name='produitid' value='".$row['produitid']."' /> </td><td>".$row['description']."<input type='hidden' id='descriptionproduit' value='".$row['description']."' /> </td><td> ".$row['categorie']."<input type='hidden' id='categorieproduit' value='".$row['categorie']."' /> </td><td> ".$row['status']."<input type='hidden' id='statusproduit' value='".$row['status']."' /></td><td> <input type='hidden' id='prixachatroduit' value='0' /></td><td><input type='hidden' id='quantiteproduit' value='0' /></td></tr>";

$n++;  
}
	
	
	
	
	
	
	
	
	
}



	

	
	
}
mysqli_close($con);
?>