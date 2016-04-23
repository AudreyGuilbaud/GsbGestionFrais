<!-- Division pour le sommaire -->
<div id="menuhautCompt">
    <div class="nomVisit">

        <?php echo "Bienvenue " . $_SESSION['session_prenom'] . "  " . $_SESSION['session_nom'] . " !"  ?>

    </div>  
    <ul class="menuHautCompt">			
        <li class="menuHautCompt">
            <a href="index.php?uc=validerFiches&action=choixVisiteur" title="Validation fiches de frais ">Contrôle des frais</a>
        </li>
        <li class="menuHautCompt">
            <a href="index.php?uc=suivreFiches" title="Suivre fiches de frais">Mise en paiement</a>
        </li>
        <li class="menuHautCompt">
            <a href="index.php?uc=archivesFiches" title="Archives">Archives</a>
        </li>
        <li class="menuHautCompt">
            <a href="index.php?uc=connexion&action=deconnexion" title="Se déconnecter">Déconnexion</a>
        </li>
    </ul>

</div>
