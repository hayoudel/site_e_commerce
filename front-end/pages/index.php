<?php
session_start(); // reprendre la session


// Ici on affiche le nom de l'utilisateur
echo "Bienvenue " . $_SESSION['nom'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<h1>Bienvenue</h1>
</body>
</html>