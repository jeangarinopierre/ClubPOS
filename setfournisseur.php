<?php 
include 'mainphp.php';

session_start();
if(!isset($_SESSION["nom"])){

		header("Location: login.php", true, 301);
exit();
	
	
}
echo"<html><head><link rel='stylesheet'  type='text/css' href='mystyle.css'/><script>";

if(isset($_GET['fournisseurid'])){
$nom=$_GET['nom'];
$adresse=$_GET['adresse'];
$telephone=$_GET['telephone'];
$email=$_GET['email'];
$contactname=$_GET['contactname'];
$contactid=$_GET['contactid'];
$fournisseurid=$_GET['fournisseurid'];

echo"function initall(){


document.getElementById('nom').value='".$nom."';	
document.getElementById('fournisseurid').value='".$fournisseurid."';
document.getElementById('adresse').value='".$adresse."';
document.getElementById('telephone').value='".$telephone."';
document.getElementById('email').value='".$email."';
document.getElementById('contact').value='".$contactname."';
document.getElementById('contactid').value='".$contactid."';	
}";



}
else
{

echo "function initall(){



}";	
	
	
}



echo"function setdate(){

	
	document.getElementById('createdate').value=new Date();
	
	
}

</script>";

menudisplay();

echo"</head>
<body onload='initall();'><form action='setfournisseur_.php' method='get' >

<center><label>Nom</label><input type=text name=nom id='nom'/><input type=text name=fournisseurid id='fournisseurid'/><br>

<label>adresse</label><input type=text name=adresse id=adresse /><br>
<label>Telephone</label><input type=text name=telephone id=telephone /><br>
<label>Email</label><input type=text name=email id=email /><br>
<label>Notes</label><input type=text name=notes id=notes /><br>
<label>contact</label><input type=text name=contact id=contact /><input type=text name=contactid id=contactid value='1'/><br>

<input name='createdate' type=text id=createdate value=".date('Y-m-d')."  />
</center>
<button type=submmit >submmit</button>





</form></body>


</html>





";




?>