<?php

include 'mainphp.php';
$n=0;
$con = mysqli_connect('localhost','root','Xternet19832020','kpos');
if (!$con) {
  die('Could not connect: ' . mysqli_error($con));
}

mysqli_select_db($con,"kpos");
$sql="select * ,datediff(date_expiration,curdate()) as viable from stock_item,produit where stock_item.produitid=produit.produitid and datediff(date_expiration,curdate())>90 order by viable asc ;";
$result = mysqli_query($con,$sql);

if($result=="")
{
echo("nothing to show");
}
else
{
	echo '<html><head><link rel="stylesheet" type="text/css" href="mystyle.css"/></head>';
	menudisplay();
	echo'<body><label>EXPIRED DATE REPORT</label><br>';
	
	while($row = mysqli_fetch_array($result)) {
  
  echo '<input readonly type="text"  id="hiddenid'.$n.'" value="'.$row['produitid'].'"/>
  <input type="text" readonly id="hiddenname'.$n.'" value="'.$row['nom'].'"/>
  <input type=text  readonly id="hiddenbarecode'.$n.'" value="'.$row['barcode'].'"/>
  <input type="text" readonly id=display'.$n.'  value="'.$row['viable'].'" />
  <input type="date" readonly id=display'.$n.'  value="'.$row['date_expiration'].'" /><br>';
  $n++;
  
}


	
	
	
}







$tempid=0;
$tempsomme=0;




mysqli_select_db($con,"kpos");
$sql="select * ,prixvente*quantite as subtotalvente from detail_vente,vente,produit where detail_vente.venteid=vente.venteid and detail_vente.produitid=produit.produitid and date(vente.datevente)=curdate();";
$result = mysqli_query($con,$sql);

if($result=="")
{
echo("email was not found");

//echo $sql;
}
else
{
	$n=0;
	echo'<br><br><label>TODAY SALES REPORT</label><br><table><tr>
 <th>venteid</th>
 <th>datevente</th>
 <th>nom</th>
 <th>description</th>
 <th>categorie </th>
 <th>prix_vente</th>
 <th>quantite</th>
 <th>subvente</th>
 </tr>';
	while($row = mysqli_fetch_array($result)) {
  
  //echo '<a href="setproduit.php?id='.$n.'&value='.$row['produitid'].'"   >edit</a><input readonly id=display'.$n.' style="font-size:20;" value="'.$row['nom'].'" size="50"/></br>';
 
 if($tempid!=$row['venteid'])
 {
	 $tempid=$row['venteid'];
	 echo'<tr>
 <td style="background-color:#FF0000"> <br> </td>
 <td style="background-color:#FF0000">   </td>
 <td style="background-color:#FF0000">   </td>
 <td style="background-color:#FF0000">   </td>
 <td style="background-color:#FF0000">   </td>
 <td style="background-color:#FF0000">   </td>
 <td style="background-color:#FF0000">   </td>
 <td style="text-align:center;background-color:#00FF00">'.$tempsomme.' HTG</td>
 </tr>';
 echo'<tr>
 <td> <br> </td>
 <td >   </td>
 <td >   </td>
 <td >   </td>
 <td >   </td>
 <td >   </td>
 <td >   </td>
 <td ></td>
 </tr>';
$tempsomme=0;	 
 }
echo'
 <tr>
 <td>'.$row['venteid'].' </td>
 <td>'.$row['datevente'].' </td>
 <td>'.$row['nom'].' </td>
 <td>'.$row['description'].' </td>
 <td>'.$row['categorie'].' </td>
 <td>'.$row['prixvente'].' HTG</td>
 <td>'.$row['quantite'].' </td>
 <td style="text-align:center">'.$row['subtotalvente'].' HTG</td>
 
 </tr>';

$tempsomme=$tempsomme+$row['subtotalvente'];




 $n++;
}
echo'<tr>
 <td> <br> </td>
 <td>   </td>
 <td>   </td>
 <td>   </td>
 <td>   </td>
 <td>   </td>
 <td>   </td>
 <td style="text-align:center;background-color:#00FF00" >'.$tempsomme.' HTG</td>
 </tr>';
 echo'</table>';	
	
	
	
}







