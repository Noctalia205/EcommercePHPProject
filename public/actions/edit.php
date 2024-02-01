<?php
require_once __DIR__ . '../../../src/init.php';

try {
  /////////////////////////////////////
  // MODIFY ELEMENT //
  /////////////////////////////////////
  $pdoStatement = $bdd->prepare("UPDATE table
                                  SET nom_colonne_1 = 'nouvelle valeur'
                                  WHERE condition");
  $pdoStatement->execute([
    ':articleid' => $_POST['a']],
    ':articleid' => $_POST['a']],
    ':articleid' => $_POST['a']]

  );
} catch (PDOException $e) {
  $errMessage = $e->getMessage();
  echo $errMessage;
}

header('Location: ../../src/class/admin/log_articles.php');

?>