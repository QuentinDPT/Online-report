<?php
require_once $ROOT . '/Models/AccessDB.php' ;
require_once $ROOT . '/DBConfig.php';
require_once $ROOT . '/Models/Subdomain.php';

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
class SubdomainController extends Model_Base
{
	const SUBDOMAIN_TABLE = "subdomain";

  function __controller(){}

  public static function getByDomainID($id){
		$q  = self::$_db->prepare('SELECT * FROM '.SubdomainController::SUBDOMAIN_TABLE.' WHERE Domain_ID = :id');
	  $ok  = $q->bindValue(':id', $id, PDO::PARAM_STR);
	  $ok &= $q->execute();

		if ($ok)
		{
      $ret = array() ;
      do{
  			$req = $q->fetch(PDO::FETCH_ASSOC);
        if($req){
          $subdomain = new Subdomain($req['Subdomain_ID'], $req['Domain_ID'], $req['Name'], $req['Description'], $req['Code']) ;
          array_push($ret, $subdomain) ;
        }
      }while($req) ;
      return $ret ;
		}
  }
}