$sql="select * , sum(quantite) as total from detail_vente,vente,produit where produit.produitid=detail_vente.produitid and vente.venteid=detail_vente.venteid and date(vente.datevente)=curdate() group by detail_vente.produitid order by total desc limit 5;";
$result = mysqli_query($con,$sql);

if($result=="")
{
echo("nothing to show");
}
else
{
	echo '<br><br><label>BEST SELLING PRODUCT TODAY REPORT</label><br>';
	
	while($row = mysqli_fetch_array($result)) {
  
  echo '<input readonly type="text"  id="hiddenid'.$n.'" value="'.$row['produitid'].'"/>
  <input type="text" readonly id="hiddenname'.$n.'" value="'.$row['nom'].'"/>
  <input type=text  readonly id="hiddenbarecode'.$n.'" value="'.$row['total'].'"/><br>';
  $n++;
  
}

}






$sql="select * from stock_item,produit where stock_item.produitid=produit.produitid and quantite<=10;";
$result = mysqli_query($con,$sql);

if($result=="")
{
echo("email was not found");

echo $sql;
}
else
{
	$n=0;
	
	echo '<br><br><label>LOW STOCK REPORT</label><br>';
	echo'<table><tr>
 
 <th>nom</th>
 <th>description</th>
 <th>quantite</th>
 </tr>';
	while($row = mysqli_fetch_array($result)) {
  
  //echo '<a href="setproduit.php?id='.$n.'&value='.$row['produitid'].'"   >edit</a><input readonly id=display'.$n.' style="font-size:20;" value="'.$row['nom'].'" size="50"/></br>';
 
echo'
 <tr>
 
 <td>'.$row['nom'].' </td>
 <td>'.$row['description'].' </td>
 <td>'.$row['quantite'].' </td>
 </tr>
 
 ';






 $n++;
}

 echo'</table>';	
	
	
	
}








mysqli_select_db($con,"kpos");
$sql="select * ,prixvente*quantite as subtotalvente from detail_vente,vente,produit where detail_vente.venteid=vente.venteid and detail_vente.produitid=produit.produitid and dtae(vente.datevente) between date_sub(curdate(),interval 7 day) and curdate();";
$result = mysqli_query($con,$sql);

if($result=="")
{
echo("email was not found");

//echo $sql;
}
else
{
	$n=0;
	echo'<br><br><label>LAST 7 DAYS SALES AMOUNT REPORT</label><br><table><tr>
 <th>venteid</th>
 <th>datevente</th>
 <th>nom</th>
 <th>description</th>
 <th>categorie </th>
 <th>prix_vente</th>
 <th>quantite</th>
 <th>subvente</th>
 </tr>';
	while($row = mysqli_fetch_array($result)) {
  
  //echo '<a href="setproduit.php?id='.$n.'&value='.$row['produitid'].'"   >edit</a><input readonly id=display'.$n.' style="font-size:20;" value="'.$row['nom'].'" size="50"/></br>';
 
 if($tempid!=$row['venteid'])
 {
	 $tempid=$row['venteid'];
	 echo'<tr>
 <td style="background-color:#FF0000"> <br> </td>
 <td style="background-color:#FF0000">   </td>
 <td style="background-color:#FF0000">   </td>
 <td style="background-color:#FF0000">   </td>
 <td style="background-color:#FF0000">   </td>
 <td style="background-color:#FF0000">   </td>
 <td style="background-color:#FF0000">   </td>
 <td style="text-align:center;background-color:#00FF00">'.$tempsomme.' HTG</td>
 </tr>';
 echo'<tr>
 <td> <br> </td>
 <td >   </td>
 <td >   </td>
 <td >   </td>
 <td >   </td>
 <td >   </td>
 <td >   </td>
 <td ></td>
 </tr>';
$tempsomme=0;	 
 }
echo'
 <tr>
 <td>'.$row['venteid'].' </td>
 <td>'.$row['datevente'].' </td>
 <td>'.$row['nom'].' </td>
 <td>'.$row['description'].' </td>
 <td>'.$row['categorie'].' </td>
 <td>'.$row['prixvente'].' HTG</td>
 <td>'.$row['quantite'].' </td>
 <td style="text-align:center">'.$row['subtotalvente'].' HTG</td>
 
 </tr>';

$tempsomme=$tempsomme+$row['subtotalvente'];




 $n++;
}
echo'<tr>
 <td> <br> </td>
 <td>   </td>
 <td>   </td>
 <td>   </td>
 <td>   </td>
 <td>   </td>
 <td>   </td>
 <td style="text-align:center;background-color:#00FF00" >'.$tempsomme.' HTG</td>
 </tr>';
 echo'</table>';	
	
	
	
}



