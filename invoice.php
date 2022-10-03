
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
	

?>
<?php




echo'<html><head>
<link rel="stylesheet" type="text/css" href="mystyle.css"/>
<script> nn=0 ;


';


echo"function sendKeyWord(str) {
	
	
  var val=document.getElementById('findbox').value;

  
if(val.length>3)
{
  
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
    xmlhttp.open('GET','findproduit.php?q='+val,true);
    xmlhttp.send();
 
}
	

  
}





function testval2(v1,v2,v4,v3){
	
document.getElementById('findbox').value='';	
	  
	  
	  var p=document.createElement('input');
       p.setAttribute('id','produitid'+nn);
	   p.setAttribute('name','produitid'+nn);
	  p.setAttribute('hidden','true');
	  document.getElementById('txtHint3').appendChild(p); 
  document.getElementById('produitid'+nn).value=v2;
  
    var p0=document.createElement('input');
       p0.setAttribute('id','nom'+nn);
	   p0.setAttribute('name','nom'+nn);
	  p0.setAttribute('readonly','true');
	  document.getElementById('txtHint3').appendChild(p0); 
  document.getElementById('nom'+nn).value=v1;
   var tem='sub'+nn;
  var tem2='quantite'+nn;
  var tem3='prixvente'+nn;
  
  var p1=document.createElement('input');
       p1.setAttribute('id','prixvente'+nn);
	   p1.setAttribute('name','prixvente'+nn);
	  p1.setAttribute('onchange','updateAll('+tem+','+tem2+','+tem3+');');
	  document.getElementById('txtHint3').appendChild(p1); 
  document.getElementById('prixvente'+nn).value=v3;
  
 
   var t1=document.createElement('input');
       t1.setAttribute('id','quantite'+nn);
	   t1.setAttribute('name','quantite'+nn);
	   t1.setAttribute('onchange','updateAll('+tem+','+tem2+','+tem3+');');
	  document.getElementById('txtHint3').appendChild(t1); 
  document.getElementById('quantite'+nn).value=1;
  
  var t2=document.createElement('input');
       t2.setAttribute('id','sub'+nn);
	   t2.setAttribute('name','sub'+nn);
      t2.setAttribute('readonly','true');	 
	 document.getElementById('txtHint3').appendChild(t2); 
     document.getElementById('sub'+nn).value=1*v3;
  
  
  var t3=document.createElement('input');
  t3.setAttribute('type','button');
       t3.setAttribute('id','button'+nn);
	   t3.setAttribute('name','button'+nn);
	   t3.setAttribute('value','delete record');
	   t3.setAttribute('onclick','deleteRec('+nn+');');
	 document.getElementById('txtHint3').appendChild(t3); 
  
  
  
  
  var p2=document.createElement('br');
  document.getElementById('txtHint3').appendChild(p2);
	
 
 document.getElementById('txtHint2').innerHTML=null;	
	
	
	nn++;
document.getElementById('numberp').value=nn;	
updateTotal();	
	
	
}
function updateAll(val,val2,val3){

//alert(val.value+','+val2.value+','+val3.value)
	
val.value=(+val2.value)*(+val3.value);	
	


updateTotal();	
}


function updateTotal(){
	
 total=0;
for(i=0;i<nn;i++){
if(document.getElementById('sub'+i)!=null)	
total=total+(+document.getElementById('sub'+i).value);	
	
	
	
}

document.getElementById('total').value=total;	
	
	
}


function deleteRec(v){
	
temp='produitid'+v;
document.getElementById(temp).remove();
temp='nom'+v;
document.getElementById('nom'+v).remove();
document.getElementById('prixvente'+v).remove();	
document.getElementById('quantite'+v).remove();	
document.getElementById('sub'+v).remove();
document.getElementById('button'+v).remove();

updateTotal();

}

function myFunction() {
	
	
  window.open('setproduit.php', '_blank', 'toolbar=no,scrollbars=yes,resizable=yes,top=200,left=600,width=800,height=400');
}

function myFunction2() {
  window.open('setfournisseur.php', '_blank', 'toolbar=no,scrollbars=yes,resizable=yes,top=500,left=500,width=400,height=300');
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

function submit_form(){
	
	 document.forms['myform'].submit();
	
}
</script>";

menudisplay();
echo'INVOICE | Welcome '.$_SESSION["username"] .'<br><br><br>

</head>

<body>
<form action="saveinvoice.php" method="get" onsubmit="event.preventDefault();validateMyForm();" name="myform">
<table>

<tr>
<td><label>#Facture</label></td>
<td><input type="text" name="invoicenum" id="invoicenum" /></td>
<td></td>
</tr>

<tr>
<td><label>DATE</label></td>
<td><input type="date" name="dateinvoice" id="dateinvoice" /></td>
<td></td>
</tr>

<tr>
<td><label>FOURNISSEUR </label></td>
<td><input type="text" id="date1" name="date1"  onkeyup="showUser(this.id);" /><input type="hidden" id="fournissid" name="fournissid"/></td>
<td><button onclick="myFunction2()">ADD NEW FOURNISSEUR</button></td>
</tr>

<tr>
<td><div id="txtHint" ></div></td>
<td></td>
<td></td>
</tr>
</table>


<hr><br>
<input type="text" name="findbox" id="findbox" onkeyup="sendKeyWord(this.id);"/>
<br>
<div id="txtHint2" ></div>

<br>
<div id="txtHint3" ></div>	
<br><br>	
<label>TOTAL:</label><input type="text" id="total" name="total" value="" readonly /><br>
<input type="hidden" id="numberp" name="numberp" value="" />	
<button onclick="submit_form();">Sauvegarder</button>



</form>
</body>


</html>';
	 





?>