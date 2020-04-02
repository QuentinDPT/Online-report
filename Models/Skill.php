<?php
class Skill
{
  public $id ;
  public $domain_id ;
  public $name ;
  public $code ;
  public $trimester ;
  public $image ;

  function __construct($id, $domain_id, $name, $code, $trimester, $image){
    $this->id = $domain_id *100 + $id ;
    $this->domain_id = $domain_id ;
    $this->name = $name ;
    $this->code = $code ;
    $this->trimester = $trimester ;
    $this->image = $image ;
  }
}
