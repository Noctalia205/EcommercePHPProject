<?php
require_once __DIR__ . '../../../src/init.php';
require_once __DIR__ . '../../../src/db.php';

try {
    /////////////////////////////////////
    // DELETE SPECIFIC ELEMENT FROM DB //
    /////////////////////////////////////
    $pdoStatement = $bdd->prepare("DELETE FROM articles WHERE id=:articleid");
    $pdoStatement->execute([':articleid' => $_GET['a']]);
} catch (PDOException $e) {
    $errMessage = $e->getMessage();
    echo $errMessage;
}

header('Location: ../../src/class/admin/log_articles.php');
?>