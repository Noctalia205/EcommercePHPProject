<?php try
{
 $bdd = new PDO("mysql:host=localhost;dbname=bdr", "root", "");
 $bdd ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(Exception $e)
{
  die("Une érreur a été trouvé : " . $e->getMessage());
}
$bdd->query("SET NAMES UTF8");


define('PROJECT_FOLDER', '/docker-php-projet-starter-master/');
define('SITE_ROOT', $_SERVER['DOCUMENT_ROOT'] . PROJECT_FOLDER);
?>
