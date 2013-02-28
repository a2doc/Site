<?php
session_start();
	$_SESSION['Acces_ad'] = 0;
	include ('php/public/connectTobase.php');

	 
//début du code trouvé

if(isset($_POST) && !empty($_POST['login']) && !empty($_POST['pass'])) {
  extract($_POST);
  // on recupère le password de la table qui correspond au login du visiteur
  $sql = "SELECT pass 
			FROM adherents 
			WHERE mail='".$login."'";
/*  $req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());	*/
 
  /*la mienne*/
  $req = $bdd->query($sql);
  $data= $req->fetch();

 /* $data = mysql_fetch_assoc($req);*/

	echo $data['pass'];
	echo $pass;
	echo 'toto';
	
  if($data['pass'] != sha1($pass)) {
   
     include('html/login.html'); // On inclut le formulaire d'identification
	  echo '<p>Mauvais login / password. Merci de recommencer</p>';
    exit;
  }
  else {
    session_start();
    $_SESSION['login'] = $login;
    
    echo 'Vous etes bien logué';
    // ici vous pouvez afficher un lien pour renvoyer
	header("location: index2.php?page=communaute");
    // vers la page d'accueil de votre espace membres 
  }    
}
else {
//  echo '<p>Vous avez oublié de remplir un champ.</p>';
   include('html/login.html'); // On inclut le formulaire d'identification
   exit;
}



//fin du code trouvé	 
	 

// variables du formulaire
/*
$action = isset($_POST['action']) ? $_POST['action'] : '';  
$email = isset($_POST['email']) ? $_POST['email'] : '';
$pass = isset($_POST['pass']) ? $_POST['pass'] : '';


// Si aucune action, le formulaire est affiché
if ($action !=1 ) {

echo '<h1>Connexion</h1><br />';
echo '<form action="'.$_SERVER['REQUEST_URI'].'" method="post">';
echo '<input type="hidden" name="action" value="1">';
echo 'Email: <input type="text" name="email"><br />';
echo 'Password: <input type="password" name="pass"><br />';
echo '<input type="submit" value="Connexion">';
echo '</form>';

echo '<a href="inscriptionTobase.php"> Devenir membre </a></p>';
echo '<a href="../../index2.php?page=presentation"> Visiteur </a></p>';


		 

                  }

// Sinon
if ($action == 1) {


$pass=sha1($pass);


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

echo '<h1>Connexion</h1><br />';
echo '<form action="'.$_SERVER['REQUEST_URI'].'" method="post">';
echo '<input type="hidden" name="action" value="0">';
echo 'Email: <input type="text" name="email"><br />';
echo 'Passe: <input type="password" name="pass"><br />';
echo '<input type="submit" value="Connexion">';
echo '</form>';

die('<font color="red">Informations incorrectes!');
           }
         }
*/
?>






