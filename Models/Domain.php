<?php
class Domain
{
  public $id ;
  public $name ;
  public $description ;
  public $color ;

  function __construct($id, $name, $desc, $color){
    $this->id = $id ;
    $this->name = $name ;
    $this->description = $desc ;
    $this->color = $color ;
  }
}
