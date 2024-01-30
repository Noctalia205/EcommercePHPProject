<?php 
require_once __DIR__ . '/../src/init.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
</head>
<body>
    <?php require_once __DIR__ . '/../src/partials/menu.php'; ?>
    <?php require_once __DIR__ . '/../src/partials/show_error.php'; ?>

    <form action="/actions/register.php" method="post">
        <div>
            <label for="email">Email:</label>
            <input type="text" name="email" id="email">
        </div>
        <div>
            <label for="password">Password:</label>
            <input type="password" name="password" id="password">
        </div>
        <div>
            <label for="cpassword">Confirm Password:</label>
            <input type="cpassword" name="cpassword" id="cpassword">
        </div>
        <div>
            <label for="username">Username:</label>
            <input type="username" name="username" id="username">
        </div>
        <div>
            <button type="submit">Register NOW!</button>
        </div>
    </form>
</body>
</html>
