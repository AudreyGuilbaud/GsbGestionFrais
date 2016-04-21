<?php

require_once("include/fct.inc.php");
require_once ("include/class.pdogsb.inc.php");
include("vues/v_entete.php");
session_start();
$pdo = PdoGsb::getPdoGsb();
$estConnecte = estConnecte();
if (!isset($_REQUEST['uc']) || !$estConnecte) {
    $_REQUEST['uc'] = 'connexion';
}
$uc = $_REQUEST['uc'];
switch ($uc) {
    case 'connexion': {
            include("controleurs/c_connexion.php");
            break;
        }
    case 'gererFrais' : {
            include("controleurs/c_gererFrais.php");
            break;
        }
    case 'etatFrais' : {
            include("controleurs/c_etatFrais.php");
            break;
        }
    case 'validerFiches' : {
            include("controleurs/c_validerFiches.php");
            break;
        }
    case 'suivreFiches' : {
            include("controleurs/c_suivreFiches.php");
            break;
        }
    case 'archivesFiches' : {
            include("controleurs/c_archivesFiches.php");
            break;
        }
}
include("vues/v_pied.php");
?>

