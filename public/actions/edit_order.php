<?php
require_once __DIR__ . '../../../src/init.php';

$order_id =  $_GET['a'];
$status = $_POST["status"];

$pdoStatement = $bdd->prepare("UPDATE orders
                                SET status = '$status', last_modified = CURRENT_TIMESTAMP
                                WHERE id = '$order_id'; ");
  $pdoStatement->execute([]);

header('Location: ../../src/class/admin/log_articles.php');
?>