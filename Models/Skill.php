<?php
class Skill
{
  public $id ;
  public $domain_id ;
  public $name ;
  public $code ;
  public $trimester ;
  public $image ;
  public $display_id ;

  function __construct($id, $domain_id, $name, $code, $trimester, $image){
    $this->id = $id ;
    $this->display_id = number_format ( $domain_id*100 + $code, 3) ;
    $this->domain_id = $domain_id ;
    $this->name = $name ;
    $this->code = $code ;
    $this->trimester = $trimester ;
    $this->image = $image ;
  }
}
