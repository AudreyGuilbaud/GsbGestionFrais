<div>
    <div class="petitTitre">Fiche de frais du mois <?php echo $laDateMois ?> 
        pour <?php echo $prenom . " " . $nom ?> </div>
    <table class="divPlein encadreFin">
        <caption class="petitTitre2">Statut de la fiche </caption>
        <tr>
            <th class="titreTableauLeger">Visiteur : </th>   
            <td class="tableauLeger"><?php echo $prenom . " " . $nom ?> </td>
        </tr>
        <tr>
            <th class="titreTableauLeger">Mois concerné :</th>
            <td class="tableauLeger"><?php echo $laDateMois ?>  </td>
        </tr>
        <tr>
            <th class="titreTableauLeger">Etat :</th>
            <td class="tableauLeger"><?php echo $libEtat ?> depuis le <?php echo $dateModif ?>  </td>
        </tr>

        <tr>
            <th class="titreTableauLeger">Nombre de justificatifs reçus :</th>  
            <td class="tableauLeger"><?php echo $nbJustificatifs ?> </td>
        </tr>
    </table>
    <form method="POST" action="index.php?uc=validerFiches&action=modifFraisForfait">
        <table class="divPlein">
            <input class="inputPetit" hidden name="idVisiteur" type="text" value="<?php echo $leVisiteur ?>"> 
            <input class="inputPetit" hidden name="dateMois" type="text" value="<?php echo $leMoisSelec ?>"> 
            <caption class="petitTitre2">Eléments forfaitisés </caption>
            <tr>
                <?php
                foreach ($lesFraisForfait as $unFraisForfait) {
                    $libelle = $unFraisForfait['libelle'];
                    ?>	
                    <th class="titreColonnePetit"> <?php echo $libelle ?></th>
                    <?php
                }
                ?>
                <th class='titreColonneVide'></th>
            </tr>

            <tr>
                <?php
                foreach ($lesFraisForfait as $unFraisForfait) {
                    $quantite = $unFraisForfait['quantite'];
                    $idFrais = $unFraisForfait['idfrais'];
                    ?>
                    <td class="colonneFraisForfait">
                        <input disabled class="inputPetit pourdisabled" name="lesFrais[<?php echo $idFrais ?>]" type="text" value="<?php echo $quantite ?>"> 
                    </td>

                    <?php
                }
                ?>
                <td class="colonneBoutonForfait">
                    <input type="button" class="buttonModifier nonmodif" onclick='disabledCondi()' title="Modifier les frais forfaitisés">
                    <input type="submit" hidden class="buttonValider modif" title="Valider les modifications" value="">
                    <input type="reset" hidden class="buttonAnnuler modif" onclick='enabledCondi()' title="Annuler les modifications" value="">
                </td>          
            </tr>
        </table>
        <!--<input type="text" id="erreur" class="erreur" readonly>-->
    </form>

    <?php if (!empty($lesFraisHorsForfait)) { ?>
        <table class="divPlein">
            <caption class="petitTitre2">Eléments non-forfaitisés </caption> 
            <tr>
                <th class="titreColonneMini">Date</th>
                <th class="titreColonneMini">Montant</th>
                <th class='titreColonneGrand'>Libellé</th>

            </tr>
            <?php
            foreach ($lesFraisHorsForfait as $unFraisHorsForfait) {
                $date = $unFraisHorsForfait['date'];
                $libelle = $unFraisHorsForfait['libelle'];
                $montant = $unFraisHorsForfait['montant'];
                $idFraisHF = $unFraisHorsForfait['id'];
                $etat = $unFraisHorsForfait['refuse'];
                ?>

                <?php if ($etat == 0) { ?>
                    <tr>
                        <td class="ligneFraisHFPetit"><?php echo $date ?></td>
                        <td class="ligneFraisHFPetit"><?php echo $montant ?></td>
                        <td class="ligneFraisHF"><?php echo $libelle ?></td>
                        <td class="ligneFraisHFSuppr"><a href="index.php?uc=validerFiches&action=reporterFrais&id=<?php echo $idFraisHF; ?>&idVisit=<?php echo $leVisiteur ?>&mois=<?php echo $leMoisSelec ?>" onclick="return confirm('Voulez-vous vraiment reporter ce frais?');">Reporter</a></td>
                        <td class="ligneFraisHFSuppr"><a href="index.php?uc=validerFiches&action=refuserFrais&id=<?php echo $idFraisHF; ?>&idVisit=<?php echo $leVisiteur ?>&mois=<?php echo $leMoisSelec ?>" onclick="return confirm('Voulez-vous vraiment refuser ce frais?');">Refuser </a></td>
                    </tr>
                <?php } else { ?>
                    <tr>
                        <td class="FraisHFRefusePetit"><?php echo $date ?></td>
                        <td class="FraisHFRefusePetit"><?php echo $montant ?></td>
                        <td class="FraisHFRefuse"><?php echo $libelle ?></td>
                        <td class="FraisHFRefuseNotif">Refusé</td>
                        <td class="FraisHFRefuseBouton"><a href="index.php?uc=validerFiches&action=restaurerFrais&id=<?php echo $idFraisHF; ?>&idVisit=<?php echo $leVisiteur ?>&mois=<?php echo $leMoisSelec ?>" onclick="return confirm('Voulez-vous vraiment restaurer ce frais?');">Restaurer </a></td>
                    </tr>
                    <?php
                }
            }
            ?>
        </table>

    <?php } ?>
</div>
