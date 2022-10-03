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


if(isset($_GET['nom'])&&$_GET['nom']!=null )
{
	 $nom=$_GET['nom'];
	 $id=$_GET['value'];
	
	
	

$prixvente=$_GET['prixvente'];
$prixachat=$_GET['prixachat'];
$dateachat=$_GET['dateachat'];
$quantite=$_GET['quantite'];
$instructions=$_GET['instructions'];
$unite=$_GET['unite'];



	
}
else
 $nom="";










echo"
<html><head><link rel='stylesheet' type='text/css' href='mystyle.css'/><script>

function setdate(){

	
	document.getElementById('createdate').value=new Date();
	
	
}

function showUser(str) {
	
	
  var val=document.getElementById('date1').value;

  


  
	var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById('txtHint').innerHTML = this.responseText;
		
		var txtNewInputBox = document.createElement('div');
       txtNewInputBox.innerHTML = this.responseText;



document.getElementById('newElementId').appendChild(txtNewInputBox);
	document.getElementById('newElementId')= txtNewInputBox;	
      }
    };
    xmlhttp.open('GET','resultfournisseur.php?q='+val,true);
    xmlhttp.send();
 
	
	

  
}

function testval(val1,val2){
		
document.getElementById('txtHint').innerHTML=null;	
	
document.getElementById('date1').value=val1;	
document.getElementById('fournissid').value=val2;		
}

function checkinit(){
	
if(document.getElementById('keyWord2').value>0)
 document.getElementById('nouveau').value=1;	
	
	
}

</script>";
menudisplay();

echo"<h1>Produits</h1></head>
<body onload='checkinit();' ><form action='setproduititem_.php' method='get'>

<center>

<table >
<tr>
<td><label>Nom produit </label></td>
<td><input type=text value='".$nom."' name='keyWord' id='keyWord' readonly /></td>
<td></td>
</tr>
<input type=hidden value='".$id."' name='keyWord2' id='keyWord2'  />
<tr>
<td><label>description produit </label></td>
<td><input type=text name=descproduit id=descproduit readonly /></td>

</tr>

<tr>
<td><label>prix vente produit </label></td>
<td><input type=text name=prixvente id=prixvente value=".$prixvente."  /></td>
</tr>

<tr>
<td><label>prix achat produit </label></td>
<td><input type=text name=prixachat id=prixachat value=".$prixachat." /></td>
</tr>

<tr>
<td><label>date achat produit </label></td>
<td><input type=date name=dateachat id=dateachat value=".$dateachat." /></td>
</tr>

<tr>
<td><label>quantite disponible </label></td>
<td><input type=text name=quantite id=quantite value=".$quantite." readonly /></td>
</tr>

<tr>
<td><label>quantite a ajouter </label></td>
<td><input type=text name=quantite2 id=quantite2 value='0' /></td>
</tr>
<tr>
<td><label>Unite vente </label></td>
<td><input type=text name=unite id=unite value='".$unite."' /></td>
</tr>
<tr>
<td><label>instructions </label></td>
<td><input type=text name=instructions id=instructions value='".$instructions."' /></td>
</tr>

<tr>
<td></td>
<td><button type=submmit >Sauvegarder</button></td>
</tr>


<input name='createdate' type=hidden id=createdate value=".date('Y-m-d')."  />
<input type=hidden name=nouveau id=nouveau value='0' />


</table></center>






</form></body>


</html>





";




?>