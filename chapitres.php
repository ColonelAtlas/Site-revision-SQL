<?php

session_start();


$bdd = new PDO('mysql:host=localhost;dbname=account_app;charset=utf8', 'root', '');


if (isset($_GET['id_deck']) && !empty($_GET['id_deck'])) {
    $id_deck = intval($_GET['id_deck']); 

   
    $reqDeck = $bdd->prepare('SELECT nom_deck FROM decks WHERE id_deck = ?');
    $reqDeck->execute([$id_deck]);
    $deck = $reqDeck->fetch();

    if ($deck) {
        $nom_deck = htmlspecialchars($deck['nom_deck']);

        
        $reqChapitres = $bdd->prepare('SELECT * FROM chapitre WHERE id_deck = ?');
        $reqChapitres->execute([$id_deck]);
        $chapitres = $reqChapitres->fetchAll();
    } else {
        die('Deck non trouvé.');
    }
} else {
    die('ID du deck manquant ou invalide.');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chapitres - <?php echo htmlspecialchars($nom_deck); ?></title>
    <style>
    body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
    margin: 0;
    padding: 0;
    background-image: url('minimal-abstract-background-5k-hi.jpg');
    background-size: cover;
    background-image: url('abstract-dark-colorful-digital-art-yi-3840x2400.jpg');
    background-repeat:no-repeat;
}
</style>
    <style>
        
        .container {
            max-width: 800px;
            margin: 50px auto;
            padding: 20px;
            background: #ffffff;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }
        h1 {
            text-align: center;
            color: #333;
        }
        ul {
            list-style: none;
            padding: 0;
        }
        li {
            margin: 10px 0;
            padding: 10px;
            background: #e6e6e6;
            border-radius: 4px;
            text-align: center;
            transition: background 0.3s;
        }
        li a {
            text-decoration: none;
            color: #333;
            font-weight: bold;
        }
        li:hover {
            background: #d1d1d1;
        }
        .back-button {
            display: block;
            margin: 20px auto;
            padding: 10px 20px;
            text-align: center;
            background: #333;
            color: #fff;
            text-decoration: none;
            border-radius: 4px;
            transition: background 0.3s;
        }
        .back-button:hover {
            background: #555;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Chapitres - <?php echo htmlspecialchars($nom_deck); ?></h1>
        <ul>
            <?php if (!empty($chapitres)): ?>
                <?php foreach ($chapitres as $chapitre): ?>
                    <li>
                        
                        <a href="deck.php?id_chapitre=<?php echo $chapitre['id']; ?>&id_deck=<?php echo $id_deck; ?>">
                            <?php echo htmlspecialchars($chapitre['nom_chapitre']); ?>
                        </a>
                    </li>
                <?php endforeach; ?>
            <?php else: ?>
                <p>Aucun chapitre disponible pour ce deck.</p>
            <?php endif; ?>
        </ul>
        <a class="back-button" href="index.php">Retour</a>
    </div>
</body>
</html>
