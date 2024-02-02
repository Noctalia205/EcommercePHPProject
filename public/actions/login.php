<?php
require_once __DIR__ . '../../../src/init.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // get all post values
    $email = $_POST['mail'];
    $password = $_POST['password'];
    $rememberme = isset($_POST['rememberme']) ? $_POST['rememberme'] : '';

    // check if admin
    $user = adminConnection($email, $password);

    // if not admin
    if (!$user) {
      // check if user
        $user = userConnection($email, $password);

        // if user found
        if ($user) {
        // accurate email and password entered
            if (isset($_SESSION)) {
                session_unset();
                session_destroy();
                session_abort();
            }
            
            $ok = 0;
            if (isset($_POST['rememberme']) && $_POST['rememberme'] === 'yes') {
                $ok = session_set_cookie_params(1000000);
            }

            session_start();
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['cart_contents'] = array();
            var_dump($_SESSION);
            //var_dump($_POST, $ok);

            header ('Location: ../');

        } else {
          $error = "Invalid email or password";
          $_SESSION['error'] = $error;
          echo 'Invalid email or password';
          exit;
        }
    } else {
      header ('Location: ../../src/class/admin/log_articles.php');
    }
}





// require ici



// traitement classique

//header ('Location: ../index.php');



?>