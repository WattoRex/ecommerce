<?php require_once("inc/init.inc.php"); ?>

<!-- Traitement -->
<?php
if (isset($_GET['action']) && $_GET['action'] == "deconnexion") {
    session_destroy(); // Détruit la session courante et tous ses données associées
}

if (internauteEstConnecte()) {
    header("location: profil.php");
}

if ($_POST) {
    $resultat = executeRequete("SELECT * FROM utilisateur WHERE pseudo='$_POST[pseudo]'");
    if ($resultat->num_rows != 0) {
        // traitement connexion
        $membre = $resultat->fetch_assoc();
        if (password_verify($_POST['mot_de_passe'], $membre['mot_de_passe'])) {
            foreach ($membre as $indice => $element) {
                if ($indice != 'mot_de_passe') {
                    $_SESSION['membre'][$indice] = $element;
                }
                header("location:profil.php");
            }
        } else {
            $contenu .= '<div class="erreur">Erreur de mot de passe</div>';
        }
    } else {
        $contenu .= '<div class="erreur">Erreur de pseudo</div>';
    }
}
?>

<?php require_once("inc/haut.inc.php"); ?>
<?php echo $contenu ?>

<form method="post" action="">
    <label for="pseudo">Pseudo</label><br>
    <input type="text" id="pseudo" name="pseudo"><br> <br>

    <label for="mot_de_passe">Mot de passe</label><br>
    <input type="password" id="mot-de-passe" name="mot_de_passe"><br><br>

    <button class="connexion">Se connecter</button>
</form>

<?php require_once("inc/bas.inc.php"); ?>