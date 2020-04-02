<?php
class User
{
	public $id ;
	public $teacher ;
	public $name;
	public $firstName ;
	public $avatar ;
	public $login;
	public $password;

	public function __construct( $id, $teacher, $name, $firstName, $avatar, $login, $password )
	{
		$this->id 			= $id;
		$this->teacher	= $teacher;
		$this->name			= $name;
		$this->firstName= $firstName;
		$this->avatar		= $avatar;
		$this->login		= $login;
		$this->password	= $password;
	}
}
