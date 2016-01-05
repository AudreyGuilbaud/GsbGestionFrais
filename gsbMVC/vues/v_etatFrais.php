<div>
    <div class="petitTitre">Fiche de frais du mois <?php echo $numMois . "-" . $numAnnee ?> </div>
    <table class="divPlein encadreFin">
        <caption class="petitTitre2">Statut de la fiche </caption>
        <tr>
            <th class="titreTableauLeger">Etat :</th>
            <td class="tableauLeger"><?php echo $libEtat ?> depuis le <?php echo $dateModif ?>  </td>
        </tr>
        <tr>
            <th class="titreTableauLeger">Montant validé :</th>   
            <td class="tableauLeger"><?php echo $montantValide ?> </td>
        </tr>
        <tr>
            <th class="titreTableauLeger">Nombre de justificatifs reçus :</th>  
            <td class="tableauLeger"><?php echo $nbJustificatifs ?> </td>
        </tr>
    </table>
    <table class="divPlein">
        <caption class="petitTitre2">Eléments forfaitisés </caption>
        <tr>
            <?php
            foreach ($lesFraisForfait as $unFraisForfait) {
                $libelle = $unFraisForfait['libelle'];
                ?>	
                <th class="titreColonne"> <?php echo $libelle ?></th>
                <?php
            }
            ?>
        </tr>
        <tr>
            <?php
            foreach ($lesFraisForfait as $unFraisForfait) {
                $quantite = $unFraisForfait['quantite'];
                ?>
                <td class="ligneFraisHFPetit"><?php echo $quantite ?> </td>
                <?php
            }
            ?>
        </tr>
    </table>
    <table class="divPlein">
        <caption class="petitTitre2">Eléments non-forfaitisés </caption> 
        <tr>
            <th class="titreColonne">Date</th>
            <th class="titreColonne">Libellé</th>
            <th class='titreColonne'>Montant</th>                
        </tr>
        <?php
        foreach ($lesFraisHorsForfait as $unFraisHorsForfait) {
            $date = $unFraisHorsForfait['date'];
            $libelle = $unFraisHorsForfait['libelle'];
            $montant = $unFraisHorsForfait['montant'];
            ?>
            <tr>
                <td class="ligneFraisHFPetit"><?php echo $date ?></td>
                <td class="ligneFraisHFPetit"><?php echo $montant ?></td>
                <td class="ligneFraisHF"><?php echo $libelle ?></td>
            </tr>
            <?php
        }
        ?>
    </table>
</div>















