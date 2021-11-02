<?php

if (!isset($_REQUEST['action'])) {
	$action='';
}
else
{
	$action=$_REQUEST['action'];
}

switch ($action) 
{
	case 'voirGestionfrais':
	{
		$lesVisiteurs= $pdo->getLesVisiteurs();
		include('vues/v_visiteur.php');
		break;
	}
	case 'afficher':
		{
			$id= $_REQUEST['idVisiteur'];
			$fraisHorsF= $pdo->getFraisH($id);
			$fraisF= $pdo->getLesFrais($id);
			$lesVisiteurs= $pdo->getLesVisiteurs();
			include('vues/v_visiteur.php');
			include ('vues/v_info.php');
			break;}	
}	