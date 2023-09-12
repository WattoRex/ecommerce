<!Doctype html>
<html>

<head>
    <title>Mon Site</title>
    <link rel="stylesheet" href="<?php echo RACINE_SITE ?>inc/css/index.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src=" <?php echo RACINE_SITE ?>inc/js/main.js">
    </script>
</head>

<body>
    <header>
        <nav class="topnav" id="myTopnav">
            <?php
            if (internauteEstConnecteEtEstAdmin()) {
                echo '<a href="' . RACINE_SITE . 'admin/gestion_membre.php">Gestion des membres</a>';
                echo '<a href="' . RACINE_SITE . 'admin/gestion_commande.php">Gestion des commandes</a>';
                echo '<a href="' . RACINE_SITE . 'admin/gestion_boutique.php">Gestion de la boutique</a>';
            }
            if (internauteEstConnecte()) {
                echo '<a href="' . RACINE_SITE . 'profil.php">Voir votre profil</a>';
                echo '<a href="' . RACINE_SITE . 'boutique.php">Accès à la boutique</a>';
                echo '<a href="' . RACINE_SITE . 'panier.php">Voir votre panier</a>';
                echo '<a href="' . RACINE_SITE . 'connexion.php?action=deconnexion">Se déconnecter</a>';
            } else {
                echo '<a href="' . RACINE_SITE . 'inscription.php">Inscription</a>';
                echo '<a href="' . RACINE_SITE . 'connexion.php">Connexion</a>';
                echo '<a href="' . RACINE_SITE . 'boutique.php">Accès à la boutique</a>';
                echo '<a href="' . RACINE_SITE . 'panier.php">Voir votre panier</a>';
            }
            ?>
        </nav>
        </div>
    </header>
    <section>
        <div class="conteneur">