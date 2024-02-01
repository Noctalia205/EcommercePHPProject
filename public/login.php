<?php 
require_once __DIR__ . '/../src/init.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <?php require_once __DIR__ . '/../src/partials/menu.php'; ?>
    <?php require_once __DIR__ . '/../src/partials/show_error.php'; ?>
    <?php require_once DIR . '/../src/init.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    //////////////////
    // LET ME CHECK//
    ////////////////
    $email = $_POST['email'];
    $password = $_POST['password'];
    $rememberme = isset($_POST['rememberme']) ? $_POST['rememberme'] : '';
    //////////////////
    // DO WE KNOW U?//
    /////////////////
    $user = getUserByEmail($email);

    if ($user && password_verify($password, $user['password'])) {
        //////////////
        //U CAN PASS//
        /////////////
        session_start();
        $_SESSION['user_id'] = $user['id'];
    ////////////////////////////////
    // GO BACK TO UR loging page//
    /////////////////////////////
    header('Location: /');
    exit;
    }
    else {
    //////////////////////////
    //ARE U SURE ABOUT THAT//
    ////////////////////////
    $error = "Invalid email or password";
    $_SESSION['error'] = $error;
    header('Location: /login.php');
    exit;
    }
    } else {
    //////////////////////////////////////////
    // IF NOT POST GO BACK TO UR loging page//
    //////////////////////////////////////////
    header('Location: /login.php');
    exit;
    }
?>

    <form action="/actions/login.php" method="post">
        <div>
            <label for="email">Email:</label>
            <input type="text" name="email" id="email">
        </div>
        <div>
            <label for="password">Password:</label>
            <input type="password" name="password" id="password">
        </div>
        <div>
            <label for="rememberme">Remember Me</label>
            <input type="checkbox" name="rememberme" id="rememberme" value="yes">
        </div>
        <div>
            <button type="submit">LOG ME IN !</button>
        </div>
    </form>
</body>
</html>