mysqli_select_db($con,"kpos");
$sql="select * ,prixvente*quantite as subtotalvente from detail_vente,vente,produit where detail_vente.venteid=vente.venteid and detail_vente.produitid=produit.produitid and date(vente.datevente) between date_sub(curdate(),interval 30 day) and curdate();";
$result = mysqli_query($con,$sql);

if($result=="")
{
echo("email was not found");

//echo $sql;
}
else
{
	$n=0;
	echo'<br><br><label>LAST 30 DAYS SALES AMOUNT REPORT</label><br><table><tr>
 <th>venteid</th>
 <th>datevente</th>
 <th>nom</th>
 <th>description</th>
 <th>categorie </th>
 <th>prix_vente</th>
 <th>quantite</th>
 <th>subvente</th>
 </tr>';
	while($row = mysqli_fetch_array($result)) {
  
  //echo '<a href="setproduit.php?id='.$n.'&value='.$row['produitid'].'"   >edit</a><input readonly id=display'.$n.' style="font-size:20;" value="'.$row['nom'].'" size="50"/></br>';
 
 if($tempid!=$row['venteid'])
 {
	 $tempid=$row['venteid'];
	 echo'<tr>
 <td style="background-color:#FF0000"> <br> </td>
 <td style="background-color:#FF0000">   </td>
 <td style="background-color:#FF0000">   </td>
 <td style="background-color:#FF0000">   </td>
 <td style="background-color:#FF0000">   </td>
 <td style="background-color:#FF0000">   </td>
 <td style="background-color:#FF0000">   </td>
 <td style="text-align:center;background-color:#00FF00">'.$tempsomme.' HTG</td>
 </tr>';
 echo'<tr>
 <td> <br> </td>
 <td >   </td>
 <td >   </td>
 <td >   </td>
 <td >   </td>
 <td >   </td>
 <td >   </td>
 <td ></td>
 </tr>';
$tempsomme=0;	 
 }
echo'
 <tr>
 <td>'.$row['venteid'].' </td>
 <td>'.$row['datevente'].' </td>
 <td>'.$row['nom'].' </td>
 <td>'.$row['description'].' </td>
 <td>'.$row['categorie'].' </td>
 <td>'.$row['prixvente'].' HTG</td>
 <td>'.$row['quantite'].' </td>
 <td style="text-align:center">'.$row['subtotalvente'].' HTG</td>
 
 </tr>';

$tempsomme=$tempsomme+$row['subtotalvente'];




 $n++;
}
echo'<tr>
 <td> <br> </td>
 <td>   </td>
 <td>   </td>
 <td>   </td>
 <td>   </td>
 <td>   </td>
 <td>   </td>
 <td style="text-align:center;background-color:#00FF00" >'.$tempsomme.' HTG</td>
 </tr>';
 echo'</table>';	
	
	
	
}



