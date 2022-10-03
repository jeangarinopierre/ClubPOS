<?php 


$nom=$_GET['nom'];
$prenom=$_GET['prenom'];
$telephone=$_GET['telephone'];
$telephone2=$_GET['telephone2'];
$email=$_GET['email'];

echo"<html><head><link rel='stylesheet' type='text/css' href='mystyle.css'></head><body>";
echo "<label>".$nom." ".$prenom."</label><br>";
echo "<label>".$telephone."/".$telephone2."</label><br>";
echo "<label>".$email."</label><br>";

echo"</body></html>";




?>