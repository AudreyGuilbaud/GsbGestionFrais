<?php
/**
 * Contrôleur gérant la connexion de l'utilisateur.
 * @package controleurs
 * @author Existant + Audrey Guilbaud
 * @version 2.0
 * Affiche l'écran de connexion et vérifie les informations de connexion de l'utilisateur.
 * Affiche les erreurs d'identification ou affiche le bon menu automatiquement en fonction de la nature de l'utilisateur (visiteur ou comptable).
 */
if (!isset($_REQUEST['action'])) {
    $_REQUEST['action'] = 'demandeConnexion';
}
$action = $_REQUEST['action'];
switch ($action) {
    case 'demandeConnexion': {
            include("vues/v_connexion.php");
            break;
        }
    case 'valideConnexion': {
            $login = $_REQUEST['login'];
            $mdp = $_REQUEST['mdp'];
            $utilisateur = $pdo->getInfosUtilisateur($login, $mdp);
            if (!is_array($utilisateur)) {
                ajouterErreur("Login ou mot de passe incorrect");
                include("vues/v_erreurs.php");
                include("vues/v_connexion.php");
            } else {
                $id = $utilisateur['id'];
                $nom = $utilisateur['nom'];
                $prenom = $utilisateur['prenom'];
                $type = $utilisateur['type'];
                connecter($id, $nom, $prenom, $type);
                if ($type == 1) {
                    include("vues/v_sommaireVisiteur.php");
                } else {
                    if ($type == 2) {
                        include("vues/v_sommaireComptable.php");
                    }
                }
                break;
            }
        }
    default : {
            include("vues/v_connexion.php");
            break;
        }
}
?>
