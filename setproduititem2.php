<?php 

//$produitid=$_GET['value'];
//$nom=$_GET['nom'];




$con = mysqli_connect('localhost','root','Xternet19832020','kpos');
if (!$con) {
  die('Could not connect: ' . mysqli_error($con));
}

mysqli_select_db($con,"kpos");
$sql="SELECT * from produit";
$result = mysqli_query($con,$sql);

 $op="<select name=produitid>";
        

while($row = mysqli_fetch_array($result)) {
 
  $op= $op."<option value= ".$row['produitid'].">" . $row['nom']."|" .$row['description']."</option>";
  
}
  $op=$op."</select>";
  
  
   
  
  $sql="SELECT * from fournisseur";
$result = mysqli_query($con,$sql);

 $op2="<select name=fournisseurid>";
        

while($row = mysqli_fetch_array($result)) {
 
  $op2= $op2."<option value= ".$row['fournisseurid'].">" . $row['nom']."</option>";
  
}
  $op2=$op2."</select>";
    
mysqli_close($con);



echo'
<html><head><link rel="stylesheet" type="text/css" href="mystyle.css"><script>
function showResult(str) {
  if (str.length==0) {
    document.getElementById("livesearch").innerHTML="";
    document.getElementById("livesearch").style.border="0px";
    return;
  }
  var xmlhttp=new XMLHttpRequest();
  xmlhttp.onreadystatechange=function() {
    if (this.readyState==4 && this.status==200) {
      document.getElementById("livesearch").innerHTML=this.responseText;
      document.getElementById("livesearch").style.border="1px solid #A5ACB2";
    }
  }
  xmlhttp.open("GET","livesearch.php?q="+str,true);
  xmlhttp.send();
}';


echo" function setdate(){

	
	document.getElementById('createdate').value=new Date();
	
	
}

function noenter(){
return!(window.event&&window.event.keyCode==13);	
	
	
	
}

</script><h1>Produits</h1></head><body><form action='setproduititem_.php' method='get'>

<center>
<input type='text' size='30' onkeyup='showResult(this.value)'>
<div id='livesearch'></div>
<label>".$op."<br>


<label>barecode produit </label><input type=text name=barecode id=barecode onkeypress='return noenter()' /><br>
<label>prix vente produit </label><input type=text name=prixvente id=prixvente /><br>
<label>prix achat produit </label><input type=text name=prixachat id=prixachat /><br>
<label>date achat produit </label><input type=date name=dateachat id=dateachat /><br>
<label>quantite produit </label><input type=text name=quantite id=quantite /><br>
<label>fournisseur produit </label>".$op2."<br>
<label>date Expiration  produit </label><input type=date name=dateexpiration id=dateexpiration /><br>

<input name='createdate' type=text id=createdate value=".date('Y-m-d')."  />

<button type=submmit >submmit</button></center>
</form></body></html>";




?>