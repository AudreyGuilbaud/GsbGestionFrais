 <div id="etatFrais">
    <div class="petitTitre">
        Mes fiches de frais 
    </div>
    <div id="calqueMois" class="encadreFin">
        <div id="selectionMois">
            Sélectionnez un mois :
            <form action="index.php?uc=etatFrais&action=voirEtatFrais" method="post">

                <p>

                    <label for="lstMois" accesskey="n">Mois : </label>
                    <select id="lstMois" name="lstMois">
                        <?php
                        foreach ($lesMois as $unMois) {
                            $mois = $unMois['mois'];
                            $numAnnee = $unMois['numAnnee'];
                            $numMois = $unMois['numMois'];
                            if ($mois == $moisASelectionner) {
                                ?>
                                <option selected value="<?php echo $mois ?>"><?php echo $numMois . "/" . $numAnnee ?> </option>
                                <?php
                            } else {
                                ?>
                                <option value="<?php echo $mois ?>"><?php echo $numMois . "/" . $numAnnee ?> </option>
                                <?php
                            }
                        }
                        ?>    

                    </select>
                </p>
                <input id="ok" type="submit" value="Valider" size="20" class="bouton valider"/>              
                <input id="annuler" type="reset" value="Effacer" size="20" class="bouton annuler" />
        </div>
    </div>
</form>