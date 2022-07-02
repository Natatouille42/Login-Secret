<!DOCTYPE html>
<html>
<?php
session_start();
include "allinclude.php";
?>

<head>
    <link href="bootstrap.css" rel="stylesheet">
    <title>Titre</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
<div>

<?php

Routage($page, $tarif, $utilisateurs);

?>
</div>
<script src="bootstrap.bundle.js"></script>
</body>

</html>
