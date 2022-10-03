<?php
 
 $n=0;
 $nom[]="";
$total[]="";
 
 $con = mysqli_connect('localhost','root','Xternet19832020','kpos');
if (!$con) {
  die('Could not connect: ' . mysqli_error($con));
}

mysqli_select_db($con,"kpos");
 
 
 $sql="select * , sum(quantite) as total from detail_vente,vente,produit where produit.produitid=detail_vente.produitid and vente.venteid=detail_vente.venteid and  date(vente.datevente) between date_sub(curdate(),interval 7 day) and curdate() group by detail_vente.produitid order by total desc limit 11;";
$result = mysqli_query($con,$sql);

if($result=="")
{
echo("nothing to show");
}
else
{
	echo '<br><br><label>BEST and WORST</label><br>';
	
	while($row = mysqli_fetch_array($result)) {
  
$nom[$n]=$row['nom'];
$total[$n]=$row['total'];

  $n++;
  
}

}


$dataPoints = array( 
	array("y" => $total[0], "label" => $nom[0] ),
	array("y" => $total[1], "label" => $nom[1] ),
	array("y" => $total[2], "label" => $nom[2] ),
	array("y" => $total[3], "label" => $nom[3] ),
	array("y" => $total[4], "label" => $nom[4] ),
	array("y" => $total[5], "label" => $nom[5] ),
	array("y" => $total[6], "label" => $nom[6] ),
	array("y" => $total[7], "label" => $nom[7] ),
	array("y" => $total[8], "label" => $nom[8] ),
	array("y" => $total[9], "label" => $nom[9] ),
	array("y" => $total[10], "label" => $nom[10])
);
 
 
 $n=0;
 
 $sql="select * , sum(quantite) as total from detail_vente,vente,produit where produit.produitid=detail_vente.produitid and vente.venteid=detail_vente.venteid and  date(vente.datevente) between date_sub(curdate(),interval 30 day) and curdate() group by detail_vente.produitid order by total desc limit 11;";
$result = mysqli_query($con,$sql);

if($result=="")
{
echo("nothing to show");
}
else
{
	
	
	while($row = mysqli_fetch_array($result)) {
  
$nom[$n]=$row['nom'];
$total[$n]=$row['total'];

  $n++;
  
}

}
 
 $dataPoints2 = array( 
	array("y" => $total[0], "label" => $nom[0] ),
	array("y" => $total[1], "label" => $nom[1] ),
	array("y" => $total[2], "label" => $nom[2] ),
	array("y" => $total[3], "label" => $nom[3] ),
	array("y" => $total[4], "label" => $nom[4] ),
	array("y" => $total[5], "label" => $nom[5] ),
	array("y" => $total[6], "label" => $nom[6] ),
	array("y" => $total[7], "label" => $nom[7] ),
	array("y" => $total[8], "label" => $nom[8] ),
	array("y" => $total[9], "label" => $nom[9] ),
	array("y" => $total[10], "label" => $nom[10])
);

mysqli_close($con);
?>
<!DOCTYPE HTML>
<html>
<head>
<script>
window.onload = function() {
 
var chart = new CanvasJS.Chart("chartContainer", {
	animationEnabled: true,
	theme: "light2",
	title:{
		text: "BEST SELLING PRODUCT LAST 7 DAYS"
	},
	axisY: {
		title: "Quantite produit"
	},
	data: [{
		type: "column",
		yValueFormatString: "#,##0.## Unite",
		dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
	}]
});
chart.render();


var chart = new CanvasJS.Chart("chartContainer2", {
	animationEnabled: true,
	theme: "light2",
	title:{
		text: "BEST SELLING LAST 30 DAYS"
	},
	axisY: {
		title: "Gold Reserves (in tonnes)"
	},
	data: [{
		type: "column",
		yValueFormatString: "#,##0.## tonnes",
		dataPoints: <?php echo json_encode($dataPoints2, JSON_NUMERIC_CHECK); ?>
	}]
});
chart.render();
 
}
</script>
</head>
<body>
<div style="width: 100%;" >
<div id="chartContainer" style="height: 370px; width: 70%;"></div>
<div id="chartContainer2" style="height: 370px; width: 70%;"></div>
</div>
<script src="canvasjs-3.0.5/canvasjs.min.js"></script>
</body>
</html>                       