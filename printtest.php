<?php
$numb = $_GET['numb'];
 
echo'<html>
<head></head>
<body onload="window.print();">
<center><h2>Pharmacie</h2>';

$i=0;
for($i=0;$i<$numb;$i++){
	
	
echo $_GET['line'.$i]."</br>";	
	
}






echo'</center></body></html>';

?>