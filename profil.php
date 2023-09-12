<?php require_once("inc/init.inc.php"); ?>
<?php require_once("inc/haut.inc.php"); ?>

<?php
if (!internauteEstConnecte())
    header("location: connexion.php");
$contenu .= '<div class="profil"><p class="centre">Bonjour <strong>' . $_SESSION['membre']['pseudo'] . '</strong></p>';
$contenu .= '<div class="cadre"><h2> Voici vos informations </h2>';
$contenu .= '<p> votre email est: ' . $_SESSION['membre']['email'] . '</p><br>';
$contenu .= '<p>votre ville est: ' . $_SESSION['membre']['ville'] . '</p><br>';
$contenu .= '<p>votre cp est: ' . $_SESSION['membre']['code_postal'] . '</p><br>';
$contenu .= '<p>votre adresse est: ' . $_SESSION['membre']['adresse'] . '</p></div></div><br><br>';
?>
<?php echo $contenu ?>

<?php require_once("inc/bas.inc.php"); ?>