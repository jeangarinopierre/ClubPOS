<?php
include 'mainphp.php';

?>





<html><head>
<link rel='stylesheet' type='text/css' href='mystyle.css'/>
<script>
qty=0;
n=0;
p=0;
var pid;
var np;
var pp;	
var qp; 


function shooseProduit() {
	
//alert("choose produit");



 
 
 var txtNewInputBox = document.createElement("div");

 txtNewInputBox.innerHTML = "-<input type='hidden' id='produit"+n+"' name='produit"+n+"' value='"+pid+"'  /><input type='text' id='produits"+n+"' name='produits"+n+"' value='"+np+"' /><input type='text' id='ordernum"+n+"' name='ordernum"+n+"' value='0' onchange='updateAll(ordernum"+n+",unitprice"+n+",total"+n+",qtyr"+n+",qtyd"+n+");' /><input type='text' id='unitprice"+n+"' name='unitprice"+n+"' value='"+pp+"' onchange='updateAll(ordernum"+n+",unitprice"+n+",total"+n+",qtyr"+n+",qtyd"+n+");'/><input type='text' id='total"+n+"' name='total"+n+"' value='"+pp+"' readonly /><input type='text' id='qtyr"+n+"' name='qtyr"+n+"' value='0' onchange='updateAll(ordernum"+n+",unitprice"+n+",total"+n+",qtyr"+n+",qtyd"+n+");'/><input type='text' id='qtyd"+n+"' name='qtyd"+n+"' value='0' readonly /><input type='text' id='vf' name='vf' value='"+qp+"' /><button  id='"+n+"' name='"+n+"' onclick='removeproduit(this.id);' >REMOVE</button>";
document.getElementById("test").appendChild(txtNewInputBox);


n++;
qty++;
 document.getElementById("quant").value=qty; 
 updateQty();
 
 document.getElementById("keyWord").value="";
 document.getElementById("keyWord2").value="";
 document.getElementById("tot").value=n;
}

function removeproduit(t){
	


var s="produits"+t;
	//alert(s);
	
	document.getElementById(s).remove();
	qty--;
	document.getElementById("quant").value=qty; 
	updateQty();
}

function updateAll(t1,t2,t3,t4,t5){
	
	//alert(t1.value+","+t2.value+","+t3.value);
	t3.value=0;
	t3.value=t1.value*t2.value;
	
	
	t5.value=t1.value-t4.value;
	
	updateQty();
}

function saveAll(){
	
	
	//var s1=document.getElementById("prod").value;
	var s2=document.getElementById("fournisseur").value;
	var s3=document.getElementById("postatus").value;
	var s4=document.getElementById("shipaddress").value;
	var s5=document.getElementById("billaddress").value;
	
	var s6=document.getElementById("orderdate").value;
	var s7=document.getElementById("shipdate").value;
	var s8=document.getElementById("canceldate").value;
	var s9=document.getElementById("paymentduedate").value;
	
	
	
	//alert(s2+","+s3+","+s4+","+s5+","+s6+","+s7+","+s8+","+s9);
	
	
	
}

function updateQty(){
	
//alert(n);	
	var g=0;
	var h=0;
	var f=0;
	var k="";
	var m="";
var sub=0;	
	var o="";
for(l=0;l<n;l++ ){
	
k="ordernum"+l;	
m="qtyr"+l;
o="qtyd"+l;
g=g+parseInt(document.getElementById(k).value);	
h=h+parseInt(document.getElementById(m).value);	
f=f+parseInt(document.getElementById(o).value);	

sub=sub+parseInt(document.getElementById("total"+l).value);



	
}	



document.getElementById("subtotal").value=sub;	
document.getElementById("qtyor").value=g;
document.getElementById("qtyr").value=h;
document.getElementById("qtyd").value=f;	
}

