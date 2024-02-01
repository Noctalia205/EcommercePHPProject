<!DOCTYPE html>
<html lang="en">
<?php require_once __DIR__ . '/../..//init.php'; ?>
<?php require_once SITE_ROOT . 'src/partials/head_css.php'; 
?>

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
                <form action="../src/class/user/cart.php" method="GET">
                <input type="submit" value="Cart" />
                  <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                    <!-- 99+ -->
                    <span class="visually-hidden">unread messages</span>
                  </span>
                </button>
                </form>
                
               
            </div>
        </div>
 </nav>
    
   
    <form method='post' action='../../../public/actions/edit.php'>
      <input type="text" id="title-field" name="title-field" placeholder='Titre'>
      <input type="text" id="price-field" name="price-field" placeholder='Prix'>
      <input type="text" id="stock-field" name="stock-field" placeholder='Stock'>
      <input type="text" id="description-field" name="description-field" placeholder='Description'>
      <input type="submit" id="submit" name="submit" value='submit'>
    </form>

</body>
</html>