<?php
session_start();
$conn = new PDO('mysql:host=localhost;dbname=account_app;charset=utf8','root','');

if (!isset($_SESSION['id'])) {
    header('Location: login.php');
    exit();
}

if (isset($_SESSION['id']) && isset($_SESSION['pseudo'])) {

    $stmt = $conn->prepare("SELECT users.id, users.pseudo, users.ttl_quizz, users.created_at,
                                   COALESCE(images.image, 'avatar.jpg') AS image 
                            FROM users 
                            LEFT JOIN images ON users.id = images.id 
                            WHERE users.id = ?");
    $stmt->execute([$_SESSION['id']]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="profil.css">
    <link rel="stylesheet" type="text/css" href="a.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
<script src='https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js'></script><ap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
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
    <div class="container mt-5">
        <div class="card mx-auto shadow" style="max-width: 400px;">
            <div class="card-body text-center">
                <img src="upload/<?php echo htmlspecialchars($user['image']); ?>" class="rounded-circle" >
                <h3><?php echo htmlspecialchars($user['pseudo']); ?></h3>
                <p>ID : <?php echo htmlspecialchars($user['id']); ?></p>
                <p>Nombre total de quiz terminés: <strong><?php echo htmlspecialchars($user['ttl_quizz']); ?></strong></p>
                <p>Compte créé le: <strong><?php echo date('d/m/Y', strtotime($user['created_at'])); ?></strong></p>
                <a href="edit.php" class="btn btn-primary">Modifier le profil</a>
                <a href="deconnexion.php" class="btn btn-danger">Déconnexion</a>
            </div>
        </div>
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

<?php 
} else {
    header("Location: login.php");
    exit;
} 
?>
