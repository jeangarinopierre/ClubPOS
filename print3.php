
<?php

$datein=date('d-m-Y\ h:i:s');
echo'<html>
<head>
</head>
<body onload="window.print();" style="font-size:12px"><img src="background.jpeg" alt="home" width="50" height="50" />';

echo'<center><b>MELAHEL</b><br>
Quincaillerie<br>
<u>route de l\'aeroport&nbsp&nbspTel-38729254</u><br>
<b>Recu de Paiement</b>
</center>
';
echo$datein;
echo "&nbsp&nbsp Client#:".$_GET['client']."<br><br>";
echo"<div style = 'text-transform:uppercase;'><label>#Facture:---</label>".$_GET['numfacture']."</div>";
echo"<div style = 'text-transform:uppercase;'>Transaction:---</label>".$_GET['type']."</div>";
echo"<div style = 'text-transform:uppercase;'><label>Montant:---</label><b>".$_GET['amount']." HTG</b></div>";

echo"<div style = 'text-transform:uppercase;'>".$_GET['notes']."</div>";
echo"<right>Caissier :". $_GET['utilisateur']."</right></div>";


echo'</body></html>';


?>