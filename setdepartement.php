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

</script>"; 

menudisplay();
echo"AJOUTER PRODUIT</head>
<body><form action='adddepartement.php' method='get' >

<center>

<table>
<tr><td><label>Nom Departement </label></td><td><input type=text name='nomdepartement' id='nomdepartement'/></td></tr>

<tr><td></td><td><input name='createdate' type=text id=createdate value=".date('Y-m-d')."  /></td></tr>

<tr><td></td><td><button type=submmit >submmit</button></td></tr>
</table>

</center>


</body>


</html>





";




?>