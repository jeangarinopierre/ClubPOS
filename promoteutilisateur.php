<?php 
include 'mainphp.php';
echo"
<html><head><link rel='stylesheet' type='text/css' href='mystyle.css'/><script>

function setdate(){

	
	document.getElementById('createdate').value=new Date();
	
	
}
function showUser(str) {
	
	
  var val=document.getElementById('nom').value;

  


  
	var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById('txtHint').innerHTML = this.responseText;
		
		var txtNewInputBox = document.createElement('div');
       txtNewInputBox.innerHTML = this.responseText;



//document.getElementById('newElementId').appendChild(txtNewInputBox);
	//document.getElementById('newElementId')= txtNewInputBox;	
      }
    };
    xmlhttp.open('GET','resultpersonne.php?q='+val,true);
    xmlhttp.send();
 
	
	

  
}

function testval(val1,val2){
		
document.getElementById('txtHint').innerHTML=null;	
	
document.getElementById('nom').value=val1;	
document.getElementById('pid').value=val2;		
}
</script>";

menudisplay();
echo"Produits</head>
<body><form action='promoteutilisateur_.php' method='get'>
<label>UTILISATEUR:</label><input type='text' id='nom' name='nom'  onkeyup='showUser(this.id);' /><input type='text' id='pid' name='pid'/>
<div id='txtHint' >Produit-----------------------------------------||||</div>
<select name=role>
<option value=administrator >Administrator</option>
<option value=Caissier >Caissier</option>
<option value=Associate >Associate</option>
</select><br>
<label>username</label><input type=text name=username id=username /><br>
<label>password</label><input type=password name=password id=password /><br>
<label>password2</label><input type=password name=password2 id=password2 /><br>


<input name='createdate' type=text id=createdate value=".date('Y-m-d')."  />
</center>
<button type=submmit >submmit</button>





</body>


</html>





";




?>