<?php
session_start();
$bdd = new PDO('mysql:host=localhost;dbname=account_app;charset=utf8','root','');
if(isset($_POST['envoi'])){
    if(!empty($_POST['pseudo']) AND !empty($_POST['mdp'])){
        $pseudo = htmlspecialchars($_POST['pseudo']);
        $mdp = $_POST['mdp'];
        $recupUser = $bdd->prepare('SELECT * FROM users WHERE pseudo = ? AND mdp = ?');
        $recupUser->execute(array($pseudo, $mdp));
        if($recupUser->rowCount() > 0){
            $_SESSION['pseudo'] = $pseudo;
            $_SESSION['mdp'] = $mdp;
            $_SESSION['id'] = $recupUser->fetch()['id'];
            echo $_SESSION['id'];
            header('Location: index.php');
           
        }else{
            echo "Error";
        }
    }else{
        echo "veuillez completer tous les champs";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    body {
        font-family: Arial, sans-serif;
    background-size: cover;
    background-image: url('abstract-dark-colorful-digital-art-yi-3840x2400.jpg');
    height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        h2{
            text-decoration:none;
            font-size:2.6rem;
            color:rgb(61, 97, 255);
            font-style:bold;
            font-style:italic;
            text-shadow:-2px -2px 2px rgb(255, 255, 255);
        }
        /* Style du formulaire */
        .login-form {
            background:#2c2c2c;
            padding: 40px;
            border-radius: 10px;
            text-align: center;
            width: 350px;
            box-shadow: -10px -10px 20px rgb(0, 0, 0);
            border-top: 4px solid rgb(130, 0, 156);
            border-left: 4px solid rgb(130, 0, 156);
            
        }
        
        .login-form h1 {
            color: #fff;
            margin-bottom: 20px;
            font-size: 28px;
        }

        .login-form input[type="text"],
        .login-form input[type="password"] {
            width: 92%;
            padding: 15px;
            margin: 10px 0;
            border: none;
            border-radius: 5px;
            background: #555;
            color: #fff;
            font-size: 16px;
        }

        .login-form input::placeholder {
            color: #bbb;
        }

        .login-form input[type="submit"] {
            width: 100%;
            padding: 15px;
            border: none;
            border-radius: 5px;
            background: linear-gradient(135deg,rgb(99, 1, 226),rgb(179, 0, 170));
            color: #fff;
            font-size: 18px;
            cursor: pointer;
            font-weight: bold;
            transition:0.4s;
        }

        .login-form input[type="submit"]:hover {
            background: linear-gradient(135deg, #9c0094, rgb(94, 0, 216));
            scale:1.08;
        }

        .links {
            margin-top: 2rem;
            font-size: 14px;
        }

        .links a {
            color:rgb(50, 99, 235);
            text-decoration: none;
        }

        .links a:hover {
            text-decoration: underline;
        }
        p {
            color : white;
        }
        

        
</style>
<body>
<form method="POST" action="" class="login-form">
        <h2 class ="title">Revisio</h2>
        <h1>Connexion</h1>
        <input type="text" name="pseudo" placeholder="Nom d'utilisateur" autocomplete="off" required>
        <br>
        <input type="password" name="mdp" placeholder="Mot de passe" autocomplete="off" required>
        <br><br>
        <input type="submit" name="envoi" value="Se connecter">
        
        <div class="links">
            <p>Vous n'avez pas de compte ? <a href="signup.php">Inscrivez-vous</a></p>
        </div>
        
        
    </form>
</body>
</html>