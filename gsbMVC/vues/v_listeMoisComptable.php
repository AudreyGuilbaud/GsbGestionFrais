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
            <form action="index.php?uc=validerFiches&action=afficherFichesMois" method="post">
                <p>
                    <label for="txtMoisComptable" accesskey="n">Mois (MM) : </label>
                    <input size="5" name="txtMoisComptable"/> &nbsp;&nbsp;&nbsp;&nbsp;
                    <label for="txtAnneeComptable" accesskey="n">Année (YYYY) : </label>
                    <input size="5" name="txtAnneeComptable"/>
                </p>
                <input id="ok" type="submit" value="Valider" class="bouton valider"/>              
                <input id="annuler" type="reset" value="Effacer" class="bouton annuler" />
            </form>
        </div>
    </div>
</div>
