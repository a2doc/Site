
	<!---------------------------------------------------------->
	<!-------------- CONNEXION A LA BASE ----------------------->
	<!---------------------------------------------------------->
		<?php
		
		 include '../php/public/connectTobase.php'; 
		 include 'functionToTable.php'; //bibliotheque de fonction	

	//<!-- INSERTION DANS LA BASE DES COMPETENCES -->
 $login='toto';

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

		$id_ad=Select_filter_id('adherents','nom',$login);

		// CHERCHE LES ID de competences
		
		$id_comp = Select_filter_id('Competences','competences',$competence);

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
  
  Get_colonnes_value('competences');

?>


<form id ='formulaire' action="addCompetence.php" method="post"  >
	<div id="champSelect">
		<select id="selection" name="competence" onchange="changer()">
			<?php
			$i=1;
			while  ($i < $entry_nb+1)
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






