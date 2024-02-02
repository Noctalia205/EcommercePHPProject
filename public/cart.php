<!DOCTYPE html>
<html lang="fr">
<?php require_once __DIR__ . '/../src/db.php'; ?>



<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
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
    <?php
    if (isset($_GET["id"])) {
        // $articleId = $_GET['id'];
        // $requests = $bdd->prepare("SELECT id, title, price, photo_path, stock FROM articles WHERE id = $articleId ");
        // $requests->execute(); 
        // $result = $requests->fetch();
        // var_dump($result);
        // var_dump($result[3]);

        // $pdoStatement = $bdd->prepare("INSERT INTO  orders (customer_id, articles_quantity, total_price, address) VALUES (?, ?, ?, ?) ");
        // $pdoStatement->bindParam(1, $result[0]);
        // $pdoStatement->bindParam(2, $result[2]);
        // $pdoStatement->bindParam(3, $result[4]);
        // $pdoStatement->bindParam(4, $result[4]);
        // $pdoStatement->execute();
        // var_dump("kiwi3");
        $articleId = $_GET['id'];
        //redirection page test 
        $requests = $bdd->prepare("SELECT id, title, price, photo_path, stock FROM articles WHERE id = ?");
        $requests->bindParam(1, $articleId);
        $requests->execute();

        $result = $requests->fetch(PDO::FETCH_ASSOC);
        print($result["id"]);
        print($result["price"]);
        print($result["stock"]);
        $id = $result["id"];
        $price = $result["price"];
        $stock = $result["stock"];

        $st2 = $bdd->prepare("INSERT INTO orders (customer_id, articles_quantity, total_price, address) VALUES (:customer_id, :articles_quantity, :total_price, :address)");

        $st2->execute([":customer_id" => 2, ":articles_quantity" => 2, ":total_price" => 19.99, ":address" => "tamerelapute"]);

        $st2->execute([":customer_id" => $id, ":articles_quantity" => $stock, ":total_price" => $price, ":address" => "tamerelapute"]);
    } ?>

    <ol class="m-5  list-group list-group-numbered">
        <li class="list-group-item">
            Rien
        </li>
    </ol>
</body>

</html>