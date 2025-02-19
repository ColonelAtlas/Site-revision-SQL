<?php 
session_start();

if (!isset($_SESSION['id'])) {
    header('Location: login.php');
    exit(); 
}
$conn = new PDO('mysql:host=localhost;dbname=account_app;charset=utf8', 'root', '');

// Récupérer les infos de l'utilisateur avec jointure pour l'image
$stmt = $conn->prepare("SELECT users.id, users.pseudo, 
COALESCE(images.image, 'default.png') AS image FROM users LEFT JOIN images ON users.id = images.id WHERE users.id = ?");
$stmt->execute([$_SESSION['id']]);
$user = $stmt->fetch(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier le profil</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="a.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
<script src='https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js'></script><ap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="profil.css">
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
    <div class="d-flex justify-content-center align-items-center vh-100">
    <form class="shadow w-450 p-3" action="php/edit.php" method="post" enctype="multipart/form-data">
        <h4 class="display-4 fs-1">Modifier le profil</h4><br>

<!-- Message d'erreur -->
        <?php if(isset($_GET['error'])) { ?>
        <div class="alert alert-danger"><?php echo $_GET['error']; ?></div>
        <?php } ?>

<!-- Message de succès -->
        <?php if(isset($_GET['success'])) { ?>
        <div class="alert alert-success"><?php echo $_GET['success']; ?></div>
        <?php } ?>

<div class="mb-3">
    <label class="form-label">Pseudo</label>
    <input type="text" class="form-control" name="pseudo" value="<?php echo htmlspecialchars($user['pseudo']); ?>">
</div>

<div class="mb-3">
    <label class="form-label">Mot de passe (laisser vide pour ne pas changer)</label>
    <input type="password" class="form-control" name="mdp" autocomplete="new-password">
</div>

<div class="mb-3">
    <label class="form-label">Photo de profil</label>
    <input type="file" class="form-control" name="image">
    <img src="upload/<?php echo $user['image']; ?>" class="rounded-circle " style="width: 140px; height: 140px; margin-top:2rem; margin-bottom:1.3rem">
    <input type="hidden" name="old_image" value="<?php echo $user['image']; ?>">
</div>

<button type="submit" class="btn btn-primary">Mettre à jour</button>
<a href="profil.php"  style="color:white;text-decoration:none;float:right;margin-right:2rem;margin-top:0.5rem">retour</a>
</form>
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

