<?php


$con = mysqli_connect('localhost','root','Xternet19832020','kpos');
if (!$con) {
  die('Could not connect: ' . mysqli_error($con));
}

mysqli_select_db($con,"kpos");
$sql="SELECT * from produit";
$result = mysqli_query($con,$sql);

 echo' <!DOCTYPE html>
<html>
<head>
<title>Page Title</title>
</head>
<body><div class="select-editable"> <select onchange="this.nextElementSibling.value=this.value">';
 
echo'<option value=""></option>';
        

while($row = mysqli_fetch_array($result)) {
 
  echo "<option>" . $row['produitid'] .$row['nom']."</option>";
  
}
  echo' </select>
    <input type="text" name="format" value="" />
</div></body>
</html>';
mysqli_close($con);
?>