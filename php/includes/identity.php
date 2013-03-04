<?php
  include ('php/public/connectTobase.php');
if(isset($_POST) && !empty($_POST['login']) && !empty($_POST['pass']))
{
  extract($_POST);
  $sql = "SELECT pass 
			FROM adherents 
			WHERE mail='".$login."'";
		
  $req = $bdd->query($sql);
  $data= $req->fetch();

  
       if($data['pass'] != sha1($pass))
       {  
        include("html/login.html");
       echo '<p>Mauvais login / password. Merci de recommencer</p>';  
        }
       else
       {
	   header("location: index2.php?page=communaute");
        }    
 }
else
{
  include("html/login.html");
  
}

?>