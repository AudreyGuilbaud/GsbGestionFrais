<?php

if (!isset($_REQUEST['action'])) {
    $_REQUEST['action'] = 'choixFiche';
}
$action = $_REQUEST['action'];


switch ($action) {
    case 'choixFiche' : {
            include_once("vues/v_sommaireComptable.php");
            include_once("vues/v_titreValid.html");
            $lesVisiteurs = $pdo->getLesVisiteurs();
            include_once("vues/v_rechercheComptableValid.php");
            break;
        }

    case 'afficherFiches' : {
            include_once("vues/v_sommaireComptable.php");
            include_once("vues/v_titreValid.html");
            $lesVisiteurs = $pdo->getLesVisiteurs();
            include_once("vues/v_rechercheComptableValid.php");
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
                            $_REQUEST['action'] = 'ficheSelectionnee';
                            $_REQUEST["visiteur"] = $leVisiteur;
                            $_REQUEST["mois"] = $lAnnee . $leMois;
                            include("controleurs/c_validerFiches.php");
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
            include_once("vues/v_titreValid.html");
            $lesVisiteurs = $pdo->getLesVisiteurs();
            include_once("vues/v_rechercheComptableValid.php");
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
            include("vues/v_validFrais.php");
            break;
        }


    case 'modifFraisForfait' : {
            $leVisiteur = $_REQUEST['idVisiteur'];
            $leMoisSelec = $_REQUEST['dateMois'];
            $lesFrais = $_REQUEST['lesFrais'];
            include_once("vues/v_sommaireComptable.php");
            include_once("vues/v_titreValid.html");
            $lesVisiteurs = $pdo->getLesVisiteurs();
            include_once("vues/v_rechercheComptableValid.php");
            if (lesQteFraisValides($lesFrais)) {
                $pdo->majFraisForfait($leVisiteur, $leMoisSelec, $lesFrais);
            } else {
                ajouterErreur("Les valeurs des frais doivent être numériques");
                include("vues/v_erreurs.php");
            }
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
            include("vues/v_validFrais.php");
            break;
        }

    case 'refuserFrais' : {
            if (!empty($_REQUEST['id'])) {
                $idFraisHF = $_REQUEST['id'];
            }
            $pdo->refuserFraisHF($idFraisHF);
            $leVisiteur = $_REQUEST['idVisit'];
            $leMoisSelec = $_REQUEST['mois'];
            include_once("vues/v_sommaireComptable.php");
            include_once("vues/v_titreValid.html");
            $lesVisiteurs = $pdo->getLesVisiteurs();
            include_once("vues/v_rechercheComptableValid.php");
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
            include("vues/v_validFrais.php");
            break;
        }

    case 'reporterFrais' : {
            $leVisiteur = $_REQUEST['idVisit'];
            $leMoisSelec = $_REQUEST['mois'];
            if (!empty($_REQUEST['id'])) {
                $idFraisHF = $_REQUEST['id'];
            }
            $nouveauMois = ajoutUnMois($leMoisSelec);
            echo $nouveauMois;
            $pdo->reporterFraisHF($idFraisHF, $nouveauMois, $leVisiteur);
            include_once("vues/v_sommaireComptable.php");
            include_once("vues/v_titreValid.html");
            $lesVisiteurs = $pdo->getLesVisiteurs();
            include_once("vues/v_rechercheComptableValid.php");
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
            include("vues/v_validFrais.php");
            break;
        }
    case 'restaurerFrais' : {
            if (!empty($_REQUEST['id'])) {
                $idFraisHF = $_REQUEST['id'];
            }
            $pdo->restaurerFraisHF($idFraisHF);
            $leVisiteur = $_REQUEST['idVisit'];
            $leMoisSelec = $_REQUEST['mois'];
            include_once("vues/v_sommaireComptable.php");
            include_once("vues/v_titreValid.html");
            $lesVisiteurs = $pdo->getLesVisiteurs();
            include_once("vues/v_rechercheComptableValid.php");
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
            include("vues/v_validFrais.php");
            break;
        }
    default : {
            include_once("vues/v_sommaireComptable.php");
            include_once("vues/v_titreValid.html");
            $lesVisiteurs = $pdo->getLesVisiteurs();
            include_once("vues/v_rechercheComptableValid.php");
            break;
        }
}
?>
