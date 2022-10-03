<?php 

include 'mainphp.php';





echo"<html><head><link rel='stylesheet'  type='text/css' href='mystyle.css'/><script>";


if(isset($_GET['accountid'])){
$transactionid=$_GET['accountid'];
$fournisseurid=$_GET['fournisseurid'];
$fournisseurname=$_GET['fournisseurname'];
$amount=$_GET['amount'];
$invoice=$_GET['invoicenum'];
$type=$_GET['type'];
$datetransaction=$_GET['datetransaction'];
$notes=$_GET['notes'];

echo"function initall(){
	
	document.getElementById('date1').readOnly=true;
	document.getElementById('fournissid').readOnly=true;
	
	document.getElementById('transactionid').value='".$transactionid."';
	document.getElementById('amount').value='".$amount."';
	document.getElementById('invoice').value='".$invoice."';
	document.getElementById('type').value='".$type."';
	document.getElementById('datetransaction').value='".$datetransaction."';
	document.getElementById('notes').value='".$notes."';
	document.getElementById('date1').value='".$fournisseurname."';
	document.getElementById('fournissid').value='".$fournisseurid."';
	
}








";



}



echo"function showUser(str) {
	
	
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


</script>";
menudisplay();
echo"</head>
<body onload='initall();'><form action='transactionfournisseur_.php' method='get'>

<center><label>Nom fournisseur</label><input type='text' id='date1' name='date1'  onkeyup='showUser(this.id);' /><input type='text' id='fournissid' name='fournissid' onchange='getdetails();'/><button onclick='myFunction2()'>ADD NEW FOURNISSEUR</button>
<div id='txtHint' >Produit-----------------------------------------||||</div>
<br>

<label>transactionid</label><input type=text name='transactionid' id='transactionid' /><br>
<label>amount</label><input type=text name=amount id=amount /><br>
<label>invoice #</label><input type=text name=invoice id=invoice /><br>
<label>type</label><select name=type id=type><option>DEBIT</option><option>CREDIT</option></select><br>
<label>date transaction</label><input type=date name=datetransaction id=datetransaction /><br>
<label>Notes</label><textarea id=notes name=notes></textarea><br>



<input name='createdate' type=text id=createdate value=".date('Y-m-d')."  />
</center>
<button type=submmit >submmit</button>





</form></body>


</html>





";




?>