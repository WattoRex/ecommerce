<?php
require('./inc/init.inc.php');


// Notre accueil
require('./inc/haut.inc.php');
?>
<h2>Notre page</h2>
<p>Coincée entre le haut et le bas !</p>
<?php
require('./inc/bas.inc.php');

// echo getenv('NOM_VARIABLE');
// echo '<br>';
echo $_ENV['TEST'];