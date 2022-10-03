
<?php 

$n=0;

if(isset($_POST['username'])&&$_POST['password']!=null )
 {
	 $username=$_POST['username'];
	 $password=$_POST['password'];
	 $con = mysqli_connect('localhost','root','Xternet@2022','kpos');
if (!$con) {
  die('Could not connect: ' . mysqli_error($con));
}

mysqli_select_db($con,"kpos");
$sql="SELECT * from utilisateur where username='".strtolower($username)."' and password='".$password."' ;";
$result = mysqli_query($con,$sql);
while($row = mysqli_fetch_array($result)) {
 
 $personneid=$row['personneid'];
  $statut=$row['statut'];
  $role=$row['role'];
  
  
 echo"user found ".$personneid.",".$role;
 $n++;
  session_start();
  $_SESSION["username"]=$username;
  $_SESSION["personneid"]=$personneid;
   $_SESSION["role"]=$role;
  
  
  $sql="SELECT * from personne where personneid='".$personneid."' ;";
$result = mysqli_query($con,$sql);
while($row = mysqli_fetch_array($result)) {
	
	$nom=$row['nom'];
  $prenom=$row['prenom'];
	
	
$_SESSION["nom"]=$nom;
$_SESSION["prenom"]=$prenom;	
	
	echo $nom;
	
}
  
  
 header("Location: index.php", true, 301);
exit();
  
  
}
  
if($n==0)
 echo"user not found";
header("Location: index.php", true, 301); 
mysqli_close($con);

 }
else
{echo"empty fields";
header("Location: index.php", true, 301);
}





?>