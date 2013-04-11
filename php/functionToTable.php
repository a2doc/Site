<?php

function Get_colonnes_value($colonne_name)
{

	global $entry_nb ;
	global $table_enter ;


	include '../php/public/connectTobase.php'; 

	  $champ = $bdd->query("SELECT * FROM $colonne_name");
          $i=0;
          while ($champ_result = $champ->fetch()) 
          {
     	  $i=$i+1;
          $table_enter[$i]=$champ_result['1'];
	      }	 
		  
	  $entry_nb=$i;			
	
}	 

function Select_filter_id($table_name,$filter_name,$filter_value)
{

	include '../php/public/connectTobase.php'; 
	
	
	$id_table='id'.$table_name;
	$filter=$table_name.'.'.$filter_name;
	$req = $bdd->query("SELECT $id_table FROM $table_name WHERE $filter='$filter_value'");
	$id = $req->fetch();
	$id_val = $id['0'] ;
		
	return $id_val;
}
  
?>