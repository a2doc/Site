
<?php

	//session_start();
	//$background = $_SESSION['background'] ;
	//$_SESSION['background'] ;
	//echo $_SESSION['background'] ;
	//$background = 'accueil';
?>


<!DOCTYPE html>
<html lang="fr">
 
 	<head>
 		<!-- En-tête du document  -->
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
 
 		<title>A2DOC, Association des docteurs et doctorants du Coria</title>

		<!-- Balise meta  -->
  		<meta name="title" content="A2DOC, Association des docteurs et doctorants du Coria" />
  		<meta name="description" content="présentation de l'association A2DOC"
		<!-- réfléchir à une liste de mots clés  -->
  		<meta name="keywords" content="mettre les mots clés ici" />
  		<meta name="Author" content="Maxime Eloy" />
 
  		<!-- Indexer et suivre -->
  		<meta name="robots" content="index,follow" />
 
  		<!--  Relier une feuille CSS externe  -->
		<link rel='stylesheet' href='css/style2.css' type='text/css' />		
		<link rel='stylesheet' href='css/960gs/reset.css' type='text/css' />
		<link rel='stylesheet' href='css/960gs/960_12_col.css' type='text/css' />
<!--		<link rel="stylesheet" href="css/bg_diaporama.css" type="text/css" />		-->

  	
 
  		<!-- Relier un fichier JavaScript  -->
  		<!--[if lt IE 9]>
			<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
  		<script type="text/javascript" src="votre-script.js"></script>
 
  		<!-- Incoporez du JavaScript dans la page  -->
  		<script type="text/javascript">
    		//alert("Voici un message d\'alerte!");
    		
    		var _gaq = _gaq || [];
		  _gaq.push(['_setAccount', 'UA-xxxxxxxx-x']);
		  _gaq.push(['_trackPageview']);
	
		  (function() {
			var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
			ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
			var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
		  })();
  		</script>
  		<noscript>La balise SCRIPT s'accompagne souvent
 		 de sa balise inverse : NOSCRIPT. Cette dernière contient
  		un message à afficher si le script n'est pas supporté.
 		 Vous n'est pas obligé de mettre cette balise.
  		</noscript>
 
 	</head>
 
 <!--
 	<body class="<?php/*
					//echo $_SESSION['background'] ;
					if ($_SESSION['background'] = 0) {
					//echo $_SESSION['background'];
					//echo $background;
					echo "accueil";
					}
					else {
					echo "vide";
					}
			*/	?>">
	-->	
	<body class="container_12">
	
 <!--	<div id="wrapper">	-->
			
			<?php 
			//include("php/includes/header.php");
			include("php/public/main.php");
			//include("php/public/footer.php");
			?>
			
<!--	</div>	-->
 
 	</body>
</html>


