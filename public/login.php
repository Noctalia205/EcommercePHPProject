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
    <?php require_once __DIR__ . '/../src/partials/show_error.php';

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // get all post values
        $email = $_POST['mail'];
        $password = $_POST['password'];
        $rememberme = isset($_POST['rememberme']) ? $_POST['rememberme'] : '';

        // check if admin
        $user = adminConnection($email,$password);
        var_dump($user);

        // if not admin check if user
        if (!$user) {
            $user = userConnexion($email, $password);

            if ($user != null) {
                // accurate email and password entered
                 session_start();
                $_SESSION['user_id'] = $user['id'];
                echo 'Welcome !';
            exit;
            } else {
                $error = "Invalid email or password";
                $_SESSION['error'] = $error;
        
                echo 'Invalid email or password';
                exit;
            }
        } else {
            echo 'Welcome, Admin !';
        }
    }
    ?>

    <div class="register">
    <form method="POST" id="login-form" class="login-form" autocomplete="off" role="main">
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
