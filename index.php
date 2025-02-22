<?php
session_start();
$conn = new PDO('mysql:host=localhost;dbname=account_app;charset=utf8','root','');
    if (!isset($_SESSION['id'])) {
        header('Location: login.php');
        exit(); 
    }if (isset($_SESSION['id']) && isset($_SESSION['pseudo'])) {
       
    
        $stmt = $conn->prepare("SELECT users.id, users.pseudo, 
                                       COALESCE(images.image, 'avatar.jpg') AS image 
                                FROM users 
                                LEFT JOIN images ON users.id = images.id 
                                WHERE users.id = ?");
        $stmt->execute([$_SESSION['id']]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
    }
$bdd = new PDO('mysql:host=localhost;dbname=account_app;charset=utf8', 'root', '');
$recupDecks = $bdd->query('SELECT * FROM decks');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil </title>
    <link rel="stylesheet" href="a.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
<script src='https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js'></script><ap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

    <title>Document</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">Revisio</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#">Accueil</a>
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
        
        <h1>Accueil</h1>

        <?php while ($deck = $recupDecks->fetch()) { ?>
            <div class="deck">
            <a href="chapitres.php?id_deck=<?php echo $deck['id_deck']; ?>">
    <?php echo htmlspecialchars($deck['nom_deck']); ?>
</a>

            </div>
        <?php } ?>
    </div>
    <script>
      document.querySelectorAll('.dropdown-toggle').forEach(item => {
    item.addEventListener('click', event => {
   
      if(event.target.classList.contains('dropdown-toggle') ){
        event.target.classList.toggle('toggle-change');
      }
      else if(event.target.parentElement.classList.contains('dropdown-toggle')){
        event.target.parentElement.classList.toggle('toggle-change');
      }
    })
  });
    </script>
</body>
<style>
    body {
    font-family: Arial, sans-serif;
    background-image: url('abstract-dark-colorful-digital-art-yi-3840x2400.jpg');
    background-size: cover;
    background-repeat:no-repeat;
    }
   
  
  .container {
    width: 40%;
    margin: 10% auto;
    padding: 20px;
    color:white;
    background: linear-gradient(135deg, #4d00b3, #9c0094);
    border-radius: 10px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
}
.deck {
    margin: 10px 0;
    padding: 20px;
    border: 1px solid #797979;
    border-radius: 5px;
    background: #f0efef;
    width: 50%;
    margin: 1rem auto;
    text-align: center;
    transition: 0.4s;
}
.deck:hover {
    background: #c0c0c0;
    scale: 1.05;
    box-shadow: -5px -5px 10px rgb(77, 77, 77);
}
h1 {
    width: 90%;
    margin: 0 auto;
    margin-bottom:3rem;
    font-weight: 800;
    text-align: center;
    padding-bottom:3rem;
    padding-top : 2rem;
    border-bottom: 4px solid white;
}
.deck a {
    text-decoration: none;
    color: #8a0083;
    font-weight: bold;
    font-size: 1.4rem;
}
h2 {
  margin-bottom:3rem;
}
  
</style>
</html>
