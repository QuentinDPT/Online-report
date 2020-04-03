<?php
require_once $ROOT . '/Models/AccessDB.php' ;
require_once $ROOT . '/DBConfig.php';
require_once $ROOT . '/Models/User.php';


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
Model_Base::set_db( $db );

/**
 * User model class
 */
class UserController extends Model_Base
{
	const USER_TABLE = "user";

	public function __construct() {}

	public static function log($User) : bool
	{
		$q = self::$_db->prepare('SELECT password FROM '.UserController::USER_TABLE.' WHERE login = :login');
	  $ok  = $q->bindValue(':login', $User->login, PDO::PARAM_STR);
	  $ok &= $q->execute();

		if ($ok)
		{
			$user = $q->fetch(PDO::FETCH_ASSOC);
			$ok = $user && password_verify($User->password,$user['password']);
		}
		return $ok;
	}

  public static function getUserByUsername($UserName){
		$q = self::$_db->prepare('SELECT * FROM '.UserController::USER_TABLE.' WHERE login = :login');
	  $ok  = $q->bindValue(':login', $UserName, PDO::PARAM_STR);
	  $ok &= $q->execute();

		if ($ok)
		{
			$req = $q->fetch(PDO::FETCH_ASSOC);
      return new User(
        $req['User_ID'],
        $req['Teacher_ID'],
        $req['Name'],
        $req['Frist_Name'],
        $req['Avatar'],
        $req['Login'],
        $req['Password']
      ) ;
		}
  }

  public static function getUserById($UserId){
		$q = self::$_db->prepare('SELECT * FROM '.UserController::USER_TABLE.' WHERE User_ID = :id');
	  $ok  = $q->bindValue(':id', $UserId, PDO::PARAM_STR);
	  $ok &= $q->execute();

		if ($ok)
		{
			$req = $q->fetch(PDO::FETCH_ASSOC);
      return new User(
        $req['User_ID'],
        $req['Teacher_ID'],
        $req['Name'],
        $req['Frist_Name'],
        $req['Avatar'],
        $req['Login'],
        $req['Password']
      ) ;
		}
  }

	public static function create($User)
	{
		$q = self::$_db->prepare('INSERT INTO '.USER::USER_TABLE.' SET login = :login, password=:password');
	    $ok =  $q->bindValue(':login',    $User->login,    PDO::PARAM_STR);
	    $ok &= $q->bindValue(':password', password_hash($User->password,PASSWORD_DEFAULT), PDO::PARAM_STR);
	    $ok &= $q->execute();

		if ( !$ok )
			throw new Exception("Error : user creation in DB failed.");
	}

	public static function changePassword( $User, string $newpassword )
	{
		$q = self::$_db->prepare('UPDATE '.USER::USER_TABLE.' SET password = :password WHERE login = :login');
		$ok =  $q->bindValue(':login',    $User->login, PDO::PARAM_STR);
		$ok &= $q->bindValue(':password', password_hash($newpassword,PASSWORD_DEFAULT),  PDO::PARAM_STR);
		$ok &= $q->execute();

		if ( !$ok )
			throw new Exception("Error : user updating in DB failed.");
		else
			$User->password = $newpassword;
	}

	public static function delete($UserLogin)
	{
		$q = self::$_db->prepare('DELETE FROM '.USER::USER_TABLE.' WHERE login = :login');
		$ok =  $q->bindValue(':login', $UserLogin, PDO::PARAM_STR);
		$ok &= $q->execute();

		if ( !$ok )
			throw new Exception("Error : user deletion from DB failed.");
	}
}
