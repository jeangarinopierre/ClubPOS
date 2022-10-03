<?php
include 'mainphp.php';




echo'<html><head>
<link rel="stylesheet" type="text/css" href="mystyle.css"/>
<script>



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
    xmlhttp.open("GET","resultfournisseur2.php?q="+val,true);
    xmlhttp.send();
 
	
	

  
}



function showdetails(p1,p2,p3,p4,p5){
	
	
	window.open("contactdetails.php?nom="+p1+"&prenom="+p2+"&telephone="+p3+"&telephone2="+p4+"&email="+p5, "_blank", "toolbar=yes,scrollbars=yes,resizable=yes,top=500,left=500,width=400,height=300");
	
}

</script>';

menudisplay();
echo'</head><body>
	<input type="text" id="date1" name="date1"  onkeyup="showUser(this.id);" />
	
<center>

<br><br><br><br>	<div id="txtHint" >Produit-----------------------------------------||||</div>
	
	<div>test</div>
</body></html>';
	 





?>