<!-- Division pour le sommaire -->
<div id="menuhaut">
    <div class="nomVisit">

        <?php echo "Bienvenue " . $_SESSION['prenom'] . "  " . $_SESSION['nom'] . " !" ?>

    </div>  
    <ul class="menuHaut">			
        <li class="menuHaut">
            <a href="index.php?uc=validerFiches&action=choixVisiteur" title="Validation fiches de frais ">Validation des fiches de frais</a>
        </li>
        <li class="menuHaut">
            <a href="index.php?uc=suivreFiches" title="Suivre fiches de frais">Suivi des fiches de frais</a>
        </li>
        <li class="menuHaut">
            <a href="index.php?uc=connexion&action=deconnexion" title="Se déconnecter">Déconnexion</a>
        </li>
    </ul>

</div>
