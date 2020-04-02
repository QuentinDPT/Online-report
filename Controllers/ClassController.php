<?php

require_once $ROOT . '/Models/AccessDB.php' ;
require_once $ROOT . '/Models/User.php' ;
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
Model_Base::set_db( $db );

/**
 * User model class
 */
class ClassroomController extends Model_Base
{
	public $_teacher ;
  public $_students ;

	const USER_TABLE = "user";

	public function __construct( $teacher_id)
	{
		$this->_teacher = $teacher_id;
	}

	public function parseDB(){
		$q = self::$_db->prepare('SELECT * FROM '.ClassroomController::USER_TABLE.' WHERE teacher_id = :teacher');
	  $ok  = $q->bindValue(':teacher', $this->_teacher, PDO::PARAM_STR);
	  $ok &= $q->execute();

		if ($ok)
		{
      $this->_students = array() ;
      do{
  			$req = $q->fetch(PDO::FETCH_ASSOC);
        if($req){
          $usr = new User("") ;
    			$usr->_login = $req['Login'];
    			$usr->_name = $req['Name'];
    			$usr->_firstName = $req['Frist_Name'];
    			$usr->_avatar = $req['Avatar'];
    			$usr->_id = $req['User_ID'] ;
          array_push($this->_students, $usr) ;
        }
      }while($req) ;
		}
	}
}
