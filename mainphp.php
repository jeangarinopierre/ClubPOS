<?php

function menudisplay(){
echo'<ul>
 
<li><a href="index.php">Home</a></li> 
<li><a href="sell.php">Vente</a></li>


<li class="dropdown">
    <a href="javascript:void(0)" class="dropbtn">Produit</a>
    <div class="dropdown-content">
<a href="setproduititem.php">ajouter/enregistrer produit/modifier</a>
<a href="searchproduit.php">rechercher produit</a>
</div>
</li>

<li class="dropdown">
    <a href="javascript:void(0)" class="dropbtn">Retour</a>
    <div class="dropdown-content">
<a href="searchvente.php">searchvente</a>
 <a href="managereturn.php">faire un retour</a>
 </div>
</li>
<li class="dropdown">
    <a href="javascript:void(0)" class="dropbtn">Client</a>
    <div class="dropdown-content">
<a href="clientlist.php">Liste Client</a>
<a href="editclient.php">Ajouter Client</a>
<a href="compteclient.php">Compte client</a>
<a href="transactionclient.php">Transactions client</a>
 </div>
</li>
 
 <li class="dropdown">
    <a href="javascript:void(0)" class="dropbtn">Utilisateur</a>
    <div class="dropdown-content">
<a href="setutilisateur.php">creer utilisateur</a>
<a href="utilisateurlist.php">liste utilisateur</a>
<a href="promoteutilisateur.php">promote utilisateur</a>

 </div>
</li>


<li class="dropdown">
    <a href="javascript:void(0)" class="dropbtn">Facture</a>
    <div class="dropdown-content">
<a href="Invoice.php">Entrer Facture</a>
<a href="listefacture.php">Liste Facture</a>
</div>
</li>






<li><a href="Proforma.php">Proforma</a></li>
<li><a href="Logout.php">Logout</a></li>
 </ul>';

}


function OperationSuccess(){
	header("location:success.php");

	
	
	//echo'<center><img src="img/check-icon-png-clip-art.png" alt="Girl in a jacket" width="100" height="100"></br><br>';

	//header("Location:setproduit.php?res=1&");
}


function OperationSuccess2(){
	header("location:success2.php");

	
	
	//echo'<center><img src="img/check-icon-png-clip-art.png" alt="Girl in a jacket" width="100" height="100"></br><br>';

	//header("Location:setproduit.php?res=1&");
}
function OperationSuccess3(){
	header("location:success3.php");

	
	
	//echo'<center><img src="img/check-icon-png-clip-art.png" alt="Girl in a jacket" width="100" height="100"></br><br>';

	//header("Location:setproduit.php?res=1&");
}

function OperationFail(){
	header("location: faillure.php");
	
	
}










?>