<?php
class SkillAcquire
{
  public $id ;
  public $student_id ;
  public $code ;
  public $name ;
  public $image ;
  public $trimester ;
  public $domain_id ;
  public $note ;
  public $status ;
  public $obsdate ;

  function __construct($id, $student_id, $code, $name, $image, $trimester, $domain_id, $note, $status, $obsdate){
    $this->id         = $id ;
    $this->student_id = $student_id ;
    $this->code       = $code ;
    $this->name       = $name ;
    $this->image      = $image ;
    $this->trimester  = $trimester ;
    $this->domain_id  = $domain_id ;
    $this->note       = $note ;
    $this->status     = $status ;
    $this->obsdate    = $obsdate ;
  }
}
