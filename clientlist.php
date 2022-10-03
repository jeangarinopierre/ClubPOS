<?php

include 'mainphp.php';


echo'<html><head>
<link rel="stylesheet" type="text/css" href="mystyle.css"/>
<script>



function showUser(str) {
	
	
  var val=document.getElementById("date1").value.trim();

  if(val.length>0){


  
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
    xmlhttp.open("GET","resultclient.php?q="+val,true);
    xmlhttp.send();
  }
  else{
	  
	   document.getElementById("txtHint").innerHTML=null;
	  
	  
  }
	
	

  
}





</script>';
menudisplay();
echo'


<h1>Rechercher Client</h1></head><body>
	<br><br><br><br><br><label>Recherche</label><input type="text" id="date1" name="date1"  onkeyup="showUser(this.id);"  autocomplete=off />
	
<center>

<br><br><br><br>	<div id="txtHint" ></div>
	
	
</body></html>';
	 





?>