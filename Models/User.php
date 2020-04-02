<?php

require_once $ROOT . '/Models/AccessDB.php' ;

/**
 * User model class
 */
class User extends Model_Base
{
	public $_login;
	public $_password;
	public $_name;
	public $_firstName ;
	public $_avatar ;
	public $_teacher ;
	public $_id ;

	const USER_TABLE = "user";

	public function __construct( $login, $password = '' )
	{
		$this->_login = $login;
		$this->_password = $password;
	}

	public function exists() : bool
	{
		$q = self::$_db->prepare('SELECT password FROM '.User::USER_TABLE.' WHERE login = :login');
	  $ok  = $q->bindValue(':login', $this->_login, PDO::PARAM_STR);
	  $ok &= $q->execute();

		if ($ok)
		{
			$user = $q->fetch(PDO::FETCH_ASSOC);
			$ok = $user && password_verify($this->_password,$user['password']);
		}

		return $ok;
	}

	public function parseDB(){
		$q = self::$_db->prepare('SELECT * FROM '.User::USER_TABLE.' WHERE login = :login');
	  $ok  = $q->bindValue(':login', $this->_login, PDO::PARAM_STR);
	  $ok &= $q->execute();

		if ($ok)
		{
			$user = $q->fetch(PDO::FETCH_ASSOC);
			$this->_name = $user['Name'];
			$this->_firstName = $user['Frist_Name'];
			$this->_avatar = $user['Avatar'];
			$this->_teacher = $user['TeacherId'] ;
			$this->_id = $user['User_ID'] ;
		}
	}

	public function create()
	{
		$q = self::$_db->prepare('INSERT INTO '.USER::USER_TABLE.' SET login = :login, password=:password');
	    $ok =  $q->bindValue(':login',    $this->_login,    PDO::PARAM_STR);
	    $ok &= $q->bindValue(':password', password_hash($this->_password,PASSWORD_DEFAULT), PDO::PARAM_STR);
	    $ok &= $q->execute();

		if ( !$ok )
			throw new Exception("Error : user creation in DB failed.");
	}

	public function changePassword( string $newpassword )
	{
		$q = self::$_db->prepare('UPDATE '.USER::USER_TABLE.' SET password = :password WHERE login = :login');
		$ok =  $q->bindValue(':login',    $this->_login, PDO::PARAM_STR);
		$ok &= $q->bindValue(':password', password_hash($newpassword,PASSWORD_DEFAULT),  PDO::PARAM_STR);
		$ok &= $q->execute();

		if ( !$ok )
			throw new Exception("Error : user updating in DB failed.");
		else
			$this->_password = $newpassword;
	}

	public function delete()
	{
		$q = self::$_db->prepare('DELETE FROM '.USER::USER_TABLE.' WHERE login = :login');
		$ok =  $q->bindValue(':login', $this->_login, PDO::PARAM_STR);
		$ok &= $q->execute();

		if ( !$ok )
			throw new Exception("Error : user deletion from DB failed.");
	}
}
