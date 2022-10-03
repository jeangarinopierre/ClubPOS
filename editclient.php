<?php

include 'mainphp.php';
echo"
<html><head><link rel='stylesheet' type='text/css' href='mystyle.css'/><script>

function setdate(){

	
	document.getElementById('createdate').value=new Date();
	
	
}";



if(isset($_GET['pid'])){
$pid=$_GET['pid'];
$nom=$_GET['nom'];
$prenom=$_GET['prenom'];
$cin=$_GET['cin'];
$email=$_GET['email'];
$telephone=$_GET['telephone'];
$telephone2=$_GET['telephone2'];
$date_naissance=$_GET['date_naissance'];



echo"
function init(){
document.getElementById('pid').value='".$pid."'	;	
document.getElementById('nom').value='".$nom."'	;
document.getElementById('prenom').value='".$prenom."';	
document.getElementById('cin').value='".$cin."';
document.getElementById('date_naissance').value='".$date_naissance."';	
document.getElementById('email').value='".$email."';
document.getElementById('telephone').value='".$telephone."';
document.getElementById('telephone2').value='".$telephone2."';

}";


}
else{
echo"function init(){


}";
	
}
echo"

function checkNumber(v){
	if(isNaN(document.getElementById(v).value)){
		alert(v+' is not a number');
		
	}
	
	
}


function submit_form(){
	
	nom=document.getElementById('nom').value.trim();
	prenom=document.getElementById('prenom').value.trim();
	telephone=document.getElementById('telephone').value.trim();
	
	
	if(nom.length==0||prenom.length==0||telephone.length==0)
	{
	alert('* field are empty');
	}
	else{
		document.forms['myform'].submit();
		
		
	}
	
	
}


</script>";
menudisplay();

echo"<h1>Client</h1></head>
<body onload='init();'><form action='setclient_.php' method='get' onsubmit='event.preventDefault();validateMyForm();' name='myform'>
<center>
<table>
<tr>
<td><label>Nom*</label></td>
<td><input type=text name=nom id='nom' autocomplete=off/><input type=text name='pid' id='pid' hidden /></td>
</tr>
<tr>
<td><label>Prenom*</label></td>
<td><input type=text name=prenom id=prenom autocomplete=off/></td>
</tr>
<tr>
<td><label>Sex</label></td>
<td><select name=sex>
<option>M</option>
<option>F</option>
</select><br></td>
</tr>

<tr>
<td><label>NIF/CIN</label></td>
<td><input type=text name=cin id=cin autocomplete=off/></td>
</tr>
<tr>
<td></td>
<td><input type=date name=date_naissance id=date_naissance hidden/></td>
</tr>

<tr>
<td><label>Email</label></td>
<td><input type=text name=email id=email autocomplete=off/></td>
</tr>



<tr>
<td><label>Telephone*</label></td>
<td><input type=text name=telephone id=telephone autocomplete=off/></td>
</tr>

<tr>
<td><label>Telephone2</label></td>
<td><input type=text name=telephone2 id=telephone2 /></td>
</tr>

<tr>
<td></td>
<td><button onclick='submit_form();'>Sauvegarder</button></td>
</tr>
<br>



<input name='createdate' type=hidden id=createdate value=".date('Y-m-d')." />
</center>


</table>
<br><br><br><br>
";


if(isset($_GET['pid'])){

echo"<center><table><tr><th>Amount</th><th>Invoice#</th><th>Type</th><th>Date</th></tr>";


$con = mysqli_connect('localhost','root','Xternet19832020','kpos');
if (!$con) {
  die('Could not connect: ' . mysqli_error($con));
}


$sql="select * from accounts where personneid='".$pid."';";
$result = mysqli_query($con,$sql);
       

while($row = mysqli_fetch_array($result)) {
 
  echo "<tr><td> ".$row['amount']." HTG</td><td> ".$row['invoice_number']." </td><td> ".$row['type']." </td><td> ".$row['date_transaction']." </td></tr>";
  
  
}	





echo"</table></center></body>








";

}

echo "</html>";
?>


