<?php 
include 'mainphp.php';
echo"<html><head><link rel='stylesheet'  type='text/css' href='mystyle.css'/><script>






function showClient(str) {
	
	
  var val=document.getElementById('date1').value;

  


  
	var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById('txtHint').innerHTML = this.responseText;
		
		var txtNewInputBox = document.createElement('div');
       txtNewInputBox.innerHTML = this.responseText;



document.getElementById('newElementId').appendChild(txtNewInputBox);
	document.getElementById('newElementId')= txtNewInputBox;	
      }
    };
    xmlhttp.open('GET','resultclient2.php?q='+val,true);
    xmlhttp.send();
 
	
	

  
}



function testval(val1,val2){
		
document.getElementById('txtHint').innerHTML=null;	
	
document.getElementById('date1').value=val1;	
document.getElementById('fournissid').value=val2;		
getdetails();

}



var val10;
var val9='';
function testval2(val3,val4,val5,val6,val7,val8,ye2,mo2,da2,ye,mo,da,val11,val12){



document.getElementById('fournissid').value=val11;

document.getElementById('date1').value=val12;


getdetails();
	
}


function getdetails(){
	
	var fournisseurid=document.getElementById('fournissid').value;
	
	var fournisseurname=document.getElementById('date1').value;


  


  
	var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById('txtHint2').innerHTML = this.responseText;
		
		var txtNewInputBox = document.createElement('div');
       txtNewInputBox.innerHTML = this.responseText;



document.getElementById('newElementId').appendChild(txtNewInputBox);
	document.getElementById('newElementId')= txtNewInputBox;	
      }
    };
    xmlhttp.open('GET','resultclientaccount.php?q='+fournisseurid+'&fournisseurname='+fournisseurname,true);
    xmlhttp.send();
 
	
	
}


</script>";
menudisplay();
echo"</head>
<body><form action='setproduititem_.php' method='get' onsubmit='event.preventDefault();validateMyForm();' name='myform'>
<br><br><br><br><br>
<center><label>Nom Client</label><input type=text id=date1 name=date1 onkeyUp='showClient(this.id);' autocomplete=off/><input type='text' id='fournissid' name='fournissid' onchange='getdetails();' hidden/>
<div id='txtHint' ></div>
<br>



<div id='txtHint2' ></div>

</center>






</form></body>


</html>





";




?>