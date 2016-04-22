<div id="gererFrais">
    <div class="petitTitre">
        Renseigner ma fiche de frais du mois <?php echo $numMois . "-" . $numAnnee ?>
    </div>
    <div id="contenuFraisForfait" >
        <form method="POST"  action="index.php?uc=gererFrais&action=validerMajFraisForfait">
            <div class="corpsForm">

                <fieldset id="fraisForfait" class="remplissage">
                    <legend>Eléments forfaitisés</legend>
                    <?php
                    foreach ($lesFraisForfait as $unFrais) {
                        $idFrais = $unFrais['idfrais'];
                        $libelle = $unFrais['libelle'];
                        $quantite = $unFrais['quantite'];
                        ?>
                        <p>
                            <label for="idFrais"><?php echo $libelle ?></label>
                            <input type="text" id="idFrais" name="lesFrais[<?php echo $idFrais ?>]" size="10" maxlength="5" value="<?php echo $quantite ?>" class="barreTexte" >
                        </p>

                        <?php
                    }
                    ?>
                    <div class="boutonsBas1">                           
                        <input type="submit" value="Valider" size="20" class="bouton valider" />                            
                        <input type="reset" value="Effacer" size="20" class="bouton annuler"/>                            
                    </div>
                </fieldset>
            </div>
        </form>
    </div>
    ﻿
    <div id="contenuFraisHorsForfait" class="remplissage">
        <form action="index.php?uc=gererFrais&action=validerCreationFrais" method="post">
            <fieldset class="remplissage" id="fraisHorsForfait">
                <legend>Nouvel élément hors forfait
                </legend>
                <p>
                    <label for="txtDateHF">Date (JJ/MM/AAAA) </label>
                    <input type="text" id="txtDateHF" name="dateFrais" size="10" maxlength="10" value="" class="barreTexte" />
                </p>
                <p>
                    <label for="txtMontantHF">Montant  </label>
                    <input type="text" id="txtMontantHF" name="montant" size="10" maxlength="10" value="" class="barreTexte"/>
                </p>
                <p>
                    <label for="txtLibelleHF">Nature du frais</label>
                    <input type="text" id="txtLibelleHF" name="libelle" size="30" maxlength="256" value="" class="barreTexte" />
                </p>
               
     
                <div class="boutonsBas2">
                    <div class="boutonsBas2">                           
                        <input type="submit" value="Ajouter" size="20" class="bouton valider" />                            
                        <input type="reset" value="Effacer" size="20" class="bouton annuler"/>                            
                    </div>
                </div>
            </fieldset>
        </form>
    </div>

    
        <div class="divPlein">
            <table style="width:100%">
                <caption class="petitTitre">Descriptif des éléments hors forfait </caption>
                <tr>
                    <th class="titreColonneMini">Date</th>
                    <th class="titreColonneMini">Montant</th> 
                    <th class="titreColonneGrand">Libellé</th>  
                    <th>&nbsp;</th>              
                </tr>

                <?php
                foreach ($lesFraisHorsForfait as $unFraisHorsForfait) {
                    $libelle = $unFraisHorsForfait['libelle'];
                    $date = $unFraisHorsForfait['date'];
                    $montant = $unFraisHorsForfait['montant'];
                    $id = $unFraisHorsForfait['id'];
                    ?>		
                    <tr>
                        <td class="ligneFraisHFPetit"> <?php echo $date ?></td>
                        <td class="ligneFraisHFPetit"><?php echo $montant ?> euros</td>
                        <td class="ligneFraisHF"><?php echo $libelle ?></td>                    
                        <td class="ligneFraisHFSuppr"><a href="index.php?uc=gererFrais&action=supprimerFrais&idFrais=<?php echo $id ?>" 
                                                         onclick="return confirm('Voulez-vous vraiment supprimer ce frais?');">Supprimer</a></td>
                    </tr>
                    <?php
                }
                ?>	  

            </table>
        </div>
  
</div>