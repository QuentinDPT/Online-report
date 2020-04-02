<?php
class Skill
{
  public $id ;
  public $subdomain_id ;
  public $name ;
  public $code ;
  public $trimester ;
  public $image ;

  function __construct($id, $subdomain_id, $name, $code, $trimester, $image){
    $this->id = $id ;
    $this->subdomain_id = $subdomain_id ;
    $this->name = $name ;
    $this->code = $code ;
    $this->trimester = $trimester ;
    $this->image = $image ;
  }
}
