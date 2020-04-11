<?php
if ($_SERVER['REQUEST_METHOD'] != 'POST')
{
  header('Location: ' . $LOCATION . '/connexion');
  exit;
}

session_start();
unset($_SESSION['message']);

if ( !isset($_POST['user']) || !isset($_POST['password']) )
{
  header('Location: ' . $LOCATION . '/connexion');
  exit;
}

$login = htmlentities($_POST['user']);
$password = htmlentities($_POST['password']);

//-----------------------------------------------------------------------------
// Fichier contenant les informations de connexion à la BDD
require_once $ROOT . '/Models/AccessDB.php';
require_once $ROOT . '/DBConfig.php';

try
{
    $db = new PDO("mysql:host=" . $DBConfig->DBHost . ";dbname=" . $DBConfig->DBName, $DBConfig->DBUser, $DBConfig->DBPassword);
}
catch (PDOException $e)
{
  $_SESSION['message'] = $e->getMessage();
  header('Location: ' . $LOCATION . '/connexion');
  exit;
}

require_once $ROOT . '/Models/User.php';

Model_Base::set_db( $db );

require_once $ROOT . "/Controllers/UserController.php" ;
$user = UserController::getUserByUsername($login) ;
$user->password = $password ;

if ( !UserController::log($user) )
{
    $_SESSION['message'] = "Wrong login or password .";
    header('Location: ' . $LOCATION . '/connexion');
    exit;
}

$_SESSION['user'] = serialize($user);

if($_POST['password'] == ""){
  header('Location: ' . $LOCATION . '/mot-de-passe-faible');
}else{
  header('Location: ' . $LOCATION . '/acceuil');
}
exit;
