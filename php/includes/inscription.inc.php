<link rel='stylesheet' href='css/inscript.css' type='text/css' />
<section class="grid_8 push_2" id="inscript-form">
	<!---------------------------------------------------------->	 
	<!---------------	FORMULAIRE D'INSCRIPTION	------------>
	<!---------------------------------------------------------->
		 <h1>Inscription</h1>
			<fieldset>

				<form action="index2.php?page=traiteFormInsc" method="post">
										
					<label for="nom" class='grid_2'>Nom : </label><input class='grid_5' type="text" name="nom" required />	<br/>
					<label for="prenom" class='grid_2'>Prénom : </label><input class='grid_5' type="text" name="prenom" required />	<br/>
					<label for="email" class='grid_2'>Email : </label><input class='grid_5' type="text" name="email" required />	<br/>
					<label for="pass" class='grid_2'>Mot de passe : </label><input class='grid_5' type="Password" name="pass" required />	<br/>
					<label for="code_ad" class='grid_2'>Code adhésion : </label><input class='grid_5' type="Password" name="code_ad" placeholder="code à 4 chiffres donné lors de votre adhésion" required />	<br/>			 
					<input type="Submit" value="Inscription">
					<input type="reset" >        
					
				</form>
			</fieldset>



</section>

