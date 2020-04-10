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
  public $nbobs ;

  function __construct($id, $student_id, $code, $name, $image, $trimester, $domain_id, $note, $status, $obsdate, $nbobs){
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
    $this->nbobs      = $nbobs ;
  }

  public function getIcon(){
      switch($this->status){
        case 1:
          return "👍" ;
        case 2:
          $rez = "" ;
          if($this->nbobs <= 3){
            for($_i = 0 ; $_i<$this->nbobs ;$_i++){
              $rez = $rez . "👁" ;
            }
          }else{
            $rez = "👁 x" . $this->nbobs ;
          }
          return $rez ;
        case 3:
          return "👎" ;
        default:
          return "" ;
      }
  }

  public static function getHTML_Button($status, $id, $desc = true){
    return
      ($desc ? '<label style="width:100%" for="patent-'.$id.'" id="patent-desc-'.$id.'">Réalisé</label>' : '') .
      '<input type="button" class="btn btn-outline-dark" value="👍" id="patent-'.$id.'" status="2" onloadend=\'btnrotate('.$id.');\' onclick=\'btnrotate('.$id.');\' />
      ' ;
  }
}
