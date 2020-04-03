<?php
require_once $ROOT . '/Models/AccessDB.php' ;
require_once $ROOT . '/DBConfig.php';
require_once $ROOT . '/Models/SkillAcquire.php';
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
class SkillAcquireController extends Model_Base
{
	const SKILLACQUIRE_TABLE = "V_skillacquire";

  function __controller(){}

  public static function getSkillAcquireByStudentID($id){
		$q  = self::$_db->prepare('SELECT * FROM '.SkillAcquireController::SKILLACQUIRE_TABLE.' WHERE Student_ID = :id AND Status = 1');
	  $ok  = $q->bindValue(':id', $id, PDO::PARAM_STR);
	  $ok &= $q->execute();

		if ($ok)
		{
      $ret = array() ;
      do{
  			$req = $q->fetch(PDO::FETCH_ASSOC);
        if($req){
          $sa = new SkillAcquire($req['Skill_ID'], $req['Student_ID'], $req['Code'], $req['Name'], $req['Image'], $req['Trimester'], $req['Domain_ID'], $req['Note'], $req['Status'], $req['ObsDate']) ;
          array_push($ret, $sa) ;
        }
      }while($req) ;
      return $ret ;
		}
  }


  public static function getSkillObsByStudentID($id){
		$q  = self::$_db->prepare('SELECT * FROM '.SkillAcquireController::SKILLACQUIRE_TABLE.' WHERE Student_ID = :id AND Status != 1');
	  $ok  = $q->bindValue(':id', $id, PDO::PARAM_STR);
	  $ok &= $q->execute();

		if ($ok)
		{
      $ret = array() ;
      do{
  			$req = $q->fetch(PDO::FETCH_ASSOC);
        if($req){
          $sa = new SkillAcquire($req['Skill_ID'], $req['Student_ID'], $req['Code'], $req['Name'], $req['Image'], $req['Trimester'], $req['Domain_ID'], $req['Note'], $req['Status'], $req['ObsDate']) ;
          array_push($ret, $sa) ;
        }
      }while($req) ;
      return $ret ;
		}
  }


  public static function getUnacquiredSkillFromStudentID($id){
		$q  = self::$_db->prepare('SELECT * FROM '.'skill'.' WHERE Skill_ID Not in (select skill_id from skillacquire where Student_ID = :id)');
	  $ok  = $q->bindValue(':id', $id, PDO::PARAM_STR);
	  $ok &= $q->execute();

		if ($ok)
		{
      $ret = array() ;
      do{
  			$req = $q->fetch(PDO::FETCH_ASSOC);
        if($req){
          $sa = new Skill($req['Skill_ID'], $req['Domain_ID'], $req['Name'], $req['Code'], $req['Trimester'], $req['Image']) ;
          array_push($ret, $sa) ;
        }
      }while($req) ;
      return $ret ;
		}
  }
}