function showUser(str) {
	
	
  var val=document.getElementById("date1").value;

  


  
	var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("txtHint").innerHTML = this.responseText;
		
		var txtNewInputBox = document.createElement("div");
       txtNewInputBox.innerHTML = this.responseText;



document.getElementById("newElementId").appendChild(txtNewInputBox);
	document.getElementById("newElementId")= txtNewInputBox;	
      }
    };
    xmlhttp.open("GET","resultfournisseur.php?q="+val,true);
    xmlhttp.send();
 
	
	

  
}

function testval(val1,val2){
		
document.getElementById("txtHint").innerHTML=null;	
	
document.getElementById("date1").value=val1;	
document.getElementById("fournissid").value=val2;		
}

function testval2(val3,val4,val5,val6){
		
document.getElementById('txtHint').innerHTML=null;	
	
document.getElementById('keyWord').value=val3;	
document.getElementById('keyWord2').value=val4;	
//alert(val5);







pid=val4;
np=val3;
pp=val6;	
qp=val5; 

shooseProduit();
	
}

function sendKeyWord(str) {
	
	
  var val=document.getElementById('keyWord').value;

  
if(val.length>3)
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
    xmlhttp.open('GET','resultproduit2.php?q='+val,true);
    xmlhttp.send();
 
}
	
document.getElementById('txtHint').innerHTML=null;
  
}

</script>

<?php 
menudisplay();
?>
</head><body><form action="makepo.php" method="get" ><header >

<table style="width:100%"  >
<tr>
<th></th><th></th><th style='width:50px'></th>


</tr>
<tr>
<td><label>PO#:</label><input type='text' name='ponumber' id='ponumber' value='0002355' /></td><td rowspan="4" align='right'><textarea rows='10' id='shipaddress' name='shipaddress' ></textarea>--<textarea rows='10' id='billaddress' name='billaddress'></textarea></td><td align='right' ><label>Order Date:</label><input type='date' id='orderdate' name='orderdate'/></td>
</tr>

<tr>
<td><label>VENDEUR:</label><input type="text" id="date1" name="date1"  onkeyup="showUser(this.id);" /><input type="text" id="fournissid" name="fournissid"/></td><td align='right'><label>Ship Date:</label><input type='date' id='shipdate' name='shipdate'/></td>
</tr>

<tr>
<td><?php echo "<select id='postatus' name='status'  ><option>Open</option><option>closed</option></select><br>" ;?></td><td align='right'><label>Cancel Date:</label><input type='date' id='canceldate' name='canceldate'/></td>
</tr>

<tr>
<td><label>produit</label><input type='text' id='keyWord' name='keyWord'  onkeyup='sendKeyWord(this.id);' /><input type='text' id='keyWord2' onchange='shooseProduit();'/><br>

</td><td align='right'><label>User:</label><input type='text'/></td>
</tr>



</table>


</header>
                                                                   </div>
<div id="txtHint" >Produit-----------------------------------------||||</div>

<br><br><br> 
<div id="test" ></div>
</div>
<br><br><br>
<table>
<tr>
<td>No. of Items :<input type='text' id='quant' name='quant' value='0'/></td><td rowspan='2'>instructions <input type='text' id='instructions' name='instructions' /></td><td></td><td>SubTotal <input type='text' id='subtotal' name='subtotal'/></td>
</tr>
<tr>
<td>Qty Ordered :<input type='text' id='qtyor' name='qtyor' value='0'/></td><td></td><td></td><td></td>
</tr>
<tr>
<td>Qty Received :<input type='text' id='qtyr' name='qtyr' value='0'/></td><td>Terms<input type='text' id='terms'name='terms'/></td><td></td><td>Discount <input type='text'/></td>
</tr>
<tr>
<td>Unfilled %:</td><td>Payment Due Date<input type='date' id='paymentduedate' name='paymentduedate'/></td><td></td><td>fee <input type='text'/></td>
</tr>
<tr>
<td>Qty Due:<input type='text' id='qtyd' name='qtyd' value='0'/></td><td></td><td></td><td>Total <input type='text'/></td>
</tr>

</table><input type='text' id='tot' name='tot' value='0'/>
<button onclick='saveAll();' >save & print</button>
</form></body></html>