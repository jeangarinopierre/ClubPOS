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
<html><head><link rel='stylesheet' type='text/css' href='mystyle.css'><script>
var pid;
var np;
var pp;	
var qp; 

var nouveau=0;

function setdate(){

	
	document.getElementById('createdate').value=new Date();
	
	
}

function noenter(){
return!(window.event&&window.event.keyCode==13);	
	
	
	
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

/*function testval2(val3,val4){
		
document.getElementById('txtHint2').innerHTML=null;	
	
document.getElementById('keyWord').value=val3;	
document.getElementById('keyWord2').value=val4;		
}

*/

var val10;
var val9='';
function testval2(val3,val4,val5,val6,val7,val8,ye2,mo2,da2,ye,mo,da,val11,dep1,dep2,val12){
		
document.getElementById('txtHint2').innerHTML=null;	
document.getElementById('keyWord').value=val3;	
document.getElementById('keyWord2').value=val4;
document.getElementById('quantite').value=val5;
document.getElementById('prixachat').value=val6;	
document.getElementById('barecode').value=val7;
document.getElementById('prixvente').value=val8;

document.getElementById('depname').value=dep1;
document.getElementById('depid').value=dep2;


if(mo>9){
document.getElementById('dateexpiration').value=ye+'-'+mo+'-'+da;	
	
}
else
{
	
	document.getElementById('dateexpiration').value=ye+'-0'+mo+'-'+da;

	
}


if(mo2>9){
	
document.getElementById('dateachat').value=ye2+'-'+mo2+'-'+da2;	
}
else
{
	
document.getElementById('dateachat').value=ye2+'-0'+mo2+'-'+da2;
	
}



document.getElementById('fournissid').value=val11;

document.getElementById('date1').value=val12;


document.getElementById('nouveau').value=1;



if (typeof val7 === 'undefined')
{
	
	document.getElementById('nouveau').value=0;
	
	//document.getElementById('keyWord2').value='';
	document.getElementById('barecode').value='';
	//document.getElementById('keyWord').value='';	
//document.getElementById('keyWord2').value='';
document.getElementById('quantite').value='';
document.getElementById('prixachat').value='';	
document.getElementById('barecode').value='';
document.getElementById('prixvente').value='';
document.getElementById('dateexpiration').value='';	
document.getElementById('dateachat').value='';	
//document.getElementById('date1').value='';	
	document.getElementById('depname').value='';
document.getElementById('depid').value='';
}






pid=val4;
np=val3;
pp=val6;	
qp=val5; 


	
}


function sendKeyWord(str) {
	
	
  var val=document.getElementById('keyWord').value;


  
	var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById('txtHint2').innerHTML = this.responseText;
		
		var txtNewInputBox = document.createElement('div');
       txtNewInputBox.innerHTML = this.responseText;



document.getElementById('newElementId').appendChild(txtNewInputBox);
	document.getElementById('newElementId')= txtNewInputBox;	
      }
    };
    xmlhttp.open('GET','resultproduit2.php?q='+val,true);
    xmlhttp.send();
 

	
document.getElementById('txtHint').innerHTML=null;
  
}




function myFunction() {
	
	
  window.open('setproduit.php', '_blank', 'toolbar=yes,scrollbars=yes,resizable=yes,top=200,left=600,width=800,height=400');
}

function myFunction2() {
  window.open('setfournisseur.php', 'new Produit', 'toolbar=yes,scrollbars=yes,resizable=yes,top=500,left=500,width=400,height=300');
}

function submit_form(){
	
	produit=document.getElementById('keyWord').value.trim();
	produitid=document.getElementById('keyWord2').value.trim();
	prixvente=document.getElementById('prixvente').value.trim();
	prixachat=document.getElementById('prixachat').value.trim();
	dateachat=document.getElementById('dateachat').value.trim();
	quantite=document.getElementById('quantite').value.trim();
	
	if(produit.length==0||prixvente.length==0||dateachat.length==0||quantite.length==0)
	alert('field empty');
	else
	 document.forms['myform'].submit();
	
}




function checkNumber(v){
	
	if(isNaN(document.getElementById(v).value)){
		alert(document.getElementById(v).value+' is not a number');
		document.getElementById(v).value='';
	}
	
	
}





</script>";
menudisplay();
echo"<h1>ENREGISTRER PRODUIT</h1></head><body><form action='setproduititem_.php' method='get' onsubmit='event.preventDefault();validateMyForm();' name='myform'>

<center>
<table>
<tr>

<td><label>produit</label></td>
<td><input type='text' id='keyWord' name='keyWord'  onkeyup='sendKeyWord(this.id);'  autocomplete=off /><input type='text' id='keyWord2' name='keyWord2' hidden /></td>
<td><button onclick='myFunction()'>ADD NEW PRODUCT</button></td>
</tr>
<tr>
<td></td>
<td><div id='txtHint2' ></div></td>
<td></td>
</tr>
<tr>
<td><label>prix vente produit </label></td>
<td><input type=text name=prixvente id=prixvente onkeyup='checkNumber(this.id);' autocomplete=off /></td>
<td></td>
</tr>

<tr>
<td><label>prix achat produit </label></td>
<td><input type=text name=prixachat id=prixachat onkeyup='checkNumber(this.id);' autocomplete=off /></td>
<td></td>
</tr>

<tr>
<td><label>date achat produit </label></td>
<td><input type=date name=dateachat id=dateachat /></td>
<td></td>
</tr>


<tr>
<td><label>quantite produit </label></td>
<td><input type=text name=quantite id=quantite onkeyup='checkNumber(this.id);' autocomplete=off  /></td>
<td></td>
</tr>
<tr>
<td><label>Unite de vente</label></td>
<td><input type=text name=unite id=unite autocomplete=off  /></td>
<td></td>
</tr>
<tr>
<td><label>instructions</label></td>
<td><input type=text name=unitevente id=unitevente autocomplete=off  /></td>
<td></td>
</tr>
<tr>
<td></td>
<td></td>
<td><button onclick='submit_form();'>Sauvegarder</button></td>
</tr>


<input type=hidden name=quantite2 id=quantite2 /><br>


<br>
<input type=hidden name='createdate'  id=createdate value=".date('Y-m-d')."  />
<input type=hidden name=nouveau id=nouveau value='0' />
</center>
</form></body></html>";




?>