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

	public function toHTML(){
		return
			'<div class="d-inline-block text-center text-truncate" style="height: 50px ;">' .
				($this->avatar != "" ? "<img class='rounded-circle mr-2' style='height:50px ; width:50px ;' src='" . $this->avatar . "'>" : "<i style='display:inline-block; height:50px ; width:50px ;vertical-align: middle;'></i>") .
				$this->firstName . " <span class='font-weight-bold'>" . $this->name . "</span>" .
			'</div>' ;
	}
}
