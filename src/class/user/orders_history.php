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