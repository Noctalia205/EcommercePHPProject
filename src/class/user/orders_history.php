<?php 
require_once '../../init.php';

var_dump($_SESSION);

/*
try {
    //////////////////////////
    // GET ALL USER ORDERS  //
    //////////////////////////
    $pdoStatement = $bdd->prepare("SELECT * FROM articles;");
    $pdoStatement->execute();
    $allProducts = $pdoStatement->fetchAll();
    //var_dump($allProducts);
} catch (PDOException $e) {
    $errMessage = $e->getMessage();
    echo $errMessage;
} */
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title> Order History </title>
    <?php require_once SITE_ROOT.'src/partials/head_css.php' ; ?>
</head>

<body>