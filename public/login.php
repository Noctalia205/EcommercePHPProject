<?php
require_once __DIR__ . '/../src/init.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, 
    initial-scale=1.0">
    <link href="assets/login.css" rel="stylesheet">
    
    <title>Login</title>
</head>

<body>
    <?php require_once __DIR__ . '/../src/partials/menu.php'; ?>
    <?php require_once __DIR__ . '/../src/partials/show_error.php';?>

    <div class="register">
    <form method="POST" id="login-form" class="login-form" autocomplete="off" role="main" action='actions/login.php'>
  <h1 class="a11y-hidden"> Login Form </h1>
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
      <input type="text" class="text" name="password" placeholder="Confirm Password" tabindex="2" required />
      <span class="required"> Password</span>
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