<?php




echo'<html><head>

<script>

var i=0;
function removeit(t){
	
alert(t);	
	
}
function test(){

var txtNewInputBox = document.createElement("div");
txtNewInputBox.innerHTML = "<input type=text size=100 readonly id=newInputBox"+i+"> <button name=test id="+i+"  onclick=removeit(this.id)> remove</button>";
document.getElementById("newElementId").appendChild(txtNewInputBox);
/*the line below has to be replaced by data base data*/
document.getElementById("newInputBox"+i).value=document.getElementById("barecode").value;
document.getElementById("barecode").value="";
i++;

}


function showUser(str) {
  
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("txtHint").innerHTML = this.responseText;
      }
    };
    xmlhttp.open("GET","getuser.php?q="+str,true);
    xmlhttp.send();
  
}

</script>


</head><body>
	<input type="text" id="barecode" name="documentID" autocomplete="off" autofocus  onchange="test();" />
	
<center><br><br><br><br>	<div id="newElementId">New inputbox goes here:</div>
	<div id="txtHint"><b>Person info will be listed here...</b></div>
	<div><button onclick=showUser(this.value)>submmit</button></div></center>
	
</body></html>';
	 





?>