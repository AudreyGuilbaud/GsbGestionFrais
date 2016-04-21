<div class = "divPlein">

    <table>
        <caption class = "petitTitre2">Fiches de frais à contrôler pour <?php echo $prenom . " " . $nom ?> </caption>
        <tr>
            <th class = "titreColonne">Mois</th>
            <th class = "titreColonne">Dernière modification</th>
            <th class = "titreColonne">Etat</th>
            <th>&nbsp;
            </th>
        </tr> <?php
        foreach ($lesFichesParVisiteur as $uneFiche) {
            $dateModif = $uneFiche['dateModif'];
            $libEtat = $uneFiche['libEtat'];
            $mois = $uneFiche['mois'];
            $numAnnee = substr($mois, 0, 4);
            $numMois = substr($mois, 4, 2);
            ?>  

            <tr>

                <td class="ligneFraisHFPetit"> <?php echo $numMois . "/" . $numAnnee ?></td>
                <td class="ligneFraisHFPetit"><?php echo dateAnglaisVersFrancais($dateModif) ?> </td>
                <td class="ligneFraisHF"><?php echo $libEtat ?></td>
                <td class="ligneFraisHFSuppr">
                    <a href="index.php?uc=validerFiches&action=ficheSelectionnee&visiteur=<?php echo $leVisiteur ?>&mois=<?php echo $mois ?>" 
                       id="accesFiches" >Accéder</a></td> 

            </tr>

            <?php
        }
        ?>	  

    </table>

</div>