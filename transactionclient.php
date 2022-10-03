<?php 

include 'mainphp.php';





echo"<html><head><link rel='stylesheet'  type='text/css' href='mystyle.css'/><script>";


if(isset($_GET['personneid'])){
$accountid=$_GET['accountid'];
$clientid=$_GET['personneid'];
$clientname=$_GET['clientname'];
$amount=$_GET['amount'];
$invoice=$_GET['invoicenum'];
$type=$_GET['type'];
$datetransaction=$_GET['datetransaction'];
$notes=$_GET['notes'];


echo"function initall(){
	
	document.getElementById('date1').readOnly=true;
	document.getElementById('fournissid').readOnly=true;
	
	
	document.getElementById('amount').value='".$amount."';
	document.getElementById('invoice').value='".$invoice."';
	document.getElementById('type').value='".$type."';
	document.getElementById('datetransaction').value='".$datetransaction."';
	document.getElementById('notes').value='".$notes."';
	document.getElementById('date1').value='".$clientname."';
	document.getElementById('fournissid').value='".$clientid."';
	
	document.getElementById('accountid').value='".$accountid."';
}








";



}



echo"function showUser(str) {
	
	
  var val=document.getElementById('date1').value.trim();

  if(val.length>0)
  {

  
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
    xmlhttp.open('GET','resultclient2.php?q='+val,true);
    xmlhttp.send();
  }
else	
{
	document.getElementById('txtHint').innerHTML=null;
	document.getElementById('fournissid').value='';
	
	
}

  
}



function testval(val1,val2){
		
document.getElementById('txtHint').innerHTML=null;	
	
document.getElementById('date1').value=val1;	
document.getElementById('fournissid').value=val2;		
getdetails();

}



var val10;
var val9='';
function testval2(val3,val4,val5,val6,val7,val8,ye2,mo2,da2,ye,mo,da,val11,val12){



document.getElementById('fournissid').value=val11;

document.getElementById('date1').value=val12;


getdetails();
	
}
function myFunction() {
	
	
  window.open('setproduit.php', '_blank', 'toolbar=yes,scrollbars=yes,resizable=yes,top=500,left=500,width=400,height=300');
}

function myFunction2() {
  window.open('setfournisseur.php', 'new Produit', 'toolbar=yes,scrollbars=yes,resizable=yes,top=500,left=500,width=400,height=300');
}


function getdetails(){
	
	var fournisseurid=document.getElementById('fournissid').value;
	
	


  


  
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
    xmlhttp.open('GET','resultfournisseuraccount.php?q='+fournisseurid,true);
    xmlhttp.send();
 
	
	
}



function submit_form(){
	nomclient=document.getElementById('date1').value.trim();
	amount=document.getElementById('amount').value.trim();
	datetransaction=document.getElementById('datetransaction').value.trim();
	
	
	if(nomclient.length==0||amount.length==0||datetransaction.length==0)
	{
	alert('* field are empty');
	}
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
echo"</head>
<body onload='initall();'><form action='transactionclient_.php' method='get' onsubmit='event.preventDefault();validateMyForm();' name='myform'>
<br><br><br><br><br>
<center><label>Nom Client</label><input type='text' id='date1' name='date1'  onkeyup='showUser(this.id);' autocomplete=off/><input type='text' id='fournissid' name='fournissid' onchange='getdetails();' hidden/>
<div id='txtHint' ></div>
<hr>
<table>

<tr>
<td><label>invoice #</label></td>
<td><input type=text name=invoice id=invoice onkeyup='checkNumber(this.id);' autocomplete=off/></td>
</tr>

<tr>
<td><label>amount</label></td>
<td><input type=text name=amount id=amount onkeyup='checkNumber(this.id);' autocomplete=off/></td>
</tr>

<tr>
<td><label>type</label></td>
<td><select name=type id=type><option>PAIEMENT</option><option>CREDIT</option></select></td>
</tr>

<tr>
<td><label>date transaction</label></td>
<td><input type=date name=datetransaction id=datetransaction /></td>
</tr>

<tr>
<td><label>Notes</label></td>
<td><textarea id=notes name=notes></textarea></td>
</tr>

<tr>
<td></td>
<td><button onclick='submit_form();'>Sauvegarder</button></td>
</tr>





<input type=hidden name='createdate'  id=createdate value=".date('Y-m-d')."  />
<input type=hidden name='accountid'  id='accountid'  />
</center>


</table>



</form></body>


</html>





";




?>