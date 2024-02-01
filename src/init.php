<?php
session_start();

require_once __DIR__ . '/db.php';

// require des utilitaires *utils*
// require les classes

$user = false;
if (isset($_SESSION['user_id'])) {
    $st = $bdd->prepare('SELECT * FROM users WHERE id = ?');
//    $st = $pdo->prepare('SELECT * FROM users WHERE id = :user_id');
//    $st->execute(['user_id' => $_SESSION['user_id']]);
    $st->execute([$_SESSION['user_id']]);
    $user = $st->fetch(PDO::FETCH_ASSOC);
}
// ARE U SURE ABOUT THAT FUNCTION //
function userConnection($email, $password) {
    global $bdd;

    $newpassword = hash('sha256', $password);

    $stmt = $bdd->prepare("SELECT * FROM users WHERE mail = '$email' AND password = '$newpassword';");
    $stmt->execute([]);
    $user = $stmt->fetch();

    return $user;
}

function adminConnection($email,$password) {
    global $bdd;

    $stmt = $bdd->prepare("SELECT * FROM admin WHERE mail = '$email' AND password = '$password';");
    $stmt->execute([]);
    $user = $stmt->fetch();

    return $user;
}

?>