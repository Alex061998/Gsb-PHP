<?php


include 'model/class.pdogsb.php';
include 'vues/v_header.php';
include 'vues/v_menu.php';


/* création de l'objet $pdo d'accès aux données*/
$pdo = PdoGsb::getPdoGsb();

if (!isset($_REQUEST['uc'])) {
    $uc='accueil';
}
else{
    $uc=$_REQUEST['uc'];
}
switch ($uc) {
    case 'accueil':
        {
            include 'vues/v_accueil.php';
            break;
        }
    case 'controleur':
        {
            include 'controleur/c_gestionFr.php';
            break;
        }
        
}
include 'vues/v_footer.php';

 