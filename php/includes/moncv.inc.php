	<?php
     include("php/includes/header.php");
     ?>
 
<section  class="page">

<h1>Compétences</h1>


	<?php
	
	
 include 'connectTobase.php'; 
	
	$q = $bdd->query("SELECT * FROM News ORDER BY date DESC");	
	$i=0;
          while (($champ_result = $q->fetch()) && ($i<3)) 
          {
          	$i=$i+1;
			if ($i==1)
			{
			echo '<p class=\'dalle_title\'>';
		    }
          $date=$champ_result['2'];
		  $news=$champ_result['1'];
		  echo '<strong>'.$date.'</strong> : '.$news.'<br/>';
	      }	 
	
	echo'</p>'
	?>
	
</section>
