<!doctype html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>Titre de la page E</title>
</head>
<body>
<?php

session_start();
include "allinclude.php";



if (!isset($_POST["login"])){
    AfficheFormulaire();
}

?>
</body>
</html>



