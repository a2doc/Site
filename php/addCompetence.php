	
		<link rel='stylesheet' href='../css/button.css' type='text/css' />	
		<link rel='stylesheet' href='../css/960gs/960_12_colmax.css' type='text/css' />
		<link rel='stylesheet' href='css/960gs/reset.css' type='text/css' />
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
		 // TEST SI IL SAGIT BIEN DUNE NOUVELLE COMPETENCE ET LAJOUTE SI OUI
		
		if( isset($_POST['selection']))
			{
			$competence=$_POST['selection'];
			Get_colonnes_value('competences');
		
			$i=1;
			$write=1;
			while  ($i < $entry_nb+1)
	      	{
	      	$i = $i +1; 
			if (strtoupper($table_enter[$i])==strtoupper($competence))
				{
					$write=0;
				}	
	      	}
		
			if ($write == 1)
			{
			$sql =  "INSERT INTO a2doc.competences 
				(idCompetences, Competences) VALUES (NULL, '$competence')";
			$req = $bdd->prepare($sql); 
			$req->execute();
			}
			
			if ($write == 0)
			{
				echo '!!! La compétence appartient déjà à la base !!!! </br>';
			}			
		}		
		
		if( isset($_POST['niveau']))
		{
		$niveau=$_POST['niveau'];	
		$update=0;	
		}
		
		
		if (isset($_POST['niveau_up']))
		{
		$niveau_up=$_POST['niveau_up'];
		$update=1;
		$id_niv_up = Select_filter_id('Niveau','Niveau',$niveau_up);	
		$competence = $_POST['competence_up'];
		}
		
		// CHERCHE LES ID de adherents
		$id_ad=Select_filter_id('adherents','nom',$login);

		// CHERCHE LES ID de competences
		$id_comp = Select_filter_id('Competences','competences',$competence);

		// CHERCHE LES ID de niveaux
		$id_niv = Select_filter_id('Niveau','Niveau',$niveau);	
		
	   // VERIFIE QUE L'ADHERENT N'A PAS DEJA CETTE COMPETENCE
	   	$sql = "SELECT competences_idCompetences FROM adherents_has_competences
							 WHERE adherents_idadherents='$id_ad'";
		$req = $bdd->prepare($sql); 
		$req->execute();
		
			$write=1;
			while  ($my_idcompetences = $req->fetch())
	      	{
				$my_idcomp=$my_idcompetences['0'];
				$reg = $bdd->query("SELECT Competences FROM competences
							 WHERE idCompetences='$my_idcomp'");
				$name_comp = $reg->fetch()	;
					
			if (strtoupper($name_comp['0'])==strtoupper($competence))
				{
					$write=0;
				}
			}
		// UPDATE LE NIVEAU
				if ($update == 1)
				{			
				$sql = "UPDATE a2doc.adherents_has_competences  SET Niveau_idNiveau= :level WHERE adherents_idadherents = :ad_id
				       and  competences_idCompetences = :comp_id";
				$req = $bdd->prepare($sql); 
				$req->execute(array('level' => $id_niv_up , 'ad_id' => $id_ad , 'comp_id' => $id_comp));
				}			 
	
		// INSERT la corespondance entre la competence et l'adherent et le niveau
		
		if ($write==1)
		{
			$sql =  "INSERT INTO a2doc.adherents_has_competences 
				(adherents_idadherents, competences_idCompetences, Niveau_idNiveau) VALUES ('$id_ad', '$id_comp','$id_niv')";
			$req = $bdd->prepare($sql); 
			$req->execute();
		 }	
		else {
		//	echo 'Vous avez déjà cette compétence </br>';
		}

		
			//ECRIRE LES COMPETENCES DE L'ADHERENT
			$req = $bdd->query("SELECT competences_idCompetences FROM adherents_has_competences
							 WHERE adherents_idadherents='$id_ad'");		
			$req2 = $bdd->query("SELECT Niveau_idNiveau FROM adherents_has_competences
							 WHERE adherents_idadherents='$id_ad'");
			$nb=0	;							 							 	
        		while ($my_competences = $req->fetch()) 
      		  	{
      		  	
      		  		
        		$my_niv = $req2->fetch();	
        		$niv = 	$my_niv['0'];
        		$comp = $my_competences['0'];	
        		$reg = $bdd->query("SELECT Competences FROM competences
							 WHERE idCompetences='$comp'");	
				$name_comp = $reg->fetch()	;	
				$reg = $bdd->query("SELECT Niveau FROM Niveau
							 WHERE idNiveau='$niv'");	
				$name_niv = $reg->fetch()	;	
			
				echo '<div class="grid_12" style="position:relative;width:2000px;height:45px;display:inline"> ';
 				//VOIR les compétences
 
				echo '<div class="contenu_1 grid_8" style=visibility:visible;position:absolute>
				 <div class="grid_2 myButton" > '.$name_comp['0'].' </div>  '.
				 '<div class="grid_2 myButton" > '.$name_niv['0'] .' </div>
				 <a class="grid_1 push_2 myButton"  href="#" onclick="show('.$nb.'); return false"; 
				 >Modifier</a> </div> ' ;

 				//Modifier le NIVEAU des compétences				
				echo '<div class="contenu_2 grid_8" style=visibility:hidden;position:absolute> 
				  		 <form id ="modif_niv"  action="addCompetence.php" method="post"  >
	      						<div class="grid_2 myButton">';
									echo $name_comp['0'] ;
									Get_colonnes_value('competences');
									echo '<input type="hidden"  name="competence_up"  value="'.$table_enter[$nb+1].'">';
								echo '</div>
								
 								<div class="grid_2 styled-select" id="champNiveau_up">
									<select  id="niveau_up" name="niveau_up" >';
									Get_colonnes_value('Niveau');
									$i=1;
									while  ($i < $entry_nb+1)
	      	  						  { 
	      							 	echo "<option value= '$table_enter[$i]' > $table_enter[$i] </option>";
	    	  		 					$i=$i+1;
	      	    					  }
	    	 						 echo 	'</select> </div>';			
       							 echo '<input class="grid_1 push_2"  type="submit" value="Enregistrer" >';
							echo '</form> </div>';
				echo '</div>';

				$nb=$nb+1;
	    		}	

	     				  
  Get_colonnes_value('competences');
?>

<!-- FORMULAIRE POUR AJOUTER DES COMPETENCES -->


<form  class='grid_12' style="position:relative;width:2000px;height:45px;display:inline;visibility:visible" action="addCompetence.php" method="post"  >
	<div class="grid_8" id ='insert_base' style='visibility:visible;position:relative'> 
	<div id="champ_competence" class="grid_2 styled-select">
		<select id="competence_select" name="competence" onchange="changer()">
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
 <div id="champNiveau" class="grid_2 styled-select">
		<select id="niveau"  name="niveau" >
			<?php
			Get_colonnes_value('Niveau');
			$i=1;
			while  ($i < $entry_nb+1)
	      	    { 
	      	 	echo "<option value= '$table_enter[$i]' > $table_enter[$i] </option>".'<BR>';
	      	 	$i=$i+1;
	      	    }
	      	  ?>			 		 
		</select>
	</div>			
        <input type="submit"  class="grid_1 push_2" value='Ajouter' >
       </div> 
</form>


<!-- PARTIE SCRIPT QUI GERE LE CHAMP AUTRE -->

<SCRIPT language="javascript">
	
	 	    	var contenu_1 = document.getElementsByClassName("contenu_1");
 	    	var contenu_2 = document.getElementsByClassName("contenu_2");
 	    	//var insert_base = document.getElementById("insert_base");
	
function changer() {
  if (document.getElementById('competence_select').value == "autre" )
   {
    document.getElementById('champ_competence').innerHTML = '<input type="text" name="selection" autofocus>';
  } 
}
          

			function show(i) {
				 contenu_1[i].style.visibility = 'hidden';
				 contenu_2[i].style.visibility = 'visible';
			//	 insert_base.style.visibility = 'hidden';				 

			}

			function hide(i) {
				 contenu_1[i].style.visibility = 'visible';
				 contenu_2[i].style.visibility = 'hidden';				 
			//	 insert_base.style.visibility = 'visible';
			};

		</script>





