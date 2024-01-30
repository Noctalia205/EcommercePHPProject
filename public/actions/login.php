<?php 

session_start();
session_unset();
session_destroy();
session_abort();
$ok = 0;
if (isset($_POST['rememberme']) && $_POST['rememberme'] === 'yes') {
    $ok = session_set_cookie_params(1000000);
}

// require ici

session_start();

var_dump($_POST, $ok);

// traitement classique
