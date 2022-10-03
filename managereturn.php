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

echo'<html><head><link rel="stylesheet"  type="text/css" href="mystyle.css"/><script>



function showUser(str) {
	
	
  var val=document.getElementById(str).value;
 if(val.length>0){
	 
	 	var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("txtHint").innerHTML = this.responseText;
		
      }
    };
    xmlhttp.open("GET","getreturn.php?q="+val,true);
    xmlhttp.send();
	 
	 
 }
 else{
	 
	document.getElementById("txtHint").innerHTML=null; 
	 
	 
 } 
  

 
	
	

  
}

function openline(n,va0,va1,va2,va3,va4,va5,va6,va7,va8,va9,va10,va11){

	var f=prompt("enter the quantity of "+va7+" to return from "+va11+" produitid "+va0);
	
	if(f>va11||f=="")
	alert("value too high or field empty");
else
	if(f!=null)
	document.getElementById("quantitee"+n+"").value=f;
	
}

function makereturn(){

var k=document.getElementById("qty").value;
	
urll="";



	
for(i=0;i<k;i++){
	
urll=urll+"pid"+i+"="+document.getElementById("pproduitid"+i).value+"&";	
	
urll=urll+"quantit"+i+"="+document.getElementById("quantitee"+i).value+"&";	
	
	
}	
urll=urll+"qty="+k+"&venteid="+document.getElementById("venteid").value;	
//alert("# produit "+k+" venteid "+document.getElementById("venteid").value+" id0 "+);	
//alert(urll);	
executereturn(urll)	;
alert("return done");
document.getElementById("txtHint").innerHTML=null;
showUser("date1");
}


function executereturn(str) {
	
	
  
 
  
  
	var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("txtHint").innerHTML = this.responseText;
		
      }
    };
    xmlhttp.open("GET","returnproduct.php?"+str,true);
    xmlhttp.send();
 
	
	

  
}

</script>';

menudisplay();
echo'<h1>Retour</h1></head><body>
	<br><br><br><br><br><br><br><br>
	<label># Fiche</label><input type="text" id="date1" name="date1"  autofocus  onkeyup="showUser(this.id);" autocomplete=off  />
	
	
<center>

<br><div id="txtHint" ></div>

	<button onclick="makereturn();">Sauvegarder</button>
	
</body></html>';
	 





?>