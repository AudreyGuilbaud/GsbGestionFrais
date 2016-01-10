<?php

if (!isset($_REQUEST['action'])) {
    $_REQUEST['action'] = 'choixVisiteur';
}
$action = $_REQUEST['action'];
include("vues/v_sommaireComptable.php");

switch ($action) {
    case 'choixVisiteur' : {
            $lesVisiteurs = $pdo->getLesVisiteurs();
            include("vues/v_listeVisiteurComptable.php");
            break;
        }

    case 'choixMois' : {
            include("vues/v_listeMoisComptable.php");
            break;
        }

    case 'afficherFichesVisiteur' : {
            $lesVisiteurs = $pdo->getLesVisiteurs();
            include("vues/v_listeVisiteurComptable.php");
            $leVisiteur = $_REQUEST['lstVisiteur'];
            $lesFichesParVisiteur = $pdo->getLesFichesParVisiteur($leVisiteur);
            include("vues/v_affichFichesVisiteur.php");
            break;
        }

    default : {
            $lesVisiteurs = $pdo->getLesVisiteurs();
            include("vues/v_listeVisiteurComptable.php");
            break;
        }
}
?>
