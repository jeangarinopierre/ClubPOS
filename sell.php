
<?php
 include 'mainphp.php';

session_start();
if(!isset($_SESSION["nom"])){

		header("Location: login.php", true, 301);
exit();
	
	
}
	

?>
<?php




echo'<html><head>
<link rel="stylesheet" type="text/css" href="mystyle.css"/>
<script> nn=0 ;nnp=0;


';


echo"function sendKeyWord(str) {
	
	
  var val=document.getElementById('findbox').value.trim();

  if(val.length>0){

  
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
else{
	
	
	document.getElementById('txtHint2').innerHTML=null;
	
	
	
}
	

  
}





function testval2(v1,v2,v3,v5,v4){
	
	 document.getElementById('findbox').value='';
	
	  
	  
	  var p=document.createElement('input');
       p.setAttribute('id','produitid'+nn);
	   p.setAttribute('name','produitid'+nn);
	  p.setAttribute('hidden','true');
	  document.getElementById('txtHint').appendChild(p); 
  document.getElementById('produitid'+nn).value=v2;
  
    var p0=document.createElement('input');
       p0.setAttribute('id','nom'+nn);
	   p0.setAttribute('name','nom'+nn);
	  p0.setAttribute('readonly','true');
	  document.getElementById('txtHint').appendChild(p0); 
  document.getElementById('nom'+nn).value=v1;
  
  
  var p1=document.createElement('input');
       p1.setAttribute('id','prixvente'+nn);
	   p1.setAttribute('name','prixvente'+nn);
	  
	  document.getElementById('txtHint').appendChild(p1); 
  document.getElementById('prixvente'+nn).value=v3;
  
  var tem='sub'+nn;
  var tem2='quantite'+nn;
  var tem3='prixvente'+nn;
   var t1=document.createElement('input');
       t1.setAttribute('id','quantite'+nn);
	   t1.setAttribute('name','quantite'+nn);
	   t1.setAttribute('onchange','updateAll('+tem+','+tem2.trim()+','+tem3+');');
	  document.getElementById('txtHint').appendChild(t1); 
  document.getElementById('quantite'+nn).value=1;
  
   var p4=document.createElement('input');
       p4.setAttribute('id','unite'+nn);
	   p4.setAttribute('name','unite'+nn);
	  
	  document.getElementById('txtHint').appendChild(p4); 
  document.getElementById('unite'+nn).value=v4;
  
  
  
  
  var t2=document.createElement('input');
       t2.setAttribute('id','sub'+nn);
	   t2.setAttribute('name','sub'+nn);
      t2.setAttribute('readonly','true');	 
	 document.getElementById('txtHint').appendChild(t2); 
     document.getElementById('sub'+nn).value=1*v3;
  
  
  var t3=document.createElement('input');
  t3.setAttribute('type','button');
       t3.setAttribute('id','button'+nn);
	   t3.setAttribute('name','button'+nn);
	   t3.setAttribute('value','delete record');
	   t3.setAttribute('onclick','deleteRec('+nn+');');
	 document.getElementById('txtHint').appendChild(t3); 
  
  
  
  
  var p2=document.createElement('br');
  document.getElementById('txtHint').appendChild(p2);
	
 
 document.getElementById('txtHint2').innerHTML=null;	
	
	
	nn++;
	nnp++;
	document.getElementById('nnp').value=nnp;
document.getElementById('numberp').value=nn;	
updateTotal();	
	
	
}
function updateAll(val,val2,val3){

//alert(val.value+','+val2.value+','+val3.value)
	
	
	
if(isNaN(val2.value)){
	alert(val2.value+' is not a number');
	val2.value=1;
}
else{
	
val.value=(+val2.value)*(+val3.value);	
updateTotal();
}





}


