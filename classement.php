<?php
session_start();
$conn = new PDO('mysql:host=localhost;dbname=account_app;charset=utf8', 'root', '');

$stmt = $conn->prepare("SELECT pseudo, ttl_quizz, 
                               COALESCE(images.image, 'avatar.jpg') AS image 
                        FROM users 
                        LEFT JOIN images ON users.id = images.id 
                        ORDER BY ttl_quizz DESC 
                        LIMIT 10");
$stmt->execute();
$users = $stmt->fetchAll(PDO::FETCH_ASSOC);

$stmta = $conn->prepare("SELECT users.id, users.pseudo, 
                                       COALESCE(images.image, 'avatar.jpg') AS image 
                                FROM users 
                                LEFT JOIN images ON users.id = images.id 
                                WHERE users.id = ?");
        $stmta->execute([$_SESSION['id']]);
        $usera = $stmta->fetch(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Classement</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="a.css">
    <link rel="stylesheet" type="text/css" href="classement.css">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
<script src='https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js'></script><ap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark" style="border-bottom:3px solid">
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
                      <img src="upload/<?php echo $usera['image']; ?> ">
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


     <div class="container mt-5" style="width:fit-content; ">
        <h2 class="text-center" style="color:white">🏆 Classement des meilleurs joueurs 🏆</h2>
        <table class="table table-striped mt-4">
            <thead>
                <tr>
                    <th>Rang</th>
                    <th>Avatar</th>
                    <th>Pseudo</th>
                    <th>Quizz Terminés</th>
                </tr>
            </thead>
            <tbody>
                <?php $rank = 1; ?>
                <?php foreach ($users as $user): ?>
                    <tr>
                        <td>#<?php echo $rank++; ?></td>
                        <td><img src="upload/<?php echo htmlspecialchars($user['image']); ?>" class="avatar"></td>
                        <td><?php echo htmlspecialchars($user['pseudo']); ?></td>
                        <td><?php echo htmlspecialchars($user['ttl_quizz']); ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
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
</html>
