

<!DOCTYPE html>
<html lang="fr">


<!-- test commit  github    -->

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
		<link rel='stylesheet' href='css/style.css' type='text/css' />		
		<link rel='stylesheet' href='css/960gs/reset.css' type='text/css' />
		<link rel='stylesheet' href='css/960gs/960_12_colmax.css' type='text/css' />
  	
 
  		<!-- Relier un fichier JavaScript  -->
  		<!--[if lt IE 9]>
			<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
 <!-- 		<script type="text/javascript" src="votre-script.js"></script>
 
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
 

	<body>
	
		<section class="container_12">
			<div class="" id="accueil">		
				<nav>
					<ul class="container_12">
						<li class="grid_3 push_8" id="presentation"><a href="index2.php?page=presentation" title="presentation">Présentation</a></li>

						<li class="grid_3 push_8" id="contain">
						
							<?php
								if (!isset($_GET['view1']) && !isset($_GET['view2'])){
									$_GET['view1']='visible';
									$_GET['view2']='hidden';
								}
							?>
							
							<div id="contenu_1" style="position:absolute;box-shadow: 1px 1px 10px 1px #7f7f7f; width:220px; background-color:#009933; visibility:<?php echo $_GET['view1'] ?>">
								<p id="communautee"> Communauté</p>
							</div>
                        
							<div id="contenu_2" style="position:absolute;box-shadow: 1px 1px 10px 1px #7f7f7f; width:220px; visibility:<?php echo $_GET['view2'] ?>">
						   
							<?php
								include('php/includes/identity.php');   
							?>
						   
							</div> 
						</li>
					</ul>

					<ul class="container_12">
						<li class="grid_3 push_8" id="contact"><a href="index2.php?page=contact" title="contact">Adhésion / Contact</a></li>
						<li class="grid_3 push_8" id="cvtheque"><a href="index2.php?page=cvtheque" title="cvtheque">CVthèque</a></li>
					</ul>
				</nav>
			</div>
		</section>


        <script>
 	    
			var contain = document.getElementById('contain'),
			contenu_1 = document.getElementById('contenu_1'),
			login = document.getElementById('login-form'),          
			contenu_2 = document.getElementById('contenu_2');
          

			contain.onmouseover = function(e) {
				contenu_1.style.visibility = 'hidden';
				contenu_2.style.visibility = 'visible';
				login.style.visibility = 'visible';

			};

			contain.onmouseout = function(e) {
				contenu_1.style.visibility = 'visible';
				contenu_2.style.visibility = 'hidden';
				login.style.visibility = 'hidden';

			};

		</script>
    	
 	</body>
</html>


