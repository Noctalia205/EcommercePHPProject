<?php
session_start();

require_once __DIR__ . '/db.php';

// require des utilitaires *utils*

// require les classes

$user = false;
if (isset($_SESSION['user_id'])) {
    $st = $pdo->prepare('SELECT * FROM users WHERE id = ?');
//    $st = $pdo->prepare('SELECT * FROM users WHERE id = :user_id');
//    $st->execute(['user_id' => $_SESSION['user_id']]);
    $st->execute([$_SESSION['user_id']]);
    $user = $st->fetch(PDO::FETCH_ASSOC);
}
