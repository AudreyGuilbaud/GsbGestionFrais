<!-- Division pour le sommaire -->
<div id="menuhaut">
    <div id="nomVisit">

        <?php echo "Bienvenue " . $_SESSION['prenom'] . "  " . $_SESSION['nom'] . " !" ?>

    </div>  
    <ul class="menuHaut">			
        <li class="menuHaut">
            <a href="index.php?uc=validerFiches" title="Validation fiches de frais ">Validation des fiches de frais</a>
        </li>
        <li class="menuHaut">
            <a href="index.php?uc=suivreFiches" title="Suivre fiches de frais">Suivi des fiches de frais</a>
        </li>
        <li class="menuHaut">
            <a href="index.php?uc=connexion&action=deconnexion" title="Se déconnecter">Déconnexion</a>
        </li>
    </ul>

</div>
