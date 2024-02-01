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
//////////////////////////////////
//ARE U SURE ABOUT THAT FUNCTION//
/////////////////////////////////
function getUserByEmail($email) {
    global $db;

    $stmt = $db->prepare("SELECT * FROM users WHERE mail = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();
    $stmt->close();

    return $user;
}

function adminConnection($email) {
    global $db;

    $stmt = $db->prepare("SELECT * FROM admin WHERE mail = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();
    $stmt->close();

    return $user;
}

?>