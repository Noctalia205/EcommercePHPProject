<?php 
require_once '../../init.php';

$user_id = $_SESSION['user_id'];

try {
    //////////////////////////
    // GET ALL USER ORDERS  //
    //////////////////////////
    $pdoStatement = $bdd->prepare("SELECT * FROM orders WHERE customer_id = '$user_id';");
    $pdoStatement->execute();
    $allOrders = $pdoStatement->fetchAll();
    //var_dump($allProducts);
} catch (PDOException $e) {
    $errMessage = $e->getMessage();
    echo $errMessage;
}
?>

<!DOCTYPE html>
<html lang="en">

    <head>
        <title> Order History </title>
        <?php require_once SITE_ROOT.'src/partials/head_css.php' ; ?>
    </head>

    <body>

    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="">Notre Super site Ecommerce</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/">Home</a>
                    </li>
                    <?php
                    if ($user === false) { ?>
                        <li class="nav-item">
                            <a class="nav-link " aria-current="page" href="register.php">Sign Up</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="login.php">Login</a>
                        </li>
                    <?php } else { ?>
                        <li class="nav-item">
                            <a class="nav-link" href="actions/logout.php">Log Out </a>
                        </li>
                    <?php } ?>
                </ul>
            </div>
        </div>
    </nav>

        <h1> Historique des commandes </h1>
        <main id="table">
            <table>
                <thead>
                    <tr>
                        <th> N° de commande </th>
                        <th> Date </th>
                        <th> Prix total </th>
                        <th> Adresse de facturation </th>
                        <th> Statut </th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($allOrders as $info) : ?>
                        <tr>
                            <td><?php echo $info[0]?></td>
                            <td><?php echo $info[3]?></td>
                            <td><?php echo $info[4]?></td>
                            <td><?php echo $info[5]?></td>
                            <td><?php echo $info[6]?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </main>
    </body>
</html>