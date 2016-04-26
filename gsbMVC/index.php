<?php
/**
 * Index de l'application / Main
 * @package controleurs
 * @author Existant + Audrey Guilbaud
 * @version 2.0
 * Démarre l'application. 
 * Instancie la classe PdoGsb afin d'appeler ses méthodes de requêtes SQL.
 * Inclut l'entête.
 * Gère la redirection vers le contrôleur correspondant selon l'action effectuée par l'utilisateur,
 * en particulier en cliquant sur une option dans le menu principal ou en se connectant.
 * Ce fichier est le plus haut grade dans l'arborescence d'inclusion des fichiers. Il inclut lui-même tous les fichiers
 * nécessaires au fonctionnement de l'application.
 */

session_start();
require_once("include/fct.inc.php");
require_once ("include/class.pdogsb.inc.php");
include("vues/v_entete.html");
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

