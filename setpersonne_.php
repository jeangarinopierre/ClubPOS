<?php

$nom=$_GET['nom'];
$prenom=$_GET['prenom'];
$sex=$_GET['sex'];
$cin=$_GET['cin'];
$date_naissance=$_GET['date_naissance'];
$email=$_GET['email'];

$telephone=$_GET['telephone'];
$createdate=$_GET['createdate'];





/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */

 $con = mysqli_connect('localhost','root','Xternet19832020','kpos');
// Check connection
if($con === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
// Attempt insert query execution
$sql = "insert into personne(nom,prenom,sex,date_naissance,CIN,email,telephone,create_date) values('".$nom."','".$prenom."','".$sex."','".$date_naissance."','".$cin."','".$email."','".$telephone."','".$createdate."');";
if(mysqli_query($con, $sql)){
    echo "Records inserted successfully.";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($con);
}
 mysqli_close($con);
// Close connection




?>