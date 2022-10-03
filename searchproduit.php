<?php
 include 'mainphp.php';

session_start();
if(!isset($_SESSION["nom"])){

		header("Location: login.php", true, 301);
exit();
	
	
}



echo'<html><head><link rel="stylesheet" type="text/css" href="mystyle.css"/>

<script>



function sendKeyWord(str) {
	
	
  var val=document.getElementById(str).value.trim();
 if(val.length>0){
  
  
	var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("txtHint").innerHTML = this.responseText;
		
		//var txtNewInputBox = document.createElement("div");
//txtNewInputBox.innerHTML = this.responseText;



//document.getElementById("newElementId").appendChild(txtNewInputBox);
	//document.getElementById("newElementId")= txtNewInputBox;	
      }
    };
    xmlhttp.open("GET","resultproduit.php?q="+val,true);
    xmlhttp.send();
 }
else{
	document.getElementById("txtHint").innerHTML=null;
	
	
	
}
	

  
}





</script><head>';

menudisplay();


echo'<h1>Recherche Produit</h1></head><body>
	<br><br><br><br><br><br><br><br><label>Recherche</label><input type="text" id="keyWord" name="keyWord"  autofocus  onKeyUp="sendKeyWord(this.id);" autocomplete=off  />
	
<center>

<br><br>	<div id="txtHint" ></div>
	
	
</body></html>';
	 





?>