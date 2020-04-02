<?php

require_once $ROOT . '/Models/AccessDB.php' ;
require_once $ROOT . '/DBConfig.php';
require_once $ROOT . '/Models/Class.php' ;

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
class ClassroomController extends Model_Base
{
	const USER_TABLE = "user";

	public function __construct() { }

  public static function getClassByTeacherId($id){
		$q = self::$_db->prepare('SELECT * FROM '.ClassroomController::USER_TABLE.' WHERE id = :teacher');
	  $ok  = $q->bindValue(':teacher', $id, PDO::PARAM_STR);
	  $ok &= $q->execute();

		if ($ok)
		{
      $teacher = new User(
        $req['User_ID'],
        $req['Teacher_ID'],
        $req['Name'],
        $req['Frist_Name'],
        $req['Avatar'],
        $req['Login'],
        $req['Password']
      ) ;
		}else{
      $teacher = $id ;
    }

		$q = self::$_db->prepare('SELECT * FROM '.ClassroomController::USER_TABLE.' WHERE teacher_id = :teacher');
	  $ok  = $q->bindValue(':teacher', $id, PDO::PARAM_STR);
	  $ok &= $q->execute();

		if ($ok)
		{
      $ret = new Classroom($teacher,array()) ;
      do{
  			$req = $q->fetch(PDO::FETCH_ASSOC);
        if($req){
          $usr = new User(
            $req['User_ID'],
            $req['Teacher_ID'],
            $req['Name'],
            $req['Frist_Name'],
            $req['Avatar'],
            $req['Login'],
            $req['Password']
          ) ;
          array_push($ret->students, $usr) ;
        }
      }while($req) ;
      return $ret ;
		}
    return null ;
  }
}
