<!-- Division pour le sommaire -->
<div id="menuhautCompt">
    <div class="nomVisit">

        <?php echo "Bienvenue " . $_SESSION['prenom'] . "  " . $_SESSION['nom'] . " !" ?>

    </div>  
    <ul class="menuHautCompt">			
        <li class="menuHautCompt">
            <a href="index.php?uc=validerFiches&action=choixVisiteur" title="Validation fiches de frais ">Contrôle des frais</a>
        </li>
        <li class="menuHautCompt">
            <a href="index.php?uc=suivreFiches" title="Suivre fiches de frais">Mise en paiement</a>
        </li>
        <li class="menuHautCompt">
            <a href="index.php?index.php?uc=archivesFiches" title="Se déconnecter">Archives</a>
        </li>
        <li class="menuHautCompt">
            <a href="index.php?uc=connexion&action=deconnexion" title="Se déconnecter">Déconnexion</a>
        </li>
    </ul>

</div>
