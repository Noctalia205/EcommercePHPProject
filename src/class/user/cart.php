<?php require_once   '../../db.php'; ?>
<?php require_once  '../../init.php'; ?>

<!DOCTYPE html>
<html lang="fr">
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
     if (isset($_GET["submit"])) {
        $articleId = $_GET['submit'];
        $requests = $bdd->prepare("SELECT id, title, price, photo_path, stock FROM articles WHERE id = :articleId ");
        $requests->bindParam(':articleId', $articleId);
        $requests->execute();
        $result = $requests->fetchAll(PDO::FETCH_ASSOC);
        // var_dump($result);
        // var_dump($result[0]["title"]);

        $pdoStatement = $bdd->prepare("INSERT INTO  orders (customer_id, articles_quantity, total_price, address) VALUES (?, ?, ?, ?) ");
        $pdoStatement->execute([$result[0]["id"],$result[0]["price"], $result[0]["stock"], $result[0]["stock"]]);
        $products = $bdd->prepare("SELECT title, price, stock FROM articles");   
        $products->execute();
        $allProduct = $products->fetch();
        var_dump($allProduct);

     }?>
    
      <ol class="list-group list-group-numbered">
        <?php  foreach($allProduct as $product) :  ?>
       <?php var_dump($product[2]); ?>
       <?php var_dump($product->price); ?>

      <li class="list-group-item"><?php $product->title  ?>
    </li>
    <?php endforeach; ?>
      </ol>

</body>
</html>

