<?php  
session_start();

if (!isset($_SESSION['id'])) {
    header('Location: login.php');
    exit(); 
}
$conn = new PDO('mysql:host=localhost;dbname=account_app;charset=utf8', 'root', '');

if (isset($_SESSION['id']) && isset($_SESSION['pseudo'])) {
    if (isset($_POST['pseudo'])) {
        

        $id = $_SESSION['id'];
        $pseudo = trim($_POST['pseudo']);
        $mdp = isset($_POST['mdp']) && !empty($_POST['mdp']) ? $_POST['mdp']: null;
        $old_image = $_POST['old_image'];

        // Vérifier que le pseudo n'est pas vide
        if (empty($pseudo)) {
            header("Location: ../edit.php?error=Le pseudo est requis");
            exit;
        }

        // Gestion de l'upload d'image
        if (isset($_FILES['image']['name']) && !empty($_FILES['image']['name'])) {
            $img_name = $_FILES['image']['name'];
            $tmp_name = $_FILES['image']['tmp_name'];
            $error = $_FILES['image']['error'];

            if ($error === 0) {
                $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
                $img_ex_to_lc = strtolower($img_ex);
                $allowed_exs = ['jpg', 'jpeg', 'png'];

                if (in_array($img_ex_to_lc, $allowed_exs)) {
                    $new_img_name = uniqid("user_", true) . '.' . $img_ex_to_lc;
                    $img_upload_path = '../upload/' . $new_img_name;

                    // Supprimer l'ancienne image sauf si c'est l'image par défaut
                    if ($old_image !== "default.png") {
                        @unlink("../upload/$old_image");
                    }

                    move_uploaded_file($tmp_name, $img_upload_path);

                    // Mettre à jour l'image dans la table `images`
                    $stmt = $conn->prepare("INSERT INTO images (id, image) VALUES (?, ?) 
                                            ON DUPLICATE KEY UPDATE image = ?");
                    $stmt->execute([$id, $new_img_name, $new_img_name]);
                } else {
                    header("Location: ../edit.php?error=Format d'image non autorisé");
                    exit;
                }
            } else {
                header("Location: ../edit.php?error=Erreur lors du téléchargement de l'image");
                exit;
            }
        }

        // Mise à jour des informations de l'utilisateur
        if ($mdp) {
            $stmt = $conn->prepare("UPDATE users SET pseudo = ?, mdp = ? WHERE id = ?");
            $stmt->execute([$pseudo, $mdp, $id]);
        } else {
            $stmt = $conn->prepare("UPDATE users SET pseudo = ? WHERE id = ?");
            $stmt->execute([$pseudo, $id]);
        }

        $_SESSION['pseudo'] = $pseudo;
        header("Location: ../edit.php?success=Profil mis à jour avec succès");
        exit;

    } else {
        header("Location: ../edit.php?error=Erreur");
        exit;
    }
} else {
    header("Location: login.php");
    exit;
}
?>