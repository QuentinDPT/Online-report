<?php
class Subdomain
{
  public $id ;
  public $domain_id ;
  public $name ;
  public $description ;
  public $code ;

  function __construct($id, $domain_id, $name, $desc, $code){
    $this->id = $id ;
    $this->domain_id = $domain_id ;
    $this->name = $name ;
    $this->description = $desc ;
    $this->code = $code ;
  }
}
