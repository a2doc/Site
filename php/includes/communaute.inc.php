<section id="containNews">

	<section  id="News">

		<h1 class='dalle_title'>News</h1>


	<?php
	
   include 'php/public/connectTobase.php'; 	

	$q = $bdd->query("SELECT * FROM News ORDER BY date DESC");	
	$i=0;
          while (($champ_result = $q->fetch()) && ($i<1)) 
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
</section>
<!-- AGENDA GOOGLE -->
	
<section id="agenda">	
	
	
<iframe src="https://www.google.com/calendar/embed?showTitle=0&amp;
showNav=0&amp;showTabs=0&amp;showCalendars=0&amp;showTz=0&amp;
height=350&amp;wkst=2&amp;bgcolor=%23FFFFFF&amp;src=a2doc.association%40gmail.com&amp;
color=%232952A3&amp;ctz=Europe%2FParis" style=" border-width:0 " width="350" height="350" 
frameborder="0" scrolling="no"></iframe>
	
</section>




<section  id="Forums_track">

<h1 class='dalle_title'>Forum track</h1>


	<?php
	
 

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







<!--
	<div class="grid_7 push_4 alpha" id="accueil">
	
		<h1 id="bienvenue">Communauté</h1>
		<p class="intro">page communauté</p>
		
			
		</div>
-->		
