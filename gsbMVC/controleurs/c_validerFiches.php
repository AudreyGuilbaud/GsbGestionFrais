<?php

if (!isset($_REQUEST['action'])) {
    $_REQUEST['action'] = 'choixFiche';
}
$action = $_REQUEST['action'];
include("vues/v_sommaireComptable.php");
include("vues/v_titreValid.html");

switch ($action) {
    case 'choixFiche' : {
            $lesVisiteurs = $pdo->getLesVisiteurs();
            include("vues/v_rechercheComptableValid.php");
            break;
        }

    case 'afficherFiches' : {
            $lesVisiteurs = $pdo->getLesVisiteurs();
            include("vues/v_rechercheComptableValid.php");
            $leVisiteur = $_REQUEST['lstVisiteur'];
            $leMois = $_REQUEST['lstMoisComptable'];
            $lAnnee = $_REQUEST['txtAnneeComptable'];
            $laDate = "01/" . $leMois . "/" . $lAnnee;
            $MoisAnnee = $leMois . "/" . $lAnnee;
            if ((empty($leVisiteur)) && (empty($leMois)) && (empty($lAnnee))) {
                ajouterErreur("Vous n'avez renseigné aucun champ.");
                include("vues/v_erreurs.php");
            } else {
                if ((!empty($leVisiteur) ) && ( (empty($leMois)) || (empty($lAnnee)) )) {
                    $leVisiteurSelec = $pdo->getNomPrenomUser($leVisiteur);
                    $prenom = $leVisiteurSelec['prenom'];
                    $nom = $leVisiteurSelec['nom'];
                    $lesFichesParVisiteur = $pdo->getLesFichesParVisiteurValid($leVisiteur);
                    if (empty($lesFichesParVisiteur)) {
                        ajouterAbsenceDonnees("Il n'existe pas de fiche de frais à traiter pour ce visiteur.");
                        include("vues/v_absenceDonnees.php");
                    } else {
                        include("vues/v_affichFichesVisiteur.php");
                    }
                } else {
                    if ((empty($leVisiteur) ) && ( (!empty($leMois)) && (!empty($lAnnee)) )) {
                        if (estDateValide($laDate)) {
                            $leMoisReq = getMois($laDate);
                            $lesFichesParMois = $pdo->getLesFichesParMoisValid($leMoisReq);
                            if (empty($lesFichesParMois)) {
                                ajouterAbsenceDonnees("Il n'existe pas de fiche de frais à traiter pour ce mois.");
                                include("vues/v_absenceDonnees.php");
                            } else {
                                include("vues/v_affichFichesMois.php");
                            }
                        } else {
                            ajouterErreur("L'année doit être écrite sous la forme numérique (2010, 2011...)");
                            include("vues/v_erreurs.php");
                        }
                    } else {
                        if ((!empty($leVisiteur) ) && ( (!empty($leMois)) || (!empty($lAnnee)) )) {
                            echo " à coder ";
                        } else {
                            if (((!empty($leVisiteur) ) && ( (!empty($leMois)) || (empty($lAnnee)) )) ||
                                    ((!empty($leVisiteur) ) && ( (empty($leMois)) || (!empty($lAnnee)) )) ||
                                    ((empty($leVisiteur) ) && ( (!empty($leMois)) || (empty($lAnnee)) )) ||
                                    ((empty($leVisiteur) ) && ( (empty($leMois)) || (!empty($lAnnee)) ))) {
                                ajouterErreur("L'année et le mois doivent être renseignés.");
                                include("vues/v_erreurs.php");
                            }
                        }
                    }
                }
            }
            break;
        }
    default : {
            $lesVisiteurs = $pdo->getLesVisiteurs();
            include("vues/v_rechercheComptableValid.php");
            break;
        }
}
?>
