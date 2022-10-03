<?php 
 include 'mainphp.php';
echo"
<html><head><link rel='stylesheet' type='text/css' href='mystyle.css'/><script>

function setdate(){

	
	document.getElementById('createdate').value=new Date();
	
	
}

function validate(){
	const queryString = window.location.search;
console.log(queryString);
const urlParams = new URLSearchParams(queryString);	
const product = urlParams.get('res');
alert(console.log(product));	

}
function sendKeyWord(str) {
	
	
  var val=document.getElementById('keyWord').value;

  
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
    xmlhttp.open('GET','resultdepartement.php?q='+val,true);
    xmlhttp.send();
 
}
	
document.getElementById('txtHint').innerHTML=null;
  
}

function testval2(val3,val4){
		
document.getElementById('txtHint2').innerHTML=null;	
	
document.getElementById('keyWord').value=val3;	
document.getElementById('keyWord2').value=val4;		
}
function myFunction() {
	
	
  window.open('setdepartement.php', '_blank', 'toolbar=yes,scrollbars=yes,resizable=yes,top=500,left=500,width=400,height=300');
}

</script>"; 


echo"AJOUTER PRODUIT</head>
<body><form action='addproduit.php' method='get' >

<center>

<table>
<tr><td><label>Nom produit* </label></td><td><input type=text name=nomproduit id='nomproduit' autocomplete='off'/></td></tr>

<tr><td><label>description produit </label></td><td><input type=text name=descproduit id=descproduit /></td></tr>

<td></td><td><input name='createdate' type=text id=createdate value=".date('Y-m-d')."  /></td></tr>

<tr><td></td><td><button type=submmit >submmit</button></td></tr>
</table>

</center>


</body>


</html>





";




?>