<?php

try {
  $bdd = new PDO("mysql:host=localhost;dbname=ECOMMERCE", "root", "");
  $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (Exception $e) {


  die("Une erreur a été trouvée : " . $e->getMessage());
}
$bdd->query("SET NAMES UTF8");

define('PROJECT_FOLDER', '/ECOMMERCE/');
define('SITE_ROOT', $_SERVER['DOCUMENT_ROOT'] . PROJECT_FOLDER);

function dataconnect()
{
  ini_set('display_errors', 1);
  ini_set('display_startup_errors', 1);
  error_reporting(E_ALL);

  try {
    $bdd = new PDO("mysql:host=localhost;dbname=ECOMMERCE", "root", "root");
    return $bdd;
  } catch (PDOException $e) {
    echo 'La connexion à la base de données a échouée.';
  }
  // return dataconnect();
}
