<?php require_once("inc/init.inc.php"); ?>
<!-- // --Traitement --// -->
<?php
if ($_POST) {
    // debug($_POST);
    $verif_caractere = preg_match("#^[a-zA-Z0-9._'-]+$#", $_POST['pseudo']);
    if (!$verif_caractere || strlen($_POST['pseudo']) < 1 || strlen($_POST['pseudo']) > 20) {
        $contenu .= "<div class='erreur'>Le pseudo doit contenir entre 1 et 20 caractères. 
        <br> Caractère accepté : Lettre de A à Z et chiffre de 0 à 9</div>";
    } else {
        $utilisateur = executeRequete("SELECT * FROM utilisateur WHERE pseudo='$_POST[pseudo]'");
        if ($utilisateur->num_rows > 0) {
            $contenu .= "<div class='erreur'>Pseudo indisponible. Veuillez en choisir un autre.</div>";
        } else {
            $_POST['mot_de_passe'] = password_hash($_POST['mot_de_passe'], PASSWORD_BCRYPT);
            foreach ($_POST as $indice => $valeur) {
                $_POST[$indice] = htmlspecialchars(addslashes($valeur));
            }
            executeRequete("INSERT INTO utilisateur (pseudo, mot_de_passe, nom, prenom, email, civilite, ville, code_postal, adresse) 
            VALUES ('$_POST[pseudo]', '$_POST[mot_de_passe]', '$_POST[nom]', '$_POST[prenom]', '$_POST[email]', 
            '$_POST[civilite]', '$_POST[ville]', '$_POST[code_postal]', '$_POST[adresse]')");
            $contenu .= "<div class='validation'>Vous êtes inscrit à notre site web. 
            <a href=\"connexion.php\"><u>Cliquez ici pour vous connecter</u></a></div>";
        }
    }
}
?>

<!-- -- HTML -- -->
<?php require_once("inc/haut.inc.php"); ?>
<?php echo $contenu ?>

<form class="form" method="post" action="">
    <label for="pseudo">Pseudo</label>
    <input type="texte" name="pseudo" id="pseudo" placeholder="Votre pseudo" required maxlength="20"
        title="caractère acceptés : a-z A-Z 0-9-_.">

    <label for="mot-de-passe">Mot de passe</label>
    <input type="password" id="mot-de-passe" name="mot_de_passe" placeholder="Votre mot de passe" required>

    <label for="nom">Nom</label>
    <input type="text" id="nom" name="nom" placeholder="Votre nom">

    <label for="prenom">Prénom</label>
    <input type="text" id="prenom" name="prenom" placeholder="Votre prénom">

    <label for="email">Email</label>
    <input type="email" id="email" name="email" placeholder="exemple@gmail.com">

    <div class="civilite">
        <label for="civilite">Civilité</label><br>
        <input name="civilite" value="m" checked="" type="radio">Homme
        <input name="civilite" value="f" type="radio">Femme
    </div>


    <label for="ville">Ville</label>
    <input type="text" id="ville" name="ville" placeholder="Votre ville" pattern="[a-zA-Z0-9-_.]{5,15}"
        title="caractères acceptés : a-zA-Z0-9-_.">

    <label for="cp">Code Postal</label>
    <input type="text" id="code_postal" name="code_postal" placeholder="Code postal" pattern="[0-9]{5}"
        title="5 chiffres requis : 0-9">

    <label for="adresse">Adresse</label>
    <textarea id="adresse" name="adresse" placeholder="Votre adresse" pattern="[a-zA-Z0-9-_.]{5,15}"
        title="caractères acceptés :  a-zA-Z0-9-_."></textarea>

    <br> <button class="inscription">S'inscrire</button>
</form>

<?php require_once("inc/bas.inc.php"); ?>