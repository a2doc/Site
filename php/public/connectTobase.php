<!-- CONNECTION A LA BASE -->
<?php
   try
     {
	 $bdd = new PDO('mysql:host=localhost;dbname=a2doc', 'root', '');
     $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
	 $code_a2doc=1234;
     }
  catch(Exception $e)
    {
	// En cas d'erreur, on affiche un message et on arrte tout
        die('Erreur : '.$e->getMessage());
    }
		
?>

