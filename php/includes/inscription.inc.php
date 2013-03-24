<link rel='stylesheet' href='css/inscript.css' type='text/css' />
<section class="grid_8 push_2" id="inscript-form">
	


	<!---------------------------------------------------------->
	<!-------------- CONNEXION A LA BASE ----------------------->
	<!---------------------------------------------------------->
		<?php
		 include 'php/public/connectTobase.php'; 	
		 ?>
	<!---------------------------------------------------------->	 
	<!---------------	FORMULAIRE D'INSCRIPTION	------------>
	<!---------------------------------------------------------->
		 <h1>Inscription</h1>
			<fieldset>

				<form action="index2.php?page=inscription" method="post">
										
					<label for="nom" class='grid_2'>Nom : </label><input class='grid_5' type="text" name="nom" required />	<br/>
					<label for="prenom" class='grid_2'>Prénom : </label><input class='grid_5' type="text" name="prenom" required />	<br/>
					<label for="email" class='grid_2'>Email : </label><input class='grid_5' type="text" name="email" required />	<br/>
					<label for="pass" class='grid_2'>Mot de passe : </label><input class='grid_5' type="Password" name="pass" required />	<br/>
					<label for="code_ad" class='grid_2'>Code adhésion : </label><input class='grid_5' type="Password" name="code_ad" placeholder="code à 4 chiffres donné lors de votre adhésion" required />	<br/>			 
					<input type="Submit" value="Inscription">
					<input type="reset" >        
					
				</form>
			</fieldset>

	<!---------------------------------------------------------->	 
	<!--VERIFICATION REMPLISSAGE DES CHAMPS	DU FORMULAIRE------->
	<!---------------------------------------------------------->
	<?php

	 function check_post($input,$num)
	{
		 global $_POST;
		 global $output ;
		 global $insert_true ;
		if(!empty($_POST[$input]))
	 {
	$output[$num] = $_POST[$input];
	$insert_true = 1 ;
	 }
	else 
	 {
/*		echo "Veuillez renseigner votre $input".'<br />';*/
		$insert_true = 0 ;
	 }
	}
	?>



<?php
$insert=1;
$num=0 ;
check_post("nom",$num);
$insert=$insert_true*$insert;
$nom=$output[$num];
$num+=1 ;
check_post("prenom",$num);
$insert=$insert_true*$insert;
$prenom=$output[$num];
$num+=1 ;
check_post("email",$num);
$email=$output[$num];

//------------------------------------------------------------
//              VERIFICATION SYNTAXE E-MAIL
//------------------------------------------------------------

$atom   = '[-a-z0-9!#$%&\'*+\\/=?^_`{|}~]';   // caractres autoriss avant l'arobase
$domain = '([a-z0-9]([-a-z0-9]*[a-z0-9]+)?)'; // caractres autoriss aprs l'arobase (nom de domaine)
                               
$regex = '/^' . $atom . '+' .   // Une ou plusieurs fois les caractes autori avant l'arobase
'(\.' . $atom . '+)*' .         // Suivis par zro point ou plus
                                // spars par des caactres autoriss avant l'arobase
'@' .                           // Suivis d'un arobase
'(' . $domain . '{1,63}\.)+' .  // Suivis par 1  63 caraces autoriss pour le nom de domaine
                                // spars par des points
$domain . '{2,63}$/i';          // Suivi de 2 63 caraces autoris pour le nom de domaine

// test de l'adresse e-mail
if (preg_match($regex, $email)) {
    $insert=1;
} else {
/*    echo "L'adresse e-mail $email n'est pas valide";*/
    $insert=0;
}

$insert=$insert_true*$insert;

//------------------------------------------------------------
//         UTILISATION FONCTION CHECK NO EMPTY
//------------------------------------------------------------

$num+=1 ;
check_post("pass",$num);
$pass=$output[$num];
$insert=$insert_true*$insert;
$num+=1 ;
check_post("code_ad",$num);
$code_ad=$output[$num];
$insert=$insert_true*$insert;

if ($code_ad=$code_a2doc)
{
$insert_true=1;
}
else
 {
$insert_true=0;	
}
 
 $insert=$insert_true*$insert;
 
//------------------------------------------------------------
//         INSERT IN BASE IF NO EMPTY AND SYNTAXE MAIL OK
//					GOT TO COMMUNAUTE PAGE
//------------------------------------------------------------

$controlMail = "SELECT COUNT(mail) 
				FROM adherents 
				WHERE mail='".$email."'";
$req = $bdd->query($controlMail);
$data= $req->fetch();
//si le mail n'est pas dans la bdd, on inscrit sinon on averti et n'inscrit pas
	if ($data['0']==0) {
		$insert_true=1;
	}
		elseif (isset($email)){
			$insert_true=0;
			 ?> <p style="color: #b82a1d">    <?php echo'L\'email '.$email.' est déjà inscrit!';?>  <?php
		}
		$insert=$insert_true*$insert;
				


 if ($insert==1)
 {
   try
     {    
$sql =  "INSERT INTO a2doc.adherents (idadherents, nom, prenom, mail, pass) VALUES (NULL, '$nom', '$prenom', '$email',sha1('$pass'))";
$req = $bdd->prepare($sql); 
$req->execute();
		setCookie("authorized",'yes');
		header("location:index2.php?page=communaute");
     }
  catch(Exception $e)
    {
	// En cas d'erreur, on affiche un message et on arrete tout
        die('Erreur : '.$e->getMessage());
	}
 }			
?>

</section>