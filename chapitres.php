<?php
session_start();
$bdd = new PDO('mysql:host=localhost;dbname=account_app;charset=utf8', 'root', '');
if (!isset($_SESSION['id'])) {
    header('Location: login.php');
    exit(); 
}
$stmt = $bdd->prepare("SELECT users.id, users.pseudo, 
                                       COALESCE(images.image, 'avatar.jpg') AS image 
                                FROM users 
                                LEFT JOIN images ON users.id = images.id 
                                WHERE users.id = ?");
        $stmt->execute([$_SESSION['id']]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
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
    <link rel="stylesheet" href="a.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
<script src='https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js'></script><ap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

    <style>
    body {
    font-family: Arial, sans-serif;
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
            background: linear-gradient(135deg,rgb(63, 0, 145), #8a0083);
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }
        .container h1 {
            text-align: center;
            color: #fff;
            border-bottom:4px solid white;
            padding-bottom:1.3rem;
            margin:1.3rem auto;
            width:90%;
        }
        .container ul {
            list-style: none;
            padding: 0;
        }
        .container li {
            margin: 10px 0;
            padding: 10px;
            background: #e6e6e6;
            border-radius: 4px;
            text-align: center;
            transition: background 0.3s;
        }
        .container li a {
            text-decoration: none;
            color: #333;
            font-weight: bold;
        }
        .container li:hover {
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
<nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container-fluid">
          <a class="navbar-brand" href="index.php">Revisio</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="index.php">Accueil</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" href="classement.php">Classement</a>
              </li>
            </ul>
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0 profile-menu"> 
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  <div class="profile-pic">
                      <img src="upload/<?php echo $user['image']; ?> ">
                   </div>
               <!-- You can also use icon as follows: -->
                 <!--  <i class="fas fa-user"></i> -->
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <li><a class="dropdown-item" href="profil.php"><i class="fas fa-sliders-h fa-fw"></i> Profile</a></li>
                  <li><a class="dropdown-item" href="edit.php"><i class="fas fa-cog fa-fw"></i> Paramètres</a></li>
                  <li><hr class="dropdown-divider"></li>
                  <li><a class="dropdown-item" href="deconnexion.php"><i class="fas fa-sign-out-alt fa-fw"></i>déconnexion</a></li>
                </ul>
              </li>
           </ul>
          </div>
        </div>
      </nav>
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
