<?php




echo'<html><head>
<link rel="stylesheet" type="text/css" href="mystyle.css"/>
<script>



function sendKeyWord(str) {
	
	
  var val=document.getElementById("keyWord").value;

  
if(val.length>3)
{
  
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
    xmlhttp.open("GET","resultproduit2.php?q="+val,true);
    xmlhttp.send();
 
}
	
document.getElementById("txtHint").innerHTML=null;
  
}





</script>


</head><body>
	<input type="text" id="keyWord" name="keyWord"  onkeyup="sendKeyWord(this.id);" />
	
<center>

<br><br><br><br>	<div id="txtHint" >Produit-----------------------------------------||||</div>
	
	<div>test</div>
</body></html>';
	 





?>