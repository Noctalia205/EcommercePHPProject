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


    <form action="actions/register.php" method="post">
        <div>
            <label for="mail">Email:</label>
            <input type="text" name="mail" id="mail">
        </div>
        <div>
            <label for="password">Password:</label>
            <input type="password" name="password" id="password">
        </div>
        <div>
            <label for="cpassword">Confirm Password:</label>
            <input type="password" name="cpassword" id="cpassword">
        </div>
        <div>
            <label for="first-name">First name :</label>
            <input type="first-name" name="first-name" id="first-name">
        </div>
        <div>
            <label for="last-name">Last name :</label>
            <input type="last-name" name="last-name" id="last-name">
        </div>
        <div>
            <button type="submit">Register NOW!</button>
        </div>
    </form>
    <?php 
    ?>
</body>
</html>
