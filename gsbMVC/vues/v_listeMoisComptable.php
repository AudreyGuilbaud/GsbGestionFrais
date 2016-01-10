<div id="selectionMois">
    <div class="petitTitre">
        Recherche par MOIS
    </div>
    <div id="calqueMois" class="encadreFin">
        <form action="index.php?uc=validerFiches&action=choixVisiteur" method="post">    
            <input id="mois" type="submit" value="Rechercher par VISITEUR" class="bouton autreRecherche" />
        </form>
        <div class="selection">
            Sélectionnez un mois :
            <form action="index.php?uc=" method="post">
                <p>
                    <label for="lstMoisComptable" accesskey="n">Mois : </label>
                    <input name="lstMoisComptable" type="text" class="date" id="datepicker"/>
                </p>
                <input id="ok" type="submit" value="Valider" class="bouton valider"/>              
                <input id="annuler" type="reset" value="Effacer" class="bouton annuler" />
            </form>
        </div>
    </div>
</div>
