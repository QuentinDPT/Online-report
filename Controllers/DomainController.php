<?php

require_once $ROOT . '/Models/AccessDB.php' ;
require_once $ROOT . '/DBConfig.php';
require_once $ROOT . '/Models/Domain.php';

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
class DomainController extends Model_Base
{
	const DOMAIN_TABLE = "domain";

  function __controller(){}

  public static function getAll(){
		$q  = self::$_db->prepare('SELECT * FROM '.DomainController::DOMAIN_TABLE);
	  $ok = $q->execute();

		if ($ok)
		{
      $ret = array() ;
      do{
  			$req = $q->fetch(PDO::FETCH_ASSOC);
        if($req){
          $domain = new Domain($req['Domain_ID'], $req['Name'], $req['Description'], $req['Color']) ;
          array_push($ret, $domain) ;
        }
      }while($req) ;
      return $ret ;
		}
  }

  public static function getByID($id){
		$q  = self::$_db->prepare('SELECT * FROM '.DomainController::DOMAIN_TABLE.' WHERE domain_id = :id');
	  $ok  = $q->bindValue(':id', $id, PDO::PARAM_STR);
	  $ok = $q->execute();

		if ($ok)
		{
			$req = $q->fetch(PDO::FETCH_ASSOC);
			return new Domain($req['Domain_ID'], $req['Name'], $req['Description'], $req['Color']) ;
		}
  }
}
