<?php
require_once __DIR__ . '/../src/init.php';
require_once __DIR__ . '/../src/db.php';
//////////////////////////////
// GET ALL PRODUCTS FROM DB //
$pdoStatement = $bdd->prepare("SELECT * FROM articles;");
$pdoStatement->execute();
$allProducts = $pdoStatement->fetchAll();
//var_dump($allProducts);

$num;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Bonjour</title>
    <?php require_once SITE_ROOT.'src/partials/head_css.php' ; ?>
</head>

<body>

    <!-- BACKGROUND VIDEO -->
    <div class='index-box'> 
        <video id="background-video" autoplay loop muted poster="assets/background.mp4">
            <source src="assets/background.mp4" type="video/mp4">
        </video>
    </div>

    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="">Notre Super site Ecommerce</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
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
                <form class="d-flex" role="search">
                    <input class="form-control me-2" type="search" name="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" name="submit" type="submit">Search</button>
                </form>
            </div>
        </div>
    </nav>

    <section class="section1" style="display:flex; flex-wrap: wrap; "> 
        <?php
                if (isset($_GET['submit'])) {
                    $str = $_GET['search'];
                    $requests = $bdd->query("SELECT title, price, photo_path  FROM articles WHERE title like '%$str%' ")->fetchALL();
                    if ($_GET['search']) {
                ?>                  
                 <?php foreach ($requests as $request) : ?>
                <div class="card" style="width: 18rem;">
                <a href="product_page.php"> <img src="<?= '../' . $infos['photo_path'] ?>" class="card-img-top"  alt="..."> </a>
                    <div class="card-body"> // on click system 
                        <h5 class="card-title"> <?php echo $request['title'] ?></h5>
                        <h5 class="card-price"> <?php echo $request['price'] ?></h5> 
                        <a href="#" class="btn btn-primary"> Add to cart </a>
                    </div>
                </div>
        <?php endforeach; ?>
                <?php } ?>
                <?php } else { ?>
                     <?php foreach ($allProducts as $infos) :
                    ?>
                <div class="card" style="width: 18rem;">
                <a href="product_page.php"> <img src="<?= '../' . $infos['photo_path'] ?>" class="card-img-top"  alt="..."> </a>
                    <div class="card-body">
                        <h5 class="card-title"> <?php echo $infos['title'] ?></h5>
                        <h5 class="card-price"> <?php echo $infos['price'] ?></h5>
                        <a href="#" class="btn btn-primary"> Add to cart </a>
                    </div>
                </div>
        <?php endforeach; ?>
                <?php } ?>

       
    </section>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>
</html>