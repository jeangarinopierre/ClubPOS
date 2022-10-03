<?php

$produitid=$_GET['produitid'];
$nomproduit=$_GET['nomproduit'];
$descproduit=$_GET['produitid'];
$categorie=$_GET['produitid'];
$status=$_GET['produitid'];
$barecode=$_GET['barecode'];
$prixvente=$_GET['prixvente'];
$prixachat=$_GET['prixachat'];
$dateachat=$_GET['dateachat'];
$quantite=$_GET['quantite'];
$fournisseurid=$_GET['fournisseurid'];
$dateexpiration=$_GET['dateexpiration'];




/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */

 $con = mysqli_connect('localhost','root','Xternet19832020','kpos');
// Check connection
if($con === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
// Attempt insert query execution
$sql = "update stock_item set quantite=quantite+'".$quantite."', prix_vente='".$prixvente."',prix_achat='".$prixachat."' where produitid='".$produitid."';";
if(mysqli_query($con, $sql)){
    echo "Records inserted successfully.";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($con);
}
 mysqli_close($con);
// Close connection




?>