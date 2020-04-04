<?php
require_once $ROOT . '/Models/AccessDB.php' ;
require_once $ROOT . '/DBConfig.php';
require_once $ROOT . '/Models/Skill.php';

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
class SkillController extends Model_Base
{
	const SUBDOMAIN_TABLE = "skill";

  function __controller(){}

  public static function getByDomainID($id){
		$q  = self::$_db->prepare('SELECT * FROM '.SkillController::SUBDOMAIN_TABLE.' WHERE Domain_ID = :id');
	  $ok  = $q->bindValue(':id', $id, PDO::PARAM_STR);
	  $ok &= $q->execute();

		if ($ok)
		{
      $ret = array() ;
      do{
  			$req = $q->fetch(PDO::FETCH_ASSOC);
        if($req){
          $subdomain = new Skill($req['Skill_ID'], $req['Domain_ID'], $req['Name'], $req['Code'], $req['Trimester'], $req['Image']) ;
          array_push($ret, $subdomain) ;
        }
      }while($req) ;
      return $ret ;
		}
  }

  public static function getByID($id){
		$q  = self::$_db->prepare('SELECT * FROM '.SkillController::SUBDOMAIN_TABLE.' WHERE skill_id = :id');
	  $ok  = $q->bindValue(':id', $id, PDO::PARAM_STR);
	  $ok &= $q->execute();

		if ($ok)
		{
      $req = $q->fetch(PDO::FETCH_ASSOC);
      return new Skill($req['Skill_ID'], $req['Domain_ID'], $req['Name'], $req['Code'], $req['Trimester'], $req['Image']) ;
		}
  }

  public static function getByDomainAndCode($domainId, $codeId){
		$q  = self::$_db->prepare('SELECT * FROM '.SkillController::SUBDOMAIN_TABLE.' WHERE Domain_ID = :did and Code = :cid');
	  $ok  = $q->bindValue(':did', $domainId, PDO::PARAM_STR);
	  $ok &= $q->bindValue(':cid', $codeId, PDO::PARAM_STR);
	  $ok &= $q->execute();

		if ($ok)
		{
      $req = $q->fetch(PDO::FETCH_ASSOC);
      return new Skill($req['Skill_ID'], $req['Domain_ID'], $req['Name'], $req['Code'], $req['Trimester'], $req['Image']) ;
		}
  }
}
