<div id="connexion" class="encadreFin">
    <div id="identConnect">
        Identification de l'utilisateur
    </div>

    <form method="POST" action="index.php?uc=connexion&action=valideConnexion">


        <div id="loginDiv">
            Login : &nbsp;
            <input id="login" type="text" name="login"  size="30" maxlength="45"> <br/>
            <br/>  
        </div>

        <div id="mdpDiv">
            Mot de passe : &nbsp;
            <input id="mdp"  type="password"  name="mdp" size="30" maxlength="45"><br/>
            <br/>   
        </div>

        <input type="submit" value="Valider" name="valider" id="valider" class="bouton">
        <input type="reset" value="Annuler" name="annuler" id="annuler" class="bouton"> 

    </form>

</div>