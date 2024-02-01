<?php
require_once __DIR__ . '../../../src/init.php';
require_once __DIR__ . '../../../src/db.php';
// $pdo est dispo !
dataconnect();
if (empty($_POST['mail'])) {
    // error
    $_SESSION['error_message'] = 'Champs email vide.';
    header('Location: /register.php'); // redirige utilisateur
    die(); // stop execution du script
}

if (empty($_POST['password'])) {
    // error
    $_SESSION['error_message'] = 'Champs password vide.';
    header('Location: /register.php'); // redirige utilisateur
    die(); // stop execution du script
}

if (filter_var($_POST['mail'], FILTER_VALIDATE_EMAIL) === false) {
    $_SESSION['error_message'] = "L'email est invalide";
    header('Location: /register.php'); // redirige utilisateur
    die(); // stop execution du script
}

if (strlen($_POST['password']) < 6) {
    $_SESSION['error_message'] = "Le mot de passe est trop petit (<6)";
    header('Location: /register.php'); // redirige utilisateur
    die(); // stop execution du script
}

$password = hash('sha256', $_POST['password']);

// // verifier que l'email n'est pas deja en DB
// $st1 = $pdo->prepare('SELECT * FROM users WHERE mail = ?');
// $st1->execute([$_POST['mail']]);
// $alreadyExists = $st1->fetch(PDO::FETCH_ASSOC);
// // $alreadyExists = [ 'username' => 'edouard', .... ];
// if ($alreadyExists != false) {
//     $_SESSION['error_message'] = 'Déjà inscrit.';
//     header('Location: /register.php'); // redirige utilisateur
//     die(); // stop execution du script
// }

// INSERT
$st2 = $bdd->prepare('INSERT INTO users(first_name, last_name, mail, password) VALUES(?, ?, ?, ?)');
$st2->execute([$_POST['first-name'], $_POST['last-name'], $_POST['mail'], $password]);

// recup id utilisateur
$_SESSION['user_id'] = $bdd->lastInsertId(); // connecté pour plus tard

header('Location: ../index.php'); // $_GET['success'] 
