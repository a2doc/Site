<?php 
	if(isset($_COOKIE['authorized'])&&($_COOKIE['authorized']=='yes'))
	{		
	include('php/includes/member.php');	
	}
	else
    {
	header("location: index.php");
	}

?>





	
