<?php
session_start();
try {
    $bdd = new PDO('mysql:host=localhost;dbname=site_e_commerce', 'root', '');
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}
if (isset($_POST['valider'])) {
    if (!empty($_POST['nom']) and (!empty($_POST['mot_passe']))) {
        $nom = htmlspecialchars($_POST['nom']);
        $mot_passe = htmlspecialchars($_POST['mot_passe']);

        $req = $bdd->prepare("SELECT * FROM user WHERE nom=?");
        $req->execute([$nom]);
        $user = $req->fetch();

        if ($user && password_verify($mot_passe, $user['mot_passe'])) {
            if ($user['nom'] == "admin") {
                header("location:inscription.php");
                exit;
            }
            $_SESSION['nom'] = $user['nom'];

            header("location:index.php");
            exit;
        } else {
            $message = "inscris toi";
        }
    }
    echo $message;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/inscription.css">
    <title>Site E-commerce</title>
</head>

<body>
    <div class="container">
        <div class="autre">
            <h2>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Corrupti, quibusdam.</h2>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Harum eum mollitia ipsum et magnam soluta.</p>
            <button><a href="./inscription.php">Créer un compte</a></button>
        </div>
        <div class="formulaire">
            <form action="" method="post">
                <div class="text">
                        <h3>Se connecter</h3>
                    </div>
                <div class="zone_text">
                    <label for="nom">Nom</label>
                    <input type="text" name="nom" id="nom" required>
                </div>
                <div class="zone_text">
                    <label for="mot_passe">Mot de Passe</label>
                    <input type="password" name="mot_passe" id="mot_passe" required>
                </div>

                <input type="submit" name="valider" value="ENVOYER">
        
            </form>
        </div>

    </div>
</body>

</html>