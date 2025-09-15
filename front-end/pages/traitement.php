<?php 
    try {
        $bdd = new PDO('mysql:host=localhost;dbname=site_e_commerce', 'root', '');
    } catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
    }
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $nom = htmlspecialchars($_POST['nom']);
    $email = htmlspecialchars($_POST['email']);
    $mot_passe = htmlspecialchars($_POST['mot_passe']);

    $sql = ("INSERT INTO `user` (`nom`,`email`, `mot_passe`) VALUES ('$nom', '$email', '$mot_passe')");
    
    if ($bdd->query ($sql) == true){
        header("location:traitement.php");
    }else{
        echo 'echec';
    }


}
if(isset($_POST['envoyer'])){
    echo "valider";
}

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