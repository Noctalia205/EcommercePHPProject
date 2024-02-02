<?php
require_once __DIR__ . '../../../src/init.php';
require_once __DIR__ . '../../../src/db.php';

$title = $_POST["title"];
$price = $_POST["price"];
$stock = $_POST["stock"];
$description = $_POST["description"];

$pdoStatement = $bdd->prepare("INSERT INTO articles (title, description, price, stock, photo_path) VALUES
                               ('$title', '$description', '$price', '$stock', 'none');");
    $pdoStatement->execute([]);

header('Location: ../../src/class/admin/log_articles.php');
?>