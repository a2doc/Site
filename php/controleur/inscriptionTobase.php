<!DOCTYPE html>
<html>
    <head>
       <meta charset="utf-8" />
        <title>Inscription </title>
    </head>
 
    <body>
     
     
     <?php
     include 'connectTobase.php'; 	
     ?>

<form action="inscriptionTobase.php" method="post"  >
	<p>	
		Votre nom : <input type="text" name="nom"  />	<BR>
		Votre Pr�nom : <input type="text" name="prenom"  />	<BR>
		Votre email : <input type="text" name="email"  />	<BR>
		Votre Mot de passe : <input type="Password" name="pass"  />	<BR>
	    Code adh�sion :  <input type="Password" name="code_ad"  />	<BR>			 
          <input type="Submit" value="Inscription">
        <input type="reset" >        
	</p>
</form>


    </body>
</html>

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
	echo "Veuillez renseigner votre $input".'<br />';
	$insert_true = 0 ;
 }
}

$insert=1;
$num=0 ;
check_post(nom,$num);
$insert=$insert_true*$insert;
$nom=$output[$num];
$num+=1 ;
check_post(prenom,$num);
$insert=$insert_true*$insert;
$prenom=$output[$num];
$num+=1 ;
check_post(email,$num);
$email=$output[$num];


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
    echo "L'adresse e-mail $email n'est pas valide";
    $insert=0;
}

$insert=$insert_true*$insert;

$num+=1 ;
check_post(pass,$num);
$pass=$output[$num];
$insert=$insert_true*$insert;
$num+=1 ;
check_post(code_ad,$num);
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
 
 
 if ($insert==1)
 {
   try
     {    
$sql =  "INSERT INTO a2doc.adherents (idadherents, nom, prenom, mail,pass) VALUES (NULL, '$nom', '$prenom', '$email','$pass')";
$req = $bdd->prepare($sql); 
$req->execute();
     }
  catch(Exception $e)
    {
	// En cas d'erreur, on affiche un message et on arrte tout
        die('Erreur : '.$e->getMessage());
	}
 }			
?>