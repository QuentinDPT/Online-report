<?php

require_once $ROOT . '/Models/User.php' ;

class Classroom
{
	public $teacher ;
  public $students ;

	public function __construct( $teacher, $students)
	{
		$this->teacher	= $teacher;
		$this->students			= $students;
	}
}