$sql="select * , sum(quantite) as total from detail_vente,vente,produit where produit.produitid=detail_vente.produitid and vente.venteid=detail_vente.venteid and  date(vente.datevente) between date_sub(curdate(),interval 7 day) and curdate() group by detail_vente.produitid order by total desc limit 10;";
$result = mysqli_query($con,$sql);

if($result=="")
{
echo("nothing to show");
}
else
{
	echo '<br><br><label>BEST SELLING PRODUCT LAST 7 DAYS REPORT</label><br>';
	
	while($row = mysqli_fetch_array($result)) {
  
  echo '<input readonly type="text"  id="hiddenid'.$n.'" value="'.$row['produitid'].'"/>
  <input type="text" readonly id="hiddenname'.$n.'" value="'.$row['nom'].'"/>
  <input type=text  readonly id="hiddenbarecode'.$n.'" value="'.$row['total'].'"/><br>';
  $n++;
  
}

}

$sql="select * , sum(quantite) as total from detail_vente,vente,produit where produit.produitid=detail_vente.produitid and vente.venteid=detail_vente.venteid and  date(vente.datevente) between date_sub(curdate(),interval 30 day) and curdate() group by detail_vente.produitid order by total desc limit 10;";
$result = mysqli_query($con,$sql);

if($result=="")
{
echo("nothing to show");
}
else
{
	echo '<br><br><label>BEST SELLING PRODUCT LAST 30 DAYS REPORT</label><br>';
	
	while($row = mysqli_fetch_array($result)) {
  
  echo '<input readonly type="text"  id="hiddenid'.$n.'" value="'.$row['produitid'].'"/>
  <input type="text" readonly id="hiddenname'.$n.'" value="'.$row['nom'].'"/>
  <input type=text  readonly id="hiddenbarecode'.$n.'" value="'.$row['total'].'"/><br>';
  $n++;
  
}

}










$sql="select sum(prixvente*quantite) as subtotalvente from detail_vente,vente,produit where detail_vente.venteid=vente.venteid and detail_vente.produitid=produit.produitid and date(vente.datevente) between date_sub(now(),interval 7 day) and now();";
$result = mysqli_query($con,$sql);

if($result=="")
{
echo("nothing to show");
}
else
{
	echo '<br><br><label>TOTAL SALES LAST 7 DAYS REPORT</label><br>';
	
	while($row = mysqli_fetch_array($result)) {
  
  echo '<input type="text" readonly id="hiddenname'.$n.'" value="HTG '.$row['subtotalvente'].'"/>';
  $n++;
  
}

}



$sql="select sum(prixvente*quantite) as subtotalvente from detail_vente,vente,produit where detail_vente.venteid=vente.venteid and detail_vente.produitid=produit.produitid and date(vente.datevente) between date_sub(now(),interval 30 day) and now();";
$result = mysqli_query($con,$sql);

if($result=="")
{
echo("nothing to show");
}
else
{
	echo '<br><br><label>TOTAL SALES LAST 30 DAYS REPORT</label><br>';
	
	while($row = mysqli_fetch_array($result)) {
  
  echo '<input type="text" readonly id="hiddenname'.$n.'" value="HTG '.$row['subtotalvente'].'"/>';
  $n++;
  
}

}


$sql="select sum(prixvente*quantite) as subtotalvente from detail_vente,vente,produit where detail_vente.venteid=vente.venteid and detail_vente.produitid=produit.produitid and date(vente.datevente)=curdate();";
$result = mysqli_query($con,$sql);

if($result=="")
{
echo("nothing to show");
}
else
{
	echo '<br><br><label>TOTAL SALES TODAY REPORT</label><br>';
	
	while($row = mysqli_fetch_array($result)) {
  
  echo '<input type="text" readonly id="hiddenname'.$n.'" value="HTG '.$row['subtotalvente'].'"/>';
  $n++;
  
}

}

echo '</body></html>';



mysqli_close($con);
?>