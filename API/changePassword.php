<?php

session_start();

if ( $_SERVER['REQUEST_METHOD'] != 'POST' || !isset($_SESSION['user']) )
{
  $_SESSION['message'] = "Bad request";
  header('Location: ' . $LOCATION . '/acceuil');
  exit;
}

require_once $ROOT . "/Models/User.php" ;
$User = unserialize($_SESSION['user']) ;

if ( !isset($_POST['password']) || !isset($_POST['password-c']) )
{
  header('Location: ' . $LOCATION . '/mot-de-passe');
  exit;
}

$login           = $_SESSION['user'];
$newpassword     = htmlentities($_POST['password']);
$confirmpassword = htmlentities($_POST['password-c']);

if ( $newpassword != $confirmpassword )
{
  $_SESSION['message'] = "Error: the two passwords are different.";
  header('Location: ' . $LOCATION . '/mot-de-passe');
  exit;
}

require_once $ROOT . '/Models/AccessDB.php' ;
require_once $ROOT . '/DBConfig.php';

try
{
  $db = new PDO("mysql:host=" . $DBConfig->DBHost . ";dbname=" . $DBConfig->DBName, $DBConfig->DBUser, $DBConfig->DBPassword);
}
catch (PDOException $e)
{
  $_SESSION['message'] = $e->getMessage();
  header('Location: ' . $LOCATION . '/mot-de-passe');
  exit;
}

Model_Base::set_db( $db );

try {
  require_once $ROOT . '/Controllers/UserController.php' ;
  UserController::changePassword($User, $newpassword) ;
}
catch (Exception $e)
{
  $_SESSION['message'] = $e;
  header('Location: ' . $LOCATION . '/mot-de-passe');
  exit;
}

// Si la requête a été exécutée avec succès
$_SESSION['message'] = "Password successfully updated.";
header('Location: ' . $LOCATION . '/acceuil');
exit;
