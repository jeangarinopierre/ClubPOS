<?php 

include 'mainphp.php';



session_start();
if(!isset($_SESSION["nom"])){

		header("Location: login.php", true, 301);
exit();
	
	
}
else
{
	if($_SESSION["role"]!='administrator')
	
	header("Location: accessdenied.php", true, 301);
	
}
echo"
<html><head><link rel='stylesheet' type='text/css' href='mystyle.css'/><script>

function setdate(){

	
	document.getElementById('createdate').value=new Date();
	
	
}


function submit_form(){
	nom=document.getElementById('nom').value.trim();
	prenom=document.getElementById('prenom').value.trim();
	telephone=document.getElementById('telephone').value.trim();
	password=document.getElementById('password').value.trim();
	password2=document.getElementById('password2').value.trim();
	username=document.getElementById('username').value.trim();
	
	if(nom.length==0||prenom.length==0||telephone.length==0||password.length==0||password2.length==0||username.length==0)
	{
	alert('* field are empty');
	}
	else{
		
		if(password==password2)
		 document.forms['myform'].submit();
	else
	alert('Password1 not equal Password2');
		
		
	}
	
	
}


</script>";

menudisplay();

echo"<h1>Creer Utilisateur</h1></head>
<body><form action='setutilisateur_.php' method='get' onsubmit='event.preventDefault();' name='myform'>

<center>

<table>
<tr><td><label>Nom*</label></td><td><input type=text name=nom id='nom' autocomplete=off/></td></tr>
<tr><td><label>Prenom*</label></td><td><input type=text name=prenom id=prenom autocomplete=off/></td></tr>
<tr><td><label>Sex</label></td><td><select name=sex>
<option>M</option>
<option>F</option>
</select></td></tr>
<tr><td><label>CIN</label></td><td><input type=text name=cin id=cin autocomplete=off/></td></tr>
<tr><td></td><td><input type=date name=date_naissance id=date_naissance value='".date('Y-m-d')."' hidden/></td></tr>
<tr><td><label>Email</label></td><td><input type=text name=email id=email autocomplete=off/></td></tr>
<tr><td><label>Telephone*</label></td><td><input type=text name=telephone id=telephone /></td></tr>
<tr><td></td><td></td></tr>

<tr><td></td><td><select name=role>
<option value=administrator >Administrator</option>
<option value=Caissier >Caissier</option>
<option value=Associate >Associate</option>
</select></td></tr>

<tr><td><label>username</label></td><td><input type=text name=username id=username  autocomplete=off/></td></tr>
<tr><td><label>password</label></td><td><input type=password name=password id=password /></td></tr>
<tr><td><label>password2</label></td><td><input type=password name=password2 id=password2 /></td></tr>
<tr><td></td><td><button onclick='submit_form();'>Sauvegarder</button></td></tr>


<br>
<br>


<input name='createdate' type=hidden id=createdate value=".date('Y-m-d')."  />
</table></center>






</form></body>


</html>





";




?>