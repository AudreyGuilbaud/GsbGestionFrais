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
            </tr>

            <tr>
                <?php
                foreach ($lesFraisForfait as $unFraisForfait) {
                    $quantite = $unFraisForfait['quantite'];
                    $idFrais = $unFraisForfait['idfrais'];
                    ?>
                    <td class="colonneFraisForfait">
                        <input disabled class="inputPetit" name="lesFrais[<?php echo $idFrais ?>]" type="text" value="<?php echo $quantite ?>"> 
                    </td>

                    <?php
                }
                ?>      
            </tr>
        </table>

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
                            <td class="ligneFraisHFPetit">Accepté</td>
                        <?php } else { ?>
                        <tr>
                            <td class="FraisHFRefusePetit"><?php echo $date ?></td>
                            <td class="FraisHFRefusePetit"><?php echo $montant ?></td>
                            <td class="FraisHFRefuse"><?php echo $libelle ?></td>
                            <td class="FraisHFRefusePetit">Refusé</td>
                        </tr>
                        <?php
                    }
                }
                ?>
            </table>
        <?php } ?>
        <?php if ($idEtat == 'CL') { ?>
            <div class="divPlein" style="padding-bottom:50px">
                <a class="lien" href="index.php?uc=suivreFiches&action=miseEnPaiement&&id=<?php echo $leVisiteur ?>&mois=<?php echo $leMoisSelec ?>" 
                   onclick="return confirm('Etes-vous sûr(e) de vouloir lancer la mise en paiement ? Aucune modification ne sera plus possible sur la fiche.');">    Mettre la fiche de frais en paiement   </a>
            </div>
        <?php
        } else {
            if ($idEtat == 'VA') {
                ?>
                <div class="divPlein" style="padding-bottom:50px">
                    <a class="lien" href="index.php?uc=suivreFiches&action=remboursementEffectue&id=<?php echo $leVisiteur ?>&mois=<?php echo $leMoisSelec ?>" 
                       onclick="return confirm('Etes-vous sûr(e) de vouloir confirmer que cette fiche a bien été remboursée ?');">    Confirmer le remboursement de la fiche de frais au visiteur    </a>
                </div>
            <?php }
        }
        ?>
</div>


