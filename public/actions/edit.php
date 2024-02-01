<?php
require_once __DIR__ . '../../../src/init.php';

$statement = ''; // variable containing all requests
$article_id =  $_GET['a'];


if ($_POST["title"]) { // if title modified
  $title = $_POST["title"];
  $statement .= "UPDATE articles SET title = '$title' WHERE id = '$article_id' ; ";
}
if ($_POST["price"]) {
  $price = $_POST["price"];
  $statement .= "UPDATE articles SET price = '$price' WHERE id = '$article_id' ; ";
}
if ($_POST["stock"]) {
  $stock = $_POST["stock"];
  $statement .= "UPDATE articles SET stock = '$stock' WHERE id = '$article_id' ; ";
}
if ($_POST["description"]) {
  $description = $_POST['description'];
  $statement .= "UPDATE articles SET description = '$description' WHERE id = '$article_id' ; ";
}

$pdoStatement = $bdd->prepare($statement);
  $pdoStatement->execute([]);

header('Location: ../../src/class/admin/log_articles.php');
?>