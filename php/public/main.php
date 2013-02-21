
<section class="container_12" id="main">
	

	

	<?php
	$page = isset($_GET['page']) ? $_GET['page'] : "accueil";

	define ("REP", "php/includes/");

	$tableau = glob(REP . "*.inc.php");
	$page = REP . $page . ".inc.php";

	if (in_array($page, $tableau)) {
	$inclusion = $page;
	}

		else {
		$inclusion = REP . "accueil.inc.php";
		}

	include "$inclusion"; 
	?>

	
</section>