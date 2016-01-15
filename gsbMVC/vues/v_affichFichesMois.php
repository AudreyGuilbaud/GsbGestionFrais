<?php if (empty($lesFichesParMois)) { ?>
    <div class="absenceDonnees encadreFin">
        Il n'existe pas de fiche de frais à traiter pour ce mois.
    </div>

<?php } else {
    ?>
    <div class = "divPlein">
        <table>
            <caption class = "petitTitre">Fiches de frais à traiter pour le mois :  <?php echo $MoisAnnee ?> </caption>
            <tr>
                <th class = "titreColonne">Visiteur</th>
                <th class = "titreColonne">Dernière modification</th>
                <th class = "titreColonne">Etat</th>
                <th>&nbsp;
                </th>
            </tr> <?php
            foreach ($lesFichesParMois as $uneFiche) {
                $dateModif = $uneFiche['dateModif'];
                $libEtat = $uneFiche['libEtat'];
                $nom = $uneFiche['nom'];
                $prenom = $uneFiche['prenom'];
                ?>   	
                <tr>
                    <td class="ligneFraisHFPetit"> <?php echo $prenom . " " . $nom?></td>
                    <td class="ligneFraisHFPetit"><?php echo dateAnglaisVersFrancais($dateModif) ?> </td>
                    <td class="ligneFraisHF"><?php echo $libEtat ?></td>                    
                    <td class="ligneFraisHFSuppr"><a href="index.php?uc=validerFiches&action=afficherFiche">Accéder</a></td> 
                </tr>
        <?php
    }
}
?>	  

    </table>
</div>

