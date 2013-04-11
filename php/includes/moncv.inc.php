	<?php
     include("php/includes/header.php");
     ?>
 

 
<section class='grid_12'>

<h1 class='section_CV'>Mes compétences</h1>
	
<a href="#" onclick="displayPopup('Texte à afficher !'); return false"; class="grid_1 push_5" id="myButton">Modifier</a>

<SCRIPT language="javascript">
var displayPopup = function(text) {
	// Affiche la popup
	var popup = document.createElement('div');
	popup.id = 'popup';
	popup.style.width ='400px';
	popup.style.height ='200px';
	//var content = document.createTextNode(text);
	popup.innerHTML = "<h1 style=color:black; >Salutations !</h1>";
	//popup.appendChild(content);
	var body = document.getElementsByTagName('body');
	body[0].appendChild(popup);
		
	// Quitte la popup lorsqu'on clique dessus
	popup.onclick = function() {
			body[0].removeChild(popup);
		}
}
</SCRIPT>

</section>

<section class='grid_12'>

<h1 class='section_CV'>Ma formation</h1>
	
<a href="#"  class="grid_1 push_5" id="myButton" onclick="alert('ATTENTION')" >Modifier</a>

</section>