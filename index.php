<?php
session_start();





$bdd = new PDO('mysql:host=localhost;dbname=account_app;charset=utf8', 'root', '');


$recupDecks = $bdd->query('SELECT * FROM decks');


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil </title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<style>
    body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-image: url('abstract-dark-colorful-digital-art-yi-3840x2400.jpg');
    background-size: cover;
    }
   
  ul{
    margin:0;
    list-style-type: none;
    padding:0;
    overflow:hidden;
    background-color:#000;
  }
  ul li{
    font-size:1.5rem;
    float:left;
  }
  ul li a{

    padding: 12px 30px;
    text-decoration: none;
    display: block;
    text-align: center;
    color: rgb(255 232 158);
    font-weight: 600;
}
  
</style>
<body>
    
        <ul>
            <li><a href="index.php">Revisio</a></li>
            <li><a href="profil.php">Profil</a></li>
        </ul>
    
    <div class="container">
        <div class="logout">
            <a href="login.php">Déconnexion </a>
        </div>
        <h1>Accueil</h1>
        <h2>Liste des Decks</h2>
        <?php while ($deck = $recupDecks->fetch()) { ?>
            <div class="deck">
            <a href="chapitres.php?id_deck=<?php echo $deck['id_deck']; ?>">
    <?php echo htmlspecialchars($deck['nom_deck']); ?>
</a>

            </div>
        <?php } ?>
    </div>
</body>
</html>
