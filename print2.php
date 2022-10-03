
<?php

$datein=date('d-m-Y\ h:i:s');
echo'<html>
<head>
</head>
<body onload="window.print();" style="font-size:12px"><img src="background.jpeg" alt="home" width="50" height="50" />';

echo'<center><b>MELAHEL</b><br>
Quincaillerie<br>
<u>route de l\'aeroport&nbsp&nbspTel-38729254</u><br>
<b>Proforma</b>
</center>
';
echo$datein;
echo "&nbsp&nbsp Client#:".$_GET['client']."<br><br>";
$total=$_GET['total'] - $_GET['discount'];
echo"<div style = 'text-transform:uppercase;'>".$_GET['test']."</div>";

echo "<br><div align='left'>Sous-Total------------: <b>".number_format($_GET['total'],2)." HTG</b><br>";
                  echo "Discount--------------: <b>".number_format($_GET['discount'])." HTG</b><br>";
               echo "<b>TOTAL</b>--------------: <b><u>".number_format($total,2)." HTG</u></b><br>";
echo"<right>Caissier :". $_GET['utilisateur']."</right><br><b>Valable pour 15 Jours !!!</b></div>";


echo'</body></html>';


?>