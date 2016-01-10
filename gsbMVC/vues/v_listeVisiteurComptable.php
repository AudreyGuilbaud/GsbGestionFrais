<div id="selectionVisiteur">
    <div class="petitTitre">
        Recherche par VISITEUR
    </div>
    <div id="calqueVisiteur" class="encadreFin">
        <form action="index.php?uc=validerFiches&action=choixMois" method="post">    
            <input id="visiteur" type="submit" value="Rechercher par MOIS" class="bouton autreRecherche" />
        </form>
        <div class="selection">
            Sélectionnez un visiteur :
            <form action="index.php?uc=validerFiches&action=afficherFichesVisiteur" method="post">
                <p>
                    <label for="lstVisiteur" accesskey="n">Visiteur : </label>
                    <select id="lstVisiteur" name="lstVisiteur">
                        <?php
                        foreach ($lesVisiteurs as $unVisiteur) {
                            $id = $unVisiteur['id'];
                            $prenom = $unVisiteur['prenom'];
                            $nom = $unVisiteur['nom'];
                        ?>
         
                        <option value="<?php echo $id ?>"><?php echo $prenom . " " . $nom ?> </option>
                        
                        <?php } ?>
                        
                    </select>
                </p>
                <input id="ok" type="submit" value="Valider" class="bouton valider"/>              
                <input id="annuler" type="reset" value="Effacer" class="bouton annuler" />
            </form>
        </div>
    </div>
</div>
