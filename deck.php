<?php

session_start();


$bdd = new PDO('mysql:host=localhost;dbname=account_app;charset=utf8', 'root', '');


if (isset($_GET['id_chapitre']) && !empty($_GET['id_chapitre']) && isset($_GET['id_deck']) && !empty($_GET['id_deck'])) {
    $id_chapitre = intval($_GET['id_chapitre']);
    $id_deck = intval($_GET['id_deck']);


    if (!isset($_SESSION['questions']) || $_SESSION['current_question'] === null) {

        $reqCartes = $bdd->prepare('SELECT * FROM cartes WHERE id_chapitre = ? AND id_deck = ? ORDER BY RAND() LIMIT 10');
        $reqCartes->execute([$id_chapitre, $id_deck]);
        $_SESSION['questions'] = $reqCartes->fetchAll();
        $_SESSION['current_question'] = 0; 
        $_SESSION['score'] = 0; 
    }

    $questions = $_SESSION['questions'];
    $current_question_index = $_SESSION['current_question'];


    if ($current_question_index >= count($questions)) {
        $score = $_SESSION['score'];
        $total_questions = count($questions);

   
        session_destroy();
        echo "<!DOCTYPE html>
        <html lang='en'>
        <head>
            <meta charset='UTF-8'>
            <meta name='viewport' content='width=device-width, initial-scale=1.0'>
            <title>Résultat du QCM</title>
            <style>
                body {
                    font-family: Arial, sans-serif;
                    text-align: center;
                    margin: 0;
                    padding: 0;
                    background-size: cover;
                    background-image: url('abstract-dark-colorful-digital-art-yi-3840x2400.jpg')
                }
                .container {
                    margin-top: 50px;
                    padding: 20px;
                    background: #ffffff;
                    box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
                    border-radius: 8px;
                    max-width: 600px;
                    margin-left: auto;
                    margin-right: auto;
                }
                .score {
                    font-size: 24px;
                    font-weight: bold;
                }
                .back-button {
                    margin-top: 20px;
                    padding: 10px 20px;
                    background: #333;
                    color: #fff;
                    text-decoration: none;
                    border-radius: 4px;
                }
                .back-button:hover {
                    background: #555;
                }
            </style>
        </head>
        <body>
            <div class='container'>
                <h1>Quiz terminé !</h1>
                <p class='score'>Votre score : $score / $total_questions</p>
                <a class='back-button' href='chapitres.php?id_deck=$id_deck'>Retour aux chapitres</a>
            </div>
        </body>
        </html>";
        exit;
    }

   
    $current_question = $questions[$current_question_index];


    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $reponse_utilisateur = $_POST['reponse'] ?? '';
        if ($reponse_utilisateur === $current_question['reponse_vrai']) {
            $_SESSION['score']++;
        }
        $_SESSION['current_question']++; 
        header("Location: deck.php?id_chapitre=$id_chapitre&id_deck=$id_deck");
        exit;
    }
} else {
    die('Paramètres manquants ou invalides.');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Question <?php echo $current_question_index + 1; ?></title>
    <style>
        
        .container {
            max-width: 800px;
            margin: 50px auto;
            padding: 20px;
            background: #ffffff;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }
        .progress-bar {
            height: 20px;
            background: #e6e6e6;
            border-radius: 10px;
            overflow: hidden;
            margin-bottom: 20px;
        }
        .progress {
            height: 100%;
            background: #4caf50;
            width: <?php echo (($current_question_index + 1) / count($questions)) * 100; ?>%;
            transition: width 0.3s;
        }
        .question {
            margin-bottom: 20px;
        }
        .answers label {
            display: block;
            margin: 5px 0;
            background: #e6e6e6;
            padding: 10px;
            border-radius: 4px;
            cursor: pointer;
        }
        .answers label:hover {
            background: #d1d1d1;
        }
        .submit-button {
            margin-top: 20px;
            display: block;
            width: 100%;
            padding: 10px;
            background: #333;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }
        .submit-button:hover {
            background: #555;
        }
    </style>
    <style>
    body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
    margin: 0;
    padding: 0;
    background-size: cover;
    background-image: url('abstract-dark-colorful-digital-art-yi-3840x2400.jpg');
}
</style>
</head>
<body>
    <div class="container">
        <div class="progress-bar">
            <div class="progress"></div>
        </div>
        <div class="question">
            <h2>Question <?php echo $current_question_index + 1; ?> :</h2>
            <p><?php echo htmlspecialchars($current_question['question']); ?></p>
            <form method="POST" action="">
                <div class="answers">
                    <?php
                    $reponses = [
                        htmlspecialchars($current_question['reponse_vrai']),
                        htmlspecialchars($current_question['reponse_fausse1']),
                        htmlspecialchars($current_question['reponse_fausse2']),
                        htmlspecialchars($current_question['reponse_fausse3']),
                    ];
                    shuffle($reponses);
                    ?>
                    <?php foreach ($reponses as $reponse): ?>
                        <label>
                            <input type="radio" name="reponse" value="<?php echo $reponse; ?>" required>
                            <?php echo $reponse; ?>
                        </label>
                    <?php endforeach; ?>
                </div>
                <button type="submit" class="submit-button">Valider</button>
            </form>
        </div>
    </div>
</body>
</html>
