
	<!---------------------------------------------------------->
	<!-------------- CONNEXION A LA BASE ----------------------->
	<!---------------------------------------------------------->
		<?php
		 include '../php/public/connectTobase.php'; 	

		 ?>
	<!-- INSERTION DANS LA BASE DES COMPETENCES -->
<?php
 $login='toto';
	try
	{
		if( isset($_POST['competence']))
		{
		$competence=$_POST['competence'];		
		}
		if( isset($_POST['selection']))
		{
		$competence=$_POST['selection'];
		$sql =  "INSERT INTO a2doc.competences 
				(idCompetences, Competences) VALUES (NULL, '$competence')";
		$req = $bdd->prepare($sql); 
		$req->execute();
		}		
		
		// CHERCHE LES ID de adherents
			
		$req = $bdd->query("SELECT idadherents FROM adherents WHERE adherents.nom='$login'");
		$id_adherent = $req->fetch();
		$id_ad = $id_adherent['0'] ;
		
		
		// FAIRE SI COMPETENCE EST AUTRE (inconnue de la table)
		// AJOUTE LA COMPETENCE AUTRE DANS LA TABLE COMPETENCE
		

		
		// CHERCHE LES ID de competences
		
		$req = $bdd->query("SELECT idCompetences FROM Competences WHERE Competences.competences='$competence'");
		$id_competences = $req->fetch();
		$id_comp = $id_competences['0'] ;

		// INSERT la corespondance entre la competence et l'adherent
		

		$sql =  "INSERT INTO a2doc.adherents_has_competences 
				(adherents_idadherents, competences_idCompetences) VALUES ('$id_ad', '$id_comp')";
		$req = $bdd->prepare($sql); 
		$req->execute();
		
		
		//ECRIRE LES COMPETENCES DE L'ADHERENT

		$req = $bdd->query("SELECT competences_idCompetences FROM adherents_has_competences
							 WHERE adherents_idadherents='$id_ad'");
		
		
							 	
        	while ($my_competences = $req->fetch()) 
        	{
        	$comp = $my_competences['0'];	
        	$reg = $bdd->query("SELECT Competences FROM competences
							 WHERE idCompetences='$comp'");	
			$name_comp = $reg->fetch()	;			 
			echo $name_comp['0'].'</BR>' ;
	    	}	 				 
							 
		
	}
	catch(Exception $e)
    {
		// En cas d'erreur, on affiche un message et on arrete tout
        die('Erreur : '.$e->getMessage());
	}
?>
	 

		
 <?php
 		
    try 
      {
	  $champ = $bdd->query('SELECT * FROM competences');
// L'indice 0 du tableau d'info sur les colonnes correspond au "label"
          $i=0;
          while ($champ_result = $champ->fetch()) 
          {
     	  $i=$i+1;
          $table_enter[$i]=$champ_result['1'];
	      }	 
		  
		  $result=$i;			
       } 
   catch (Exception $e)
       {
    echo 'ƒchec lors de la query : ' . $e->getMessage();
       }	
?>


<form id ='formulaire' action="addCompetence.php" method="post"  >
	<div id="champSelect">
		<select id="selection" name="competence" onchange="changer()">
			<?php
			// Je gŽnre du code html avec du php! 
			//Ok il faut pas en faire un vice mais lˆ a permet d'automatiser le formulaire !	
			$i=1;
			while  ($i < $result+1)
	      	    { 
	      	 	echo "<option value= '$table_enter[$i]' > $table_enter[$i] </option>".'<BR>';
	      	 	$i=$i+1;
	      	    }
	      	  ?>
			 		 
			<option value="autre">Autres</option>
		</select>
	</div>			
        <input type="submit" >
</form>


<SCRIPT language="javascript">
	
function changer() {
  if (document.getElementById('selection').value == "autre" ) {
    document.getElementById('champSelect').innerHTML = '<input type="text" name="selection">';
  }
  
  
}

</SCRIPT>






