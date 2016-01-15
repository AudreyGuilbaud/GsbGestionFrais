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
            $leVisiteurSelec = $pdo->getNomPrenomUser($leVisiteur);
            $prenom = $leVisiteurSelec['prenom'];
            $nom = $leVisiteurSelec['nom'];
            $lesFichesParVisiteur = $pdo->getLesFichesParVisiteur($leVisiteur);
            include("vues/v_affichFichesVisiteur.php");
            break;
        }

    case 'afficherFichesMois' : {
            include("vues/v_listeMoisComptable.php");
            $leMois = $_REQUEST['txtMoisComptable'];
            $lAnnee = $_REQUEST['txtAnneeComptable'];
            $laDate = "01/" . $leMois . "/" . $lAnnee;
            $MoisAnnee = $leMois."/".$lAnnee ;
            if (estDateValide($laDate)) {
                $leMoisReq = getMois($laDate);
                $lesFichesParMois = $pdo->getLesFichesParMois($leMoisReq);
                include("vues/v_affichFichesMois.php");
            } else {
                ajouterErreur("Vous devez renseigner un mois et une année (valeurs numériques).");
                include("vues/v_erreurs.php");
            }
            break;
        }

    default : {
            $lesVisiteurs = $pdo->getLesVisiteurs();
            include("vues/v_listeVisiteurComptable.php");
            break;
        }
}
?>
