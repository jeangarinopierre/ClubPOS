<?php

include 'mainphp.php';


echo'<html><head>
<link rel="stylesheet" type="text/css" href="mystyle.css"/>
<script>



function showUser(str) {
	
	
  var val=document.getElementById("date1").value;
 var val2=document.getElementById("date2").value;
  
  var d1=new Date(val);
  var d2=new Date(val2);
  
  
  alert("date1="+val+" ,date2="+val2);
  
  if(val=="")
	  alert("date1 vide");
  if(d1.getTime()>d2.getTime())
	  alert("date 1 must be before date 2");
  
	/*var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("txtHint").innerHTML = this.responseText;
		
		//var txtNewInputBox = document.createElement("div");
txtNewInputBox.innerHTML = this.responseText;



//document.getElementById("newElementId").appendChild(txtNewInputBox);
	//document.getElementById("newElementId")= txtNewInputBox;	
      }
    };
    xmlhttp.open("GET","resultvente.php?q="+val,true);
    xmlhttp.send();
 
	
	

  
}





</script>';

menudisplay();
echo'</head><body>
	<input type="date" id="date1" name="date1"  autofocus />
	<input type="date" id="date2" name="date2"  autofocus  onchange="showUser(this.id);" />
	
<center>

<br><br><br><br>	<div id="txtHint" >Produit-----------------------------------------||||</div>
	
	
</body></html>';
	 





?>