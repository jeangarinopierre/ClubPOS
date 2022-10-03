

<?php

session_start();

if(isset($_SESSION["para"]))
$param=$_SESSION["para"];
else
$param="";

?>


<html><head>
<link rel="stylesheet" type="text/css" href="mystyle.css"/>
<script>








</script>


</head><body>



<br><br><br><br><br><br><br><br><br><br><br><br><br>

	<center><img src="img/check-icon-png-clip-art.png" alt="Girl in a jacket" width="100" height="100"></br><br>
	<a href="index.php" > <img src="img/home-icon.png" alt="home" width="100" height="100"> </a>
	<?php




echo $param."</center>";

$param="";
?>
</body></html>
	 