function updateTotal(){
	
 total=0;
for(i=0;i<nn;i++){
if(document.getElementById('sub'+i)!=null)	
total=total+(+document.getElementById('sub'+i).value);	
	
	
	
}

document.getElementById('total2').innerHTML=total;	
document.getElementById('total').value=total;		

document.getElementById('total3').innerHTML=total-document.getElementById('discount').value;

	
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
nnp--;


document.getElementById('nnp').value=nnp;
updateTotal();





}

function showClient(str) {
	
	
  var val=document.getElementById('client').value.trim();

  if(val.length>0){


  
	var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById('txtHint4').innerHTML = this.responseText;
		
		var txtNewInputBox = document.createElement('div');
       txtNewInputBox.innerHTML = this.responseText;



document.getElementById('newElementId').appendChild(txtNewInputBox);
	document.getElementById('newElementId')= txtNewInputBox;	
      }
    };
    xmlhttp.open('GET','getclient.php?q='+val,true);
    xmlhttp.send();
  }
else{
	
	
	document.getElementById('txtHint4').innerHTML=null;
	document.getElementById('clientid').value='';
	
	
}	
	

  
}
function testval3(val1,val2){
		
document.getElementById('txtHint4').innerHTML=null;	
	
document.getElementById('client').value=val1;	
document.getElementById('clientid').value=val2;		
}


function submit_form1(){
	if(nnp>0)
	 document.forms['myform'].submit();
	else
	alert('Pas de produit');
	
}
function submit_form2(){
	
	
	
	
	
if(nnp>0){	
if(document.getElementById('clientid').value=='')
alert('CLIENT ID null');
else
{
	document.getElementById('reference').value='credit';
	document.forms['myform'].submit();


}


}	
else
alert('Pas de produit');

}


function displayDiscount(){
	var discount=prompt('Montant Discount');
	document.getElementById('discount2').innerHTML=discount;
	document.getElementById('discount').value=discount;
	
	document.getElementById('total3').innerHTML=document.getElementById('total').value-discount;
	
	
}




</script>";

menudisplay();
echo'<h1><i>VENTE</i></h1>




<div align="right">
<label style="font-size:30;">Sous-total: &nbsp&nbsp</label><label id="total2" style="font-size:30;"></label><label style="font-size:30;">&nbspHTG</label><br>
<label style="font-size:30;">Discount: &nbsp&nbsp</label><label style="font-size:30;" id="discount2"></label><label style="font-size:30;">&nbspHTG</label><br>
<label style="font-size:30;">Total: &nbsp&nbsp</label><label style="font-size:30;" id="total3"></label><label style="font-size:30;">&nbspHTG</label>
</div><br>
<div align="right">

<button onclick="submit_form1();">
   <img src="img/cash.jpg" alt="home" width="70" height="70" />
</button>
&nbsp&nbsp
<button onclick="submit_form2();">
   <img src="img/credit.jpg" alt="home" width="70" height="70" />
</button>
&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
<button onclick="displayDiscount();">
   <img src="img/discount.png" alt="home" width="70" height="70" />
</button>&nbsp&nbsp
</div>

<label>Produit </label><input type="text" name="findbox" id="findbox" onkeyup="sendKeyWord(this.id);"/>
<div id="txtHint2" ></div>


</head>

<body>
<form action="makesale.php" method="get" onsubmit="event.preventDefault();validateMyForm();" name="myform">	


<input type="hidden" id="numberp" name="numberp" value="" />
<input type="hidden" id="nnp" name="nnp" value="" />

<input type="hidden" id="reference" name="reference" value="" />
<input type="hidden" id="discount" name="discount" value="0" />
<input type="hidden" id="total" name="total" value="0" />
<br><br>

<label>Client </label><input type="text" id="client" name="client"  onkeyup="showClient(this.id);" autocomplete="off"  /><input type="hidden" id="clientid" name="clientid"/>


<hr>
<div id="txtHint4" ></div>
	<div id="txtHint" ></div>

<br><br>




</form>
</body>


</html>';
	 





?>