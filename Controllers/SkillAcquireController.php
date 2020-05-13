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

  public static function getSkillAcquireBySkillID($id){
		$q  = self::$_db->prepare('SELECT * FROM '.SkillAcquireController::SKILLACQUIRE_TABLE.' WHERE Skill_ID = :id Limit 1');
	  $ok  = $q->bindValue(':id', $id, PDO::PARAM_STR);
	  $ok &= $q->execute();

		if ($ok)
		{
			$req = $q->fetch(PDO::FETCH_ASSOC);
      return new SkillAcquire($req['Id'], $req['Skill_ID'], $req['Student_ID'], $req['Code'], $req['Name'], $req['Image'], $req['Trimester'], $req['Domain_ID'], $req['Note'], $req['Status'], $req['ObsDate'], $req['NbObs']) ;
		}
  }

  public static function getSkillAcquireByStudentID($id){
		$q  = self::$_db->prepare('SELECT * FROM '.SkillAcquireController::SKILLACQUIRE_TABLE.' WHERE Student_ID = :id AND Status IN (1,2)');
	  $ok  = $q->bindValue(':id', $id, PDO::PARAM_STR);
	  $ok &= $q->execute();

		if ($ok)
		{
      $ret = array() ;
      do{
  			$req = $q->fetch(PDO::FETCH_ASSOC);
        if($req){
          $sa = new SkillAcquire($req['Id'], $req['Skill_ID'], $req['Student_ID'], $req['Code'], $req['Name'], $req['Image'], $req['Trimester'], $req['Domain_ID'], $req['Note'], $req['Status'], $req['ObsDate'], $req['NbObs']) ;
          array_push($ret, $sa) ;
        }
      }while($req) ;
      return $ret ;
		}
  }

  public static function getSkillAcquireByStudentIDAndPatent($UsrId, $PatentId){
		$q  = self::$_db->prepare('SELECT * FROM '.SkillAcquireController::SKILLACQUIRE_TABLE.' WHERE Student_ID = :id AND Skill_ID = :skid');
	  $ok  = $q->bindValue(':id', $UsrId, PDO::PARAM_STR);
	  $ok &= $q->bindValue(':skid', $PatentId, PDO::PARAM_STR);
	  $ok &= $q->execute();

		if ($ok)
		{
			$req = $q->fetch(PDO::FETCH_ASSOC);
      return new SkillAcquire($req['Id'], $req['Skill_ID'], $req['Student_ID'], $req['Code'], $req['Name'], $req['Image'], $req['Trimester'], $req['Domain_ID'], $req['Note'], $req['Status'], $req['ObsDate'], $req['NbObs']) ;
		}
  }


  public static function getSkillObsByStudentID($id){
		$q  = self::$_db->prepare('SELECT * FROM '.SkillAcquireController::SKILLACQUIRE_TABLE.' WHERE Student_ID = :id AND Status NOT IN (1,2) AND NbObs != 0');
	  $ok  = $q->bindValue(':id', $id, PDO::PARAM_STR);
	  $ok &= $q->execute();

		if ($ok)
		{
      $ret = array() ;
      do{
  			$req = $q->fetch(PDO::FETCH_ASSOC);
        if($req){
          $sa = new SkillAcquire($req['Id'], $req['Skill_ID'], $req['Student_ID'], $req['Code'], $req['Name'], $req['Image'], $req['Trimester'], $req['Domain_ID'], $req['Note'], $req['Status'], $req['ObsDate'], $req['NbObs']) ;
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

  public static function acquireSkill($UID, $SkID, $status, $nbObs, $note){
    $line = SkillAcquireController::getSkillAcquireByStudentIDAndPatent($UID, $SkID) ;
    $ok = true ;
    var_dump($line) ;
    if($line == null || $line->id == null){
      var_dump("insertion") ;
  		$q  = self::$_db->prepare('INSERT INTO skillacquire (SkillAcq_ID, Student_ID, Skill_ID, ObsDate, Note, Status, NbObs)'.' VALUES (NULL, '. $UID .', '. $SkID .', CURRENT_TIMESTAMP, "'. $note .'", '. $status .', '. $nbObs .');');
    }else{
      $q  = self::$_db->prepare('UPDATE skillacquire SET'.' ObsDate=CURRENT_TIMESTAMP, Note="'. $note .'", Status="'. $status .'", NbObs="'. $nbObs .'" where SkillAcq_ID="'. $line->id .'";');
    }
	  $ok &= $q->execute();

		if (!$ok)
		{
      echo "Erreur lors de l'affection à la base de données" ;
      http_response_code(500) ;
		}
  }
}
