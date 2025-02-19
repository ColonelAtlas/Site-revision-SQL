<?php
session_start();
$bdd = new PDO('mysql:host=localhost;dbname=account_app;charset=utf8','root','');
if(isset($_POST['envoi'])){
    if(!empty($_POST['pseudo']) AND !empty($_POST['mdp'])){
        $pseudo = htmlspecialchars($_POST['pseudo']);
        $mdp = $_POST['mdp'];
        $insertUser = $bdd->prepare('INSERT INTO users(pseudo, mdp)VALUES(?, ?)');
        $insertUser->execute(array($pseudo, $mdp));
        $recupUser = $bdd->prepare('SELECT * FROM users WHERE pseudo = ? AND mdp = ?');
        $recupUser->execute(array($pseudo, $mdp));
        if($recupUser->rowCount() > 0) {
            $_SESSION['pseudo'] = $pseudo;
            $_SESSION['mdp'] = $mdp;
            $_SESSION['id'] = $recupUser->fetch()['id'];
            header('Location: index.php');
        }
        echo $_SESSION['id'];
        
    }else{
        echo "veuillez remplir tous les champs";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    
    <title>Document</title>
</head>
<style>
    body {
    font-family: Arial, sans-serif;
    background-size: cover;
    background-image: url('abstract-dark-colorful-digital-art-yi-3840x2400.jpg');
    display: flex;
    justify-content: center;
    align-items: center;
    height:100vh;
    }

        /* Style du formulaire */
        .signup-form {
            background: #2c2c2c;
            padding: 40px;
            border-radius: 10px;
            text-align: center;
            width: 350px;
            box-shadow: -10px -10px 20px rgb(0, 0, 0);
            border-top: 4px solid rgb(130, 0, 156);
            border-left: 4px solid rgb(130, 0, 156);
        }
        h2{
            text-decoration:none;
            font-size:2.6rem;
            color:rgb(61, 97, 255);
            font-style:bold;
            font-style:italic;
            text-shadow:-2px -2px 2px rgb(255, 255, 255);
        }

        .signup-form h1 {
            color: #fff;
            margin-bottom: 20px;
            font-size: 28px;
        }

        .signup-form input[type="text"],
        .signup-form input[type="password"] {
            width: 92%;
            padding: 15px;
            margin: 10px 0;
            border: none;
            border-radius: 5px;
            background: #555;
            color: #fff;
            font-size: 16px;
        }

        .signup-form input::placeholder {
            color: #bbb;
        }

        .signup-form input[type="submit"] {
            width: 100%;
            padding: 15px;
            border: none;
            border-radius: 5px;
            background: linear-gradient(135deg,rgb(99, 1, 226),rgb(179, 0, 170));
            color: #fff;
            font-size: 18px;
            transition:0.4s;
            cursor: pointer;
            font-weight: bold;
        }

        .signup-form input[type="submit"]:hover {
            background: linear-gradient(135deg, #9c0094, rgb(94, 0, 216));
            scale:1.08;
        }

        .links {
            margin-top: 15px;
            font-size: 14px;
        }

        .links a {
            color: rgb(50, 99, 235);
            text-decoration: none;
        }

        .links a:hover {
            text-decoration: underline;
        }
        p {
            color : white;
        }
        
    </style>
</head>
<body>

    <form method="POST" action="" class="signup-form">
    <h2 class ="title">Revisio</h2>
        <h1>Inscription</h1>
        <input type="text" name="pseudo" placeholder="Choisissez un nom d'utilisateur" autocomplete="off" required>
        <br>
        <input type="password" name="mdp" placeholder="Choisissez un mot de passe" autocomplete="off" required>
        <br><br>
        <input type="submit" name="envoi" value="S'inscrire">
        
        <div class="links">
            <p>Vous possédez déjà un compte ?  <a href="login.php">Connectez-vous</a></p>
        </div>
        
        
    </form>
</body>
</html>