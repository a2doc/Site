<footer class="container_12">

	<?php
	$dateCreation = 2011;
	$date = date("Y");
	$dateAffichage = ($dateCreation == $date) ? $date : "$dateCreation-$date";

	$footer = "	<p class=\"grid_12\">Copyright &copy; $dateAffichage - Maxime Eloy</p>	";
	echo $footer;


/*$footer = "
		<footer class=\"container_12\">
			<p class=\"grid_12\">Copyright &copy; $dateAffichage - Maxime Eloy</p>
				
		</footer>";
echo $footer;*/
	?>

	<p>
    	<a href="http://validator.w3.org/check?uri=referer">
    	<img src="http://www.w3.org/Icons/valid-html401" alt="Valid HTML 4.01 Transitional" style="border:0;height:31px;width:88px"></a>
  
   		<a href="http://jigsaw.w3.org/css-validator/check/referer/validator?profile=css3">
    	<img src="http://jigsaw.w3.org/css-validator/images/vcss" alt="CSS Valide !" style="border:0;height:31px;width:88px"></a>
    	
    	<a href="index.php?page=uneSeulePage"> Accès au Chat </a>
	</p>

</footer>