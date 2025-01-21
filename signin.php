<?php
session_start();
$bdd = new PDO('mysql:host=localhost;dbname=account_app;charset=utf8','root','');
if(isset($_POST['envoi'])){
    if(!empty($_POST['pseudo']) AND !empty($_POST['mdp'])){
        $pseudo = htmlspecialchars($_POST['pseudo']);
        $mdp = sha1($_POST['mdp']);
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
    background-color: #f4f4f4;
    margin: 0;
    padding: 0;
    background-image: url('minimal-abstract-background-5k-hi.jpg');
    background-size: cover;
    background-image: url('abstract-dark-colorful-digital-art-yi-3840x2400.jpg');
}
</style>
<body>
    <form method="POST" action="" align="center">
        <h1>Sign up</h1>
        <input type="text" name="pseudo">
        <br/>
        <input type="password" name="mdp">
        <br/><br>
        <input type="submit" name="envoi">
    </form>
</body>
</html>