<?php
require_once __DIR__ . '../../../src/init.php';
require_once __DIR__ . '../../../src/db.php';

$address = $_POST["address"];
$userId = $_SESSION['user_id'];
$totalPrice = $_SESSION['total_price'];
$quantity = count($_SESSION['cart_contents']);

$pdoStatement = $bdd->prepare("INSERT INTO orders (customer_id, articles_quantity, total_price, `address`, status) VALUES
                               ('$userId', $quantity, '$totalPrice', '$address', 'Nouvelle');");
    $pdoStatement->execute([]);

$_SESSION['cart-contents'] = array();

header('Location: ../../src/class/user/orders_history.php');
?>