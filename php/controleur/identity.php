<?php
session_start();
	 $_SESSION['Acces_ad'] = 0;
	 include '../../php/public/connectTobase.php';
?>


<h1>Connexion</h1>

<?php

// variables du formulaire
$action = isset($_POST['action']) ? $_POST['action'] : '';  
$email = isset($_POST['email']) ? $_POST['email'] : '';
$pass = isset($_POST['pass']) ? $_POST['pass'] : '';


// Si aucune action, le formulaire est affiché
if ($action !=1 ) {

echo 'Veuillez vous identifier:<br />';
echo '<form action="'.$_SERVER['REQUEST_URI'].'" method="post">';
echo '<input type="hidden" name="action" value="1">';
echo 'Email: <input type="text" name="email"><br />';
echo 'Password: <input type="password" name="pass"><br />';
echo '<input type="submit" value="Connexion">';
echo '</form>';

echo '<a href="inscriptionTobase.php"> Devenir Membres </a></p>';
echo '<a href="../../index2.php?page=presentation"> Visiteur </a></p>';


		 

                  }

// Sinon
if ($action == 1) {

echo $pass;

$pass=sha1($pass);

echo $pass;

$q = $bdd->query("SELECT COUNT(*) 
                  FROM adherents 
                  WHERE mail='$email' 
                  AND pass='$pass'");
				  
$n=$q->fetch();

    if ($n[0] == 1 AND $email != "" AND $pass != "")
       {
       // Le login est placé dans la session
       $_SESSION['login_session'] = $email;
	   $_SESSION['Acces_ad'] = 1;
       // redirection
        // ATTENTION A BIEN METTRE LA PAGE DE REDIRECTION ICI

       header("location: ../../index2.php?page=communaute");
       }

// Si le login ou le mot de passe sont incorrect
// affiche de nouveau le formulaire

         else{

echo 'Veuillez entrer votre Email et Mot de Passe:<br />';
echo '<form action="'.$_SERVER['REQUEST_URI'].'" method="post">';
echo '<input type="hidden" name="action" value="1">';
echo 'Email: <input type="text" name="email"><br />';
echo 'Passe: <input type="password" name="pass"><br />';
echo '<input type="submit" value="Connexion">';
echo '</form>';

die('<font color="red">Informations incorrectes!');
           }
         }
?>






