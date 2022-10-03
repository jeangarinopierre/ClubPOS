<?php
 include 'mainphp.php';

session_start();
if(!isset($_SESSION["nom"])){

		header("Location: login.php", true, 301);
exit();
	
	
}
	

?>


<html>
<head>
<link rel="stylesheet" type="text/css" href="mystyle.css"/>

<?php echo menudisplay();?>


</head>
<body>
WELCOME <?php echo $_SESSION['nom']." ".$_SESSION['prenom'];?>
</body>






</html>