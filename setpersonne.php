<?php 
include 'mainphp.php';
echo"
<html><head><link rel='stylesheet' type='text/css' href='mystyle.css'/><script>

function setdate(){

	
	document.getElementById('createdate').value=new Date();
	
	
}

</script>"; 

menudisplay();

echo"


Produits</head>
<body><form action='setpersonne_.php' method='get'>

<center><label>Nom</label><input type=text name=nom id='nom'/><br>

<label>Prenom</label><input type=text name=prenom id=prenom /><br>

<label>Sex</label>
<select name=sex>
<option>M</option>
<option>F</option>
</select><br>
<label>CIN</label><input type=text name=cin id=cin /><br>
<label>Date Naissance</label><input type=date name=date_naissance id=date_naissance /><br>
<label>Email</label><input type=text name=email id=email /><br>
<label>Telephone</label><input type=text name=telephone id=telephone /><br>




<input name='createdate' type=text id=createdate value=".date('Y-m-d')."  />
</center>
<button type=submmit >submmit</button>





</body>


</html>





";




?>