<?php
/**
 * Contrôleur de la partie Comptables de l'application : affiche toutes les fiches remboursées.
 * @package controleurs
 * @author Audrey Guilbaud
 * @version 1.0
 * Affiche une zone de recherche par visiteur et/ou par mois pour les fiches remboursées.
 * Affiche la fiche choisie ou une liste de fiches correspondantes au choix du comptable avec un bouton permettant d'accéder à une des fiches.
 * Gère les erreurs du remplissage du formulaire de recherche.
 */
if (!isset($_REQUEST['action'])) {
    $_REQUEST['action'] = 'choixFiche';
}
$action = $_REQUEST['action'];


switch ($action) {
    case 'choixFiche' : {
            include("vues/v_sommaireComptable.php");
            include("vues/v_titreArchives.html");
            $lesVisiteurs = $pdo->getLesVisiteurs();
            include("vues/v_rechercheComptableArchives.php");
            break;
        }

    case 'afficherFiches' : {
            include("vues/v_sommaireComptable.php");
            include("vues/v_titreArchives.html");
            $lesVisiteurs = $pdo->getLesVisiteurs();
            include("vues/v_rechercheComptableArchives.php");
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
                    $lesFichesParVisiteur = $pdo->getLesFichesParVisiteurArchives($leVisiteur);
                    if (empty($lesFichesParVisiteur)) {
                        ajouterAbsenceDonnees("Il n'existe pas de fiche de frais à traiter pour ce visiteur.");
                        include("vues/v_absenceDonnees.php");
                    } else {
                        include("vues/v_affichFichesVisiteurArchives.php");
                    }
                } else {
                    if ((empty($leVisiteur) ) && ( (!empty($leMois)) && (!empty($lAnnee)) )) {
                        if (estDateValide($laDate)) {
                            $leMoisReq = getMois($laDate);
                            $lesFichesParMois = $pdo->getLesFichesParMoisArchives($leMoisReq);
                            if (empty($lesFichesParMois)) {
                                ajouterAbsenceDonnees("Il n'existe pas de fiche de frais à traiter pour ce mois.");
                                include("vues/v_absenceDonnees.php");
                            } else {
                                include("vues/v_affichFichesMoisArchives.php");
                            }
                        } else {
                            ajouterErreur("L'année doit être écrite sous la forme numérique (2010, 2011...)");
                            include("vues/v_erreurs.php");
                        }
                    } else {
                        if ((!empty($leVisiteur) ) && ( (!empty($leMois)) || (!empty($lAnnee)) )) {
                            $_REQUEST['action'] = 'ficheSelectionnee';
                            $_REQUEST["visiteur"] = $leVisiteur;
                            $_REQUEST["mois"] = $lAnnee . $leMois;
                            include("controleurs/c_archivesFiches.php");
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
    case 'ficheSelectionnee' : {
            include_once("vues/v_sommaireComptable.php");
            include_once("vues/v_titreArchives.html");
            $lesVisiteurs = $pdo->getLesVisiteurs();
            include_once("vues/v_rechercheComptableArchives.php");
            $leVisiteur = $_REQUEST["visiteur"];
            $leMoisSelec = $_REQUEST["mois"];
            $leMois = substr($leMoisSelec, 4, 2);
            $lAnnee = substr($leMoisSelec, 0, 4);
            $laDateMois = $leMois . "/" . $lAnnee;
            $leVisiteurNom = $pdo->getNomPrenomUser($leVisiteur);
            $nom = $leVisiteurNom['nom'];
            $prenom = $leVisiteurNom['prenom'];
            $lesFraisHorsForfait = $pdo->getLesFraisHorsForfait($leVisiteur, $leMoisSelec);
            $lesFraisForfait = $pdo->getLesFraisForfait($leVisiteur, $leMoisSelec);
            $lesInfosFicheFrais = $pdo->getLesInfosFicheFrais($leVisiteur, $leMoisSelec);
            $libEtat = $lesInfosFicheFrais['libEtat'];
            $dateModif = $lesInfosFicheFrais['dateModif'];
            $nbJustificatifs = $lesInfosFicheFrais['nbJustificatifs'];
            include("vues/v_ficheLecture.php");
            break;
        }
    default : {
            include("vues/v_sommaireComptable.php");
            include("vues/v_titreArchives.html");
            $lesVisiteurs = $pdo->getLesVisiteurs();
            include("vues/v_rechercheComptableArchives.php");
            break;
        }
}
?>


