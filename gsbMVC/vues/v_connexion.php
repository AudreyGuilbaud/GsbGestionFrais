<div id="connexion" class="encadreFin">
    <div class="petitTitre">
        Identification de l'utilisateur
    </div>
    <div id="formCo">
        <form method="POST" action="index.php?uc=connexion&action=valideConnexion">


            <div id="loginDiv">
                Login : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <input id="login" type="text" name="login" maxlength="45"> <br/>
                <br/>  
            </div>

            <div id="mdpDiv">
                Mot de passe : &nbsp;
                <input id="mdp"  type="password"  name="mdp" maxlength="45"><br/>
                <br/>   
            </div>               
            <input type="submit" value="Valider" name="valider" class="bouton valider">               
            <input type="reset" value="Annuler" name="annuler" class="bouton annuler">                 
        </form>
    </div>
</div>