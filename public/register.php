<?php 
require_once __DIR__ . '/../src/init.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="assets/stylesheet.css" rel="stylesheet">
    <title>Register</title>
    <link href="assets/login.css" rel="stylesheet">

</head>
<body>
    <?php require_once __DIR__ . '/../src/partials/show_error.php'; ?>

    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="">Notre Super site Ecommerce</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="index.php">Home</a>
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
<div class="register">
    <form method="POST" action="actions/register.php" id="login-form" class="login-form" autocomplete="off" role="main">
  <h1 class="a11y-hidden">Login Form</h1>
  <div>
    <label class="label-email">
      <input type="email" class="text" name="mail" placeholder="Email" required />
      <span class="required">Email</span>
    </label>
  </div>
  <input type="checkbox" name="password" class="show-password a11y-hidden" id="show-password" tabindex="3" />
  <label class="label-show-password" for="show-password">
  </label>
  <div>
    <label class="label-password">
      <input type="password" class="text" name="cpassword" placeholder="Password" tabindex="2" required />
      <span class="required">Password</span>
    </label>
  </div>
  <div>
    <label class="label-password">
      <input type="text" class="text" name="password" placeholder="Confirm Password" tabindex="2" required />
      <span class="required">Confirm Password</span>
    </label>
  </div>
  <div>
    <label class="label-password">
      <input type="text" class="text" name="first-name" placeholder="FisrtName" tabindex="2" required />
      <span class="required">First Name</span>
    </label>
  </div>
  <div>
    <label class="label-password">
      <input type="text" class="text" name="last-name" placeholder="Last Name" tabindex="2" required />
      <span class="required">Last Name</span>
    </label>
  </div>
  <input type="submit" value="Log In" />
  <figure aria-hidden="true">
    <div class="person-body"></div>
    <div class="neck skin"></div>
    <div class="head skin">
      <div class="eyes"></div>
      <div class="mouth"></div>
    </div>
    <div class="hair"></div>
    <div class="ears"></div>
    <div class="shirt-1"></div>
    <div class="shirt-2"></div>
  </figure>
</form>
</div>
  
</body>
</html>
