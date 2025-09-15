<?php
session_start();
try {
    $bdd = new PDO('mysql:host=localhost;dbname=site_e_commerce', 'root', '');
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nom = htmlspecialchars($_POST['nom']);
    $email = htmlspecialchars($_POST['email']);
    $mot_passe = htmlspecialchars($_POST['mot_passe']);

    $hPassword = password_hash($mot_passe, PASSWORD_DEFAULT);
    $sql = "INSERT INTO user (nom, email, mot_passe) VALUES (?, ?, ?)";
    $stmt = $bdd->prepare($sql);

    if ($stmt->execute([$nom, $email, $hPassword])) {
        $_SESSION['nom'] = $nom;
        //echo "✅ Insertion réussie !";

        header("location:index.php");
    } else {
        echo 'echec';
    }
}
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8" />
    <title>formulaire</title>
    <link rel="stylesheet" href="../css/inscription.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css" />
</head>

<body>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">

        <link rel="stylesheet" href="../css/inscription.css">
        <title>Site E-commerce</title>
    </head>

    <body>
        <div class="container">
            <div class="formulaire">
                <form action="" method="post">
                    <div class="text">
                        <h3>S'inscrire</h3>
                    </div>
                    <div class="reseau">
                        <p>S'inscrire a partir des resaux sociaux</p>
                        <div class="icon">
                            <i class="fa-brands fa-facebook"></i>
                        </div>
                        <div class="icon">
                            <i class="fa-brands fa-google"></i>
                        </div>
                    </div>
                    <div class="parent">
                        <div class="zone_text">
                        <label for="nom">Nom</label>
                        <input type="text" name="nom" id="nom" required>
                    </div>
                    <div class="zone_text">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" required>
                    </div>
                    <div class="zone_text">
                        <label for="mot_passe">Mot de Passe</label>
                        <input type="password" name="mot_passe" id="mot_passe" required>
                    </div>

                    </div>
                    
                    <input type="submit" value="ENVOYER">
                </form>
            </div>
            <div class="autre">
                <h2>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Corrupti, quibusdam.</h2>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Harum eum mollitia ipsum et magnam soluta.</p>
                <button><a href="./connexion.php">Se connecter</a></button>
            </div>

        </div>
    </body>

    </html>


































    <!--<div class="container" id="container">
		<div class="form-container sign-up-container">
			<form action="#">
				<h1>Creer un compte</h1>
				<div class="social-container">
					<a href="#"><i class="fab fa-facebook-f"></i></a>
					<a href="#"><i class="fab fa-google-plus-g"></i></a>
					<a href="#"><i class="fab fa-linkedin-in"></i></a>
				</div>
				<span>Utiliser compte gmail</span>
				<input type="text" placeholder="Nom">
				<input type="email" placeholder="Email">
				<input type="password" placeholder="Mot de passe">
				<button>Creer le compte</button>
			</form>
		</div>
		<div class="form-container login-container">
			<form action="#">
				<h1>Se connecter</h1>
				<div class="social-container">
					<a href="#"><i class="fab fa-facebook-f"></i></a>
					<a href="#"><i class="fab fa-google-plus-g"></i></a>
					<a href="#"><i class="fab fa-linkedin-in"></i></a>
				</div>
				<span>Je n'ai pas de compte</span>
				<input type="email" placeholder="Email">
				<input type="password" placeholder="Mot de passe">
				<button>Se connecter</button>
			</form>
		</div>

		<div class="overlay-container">
			<div class="overlay">
				<div class="overlay-panel overlay-left">
					<h1>Lorem ipsum dolor sit amet consectetur.</h1>
					<p>Lorem ipsum dolor sit amet consectetur, adipisicing elit.</p>
					<button class="ghost" id="login">Se connecter</button>
				</div>
				<div class="overlay-panel overlay-right">
					<h1>Lorem ipsum dolor sit amet consectetur.</h1>
					<p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. </p>
					<button class="ghost" id="signUp">Creer un compte</button>
				</div>
			</div>
		</div>
	</div>

	<script src="script.js" charset="utf-8"></script> 
</body>

</html>