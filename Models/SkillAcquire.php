<?php
class SkillAcquire
{
  public $id ;
  public $skill_id ;
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
  //                    Id   Skill_ID   Student_ID   Code   Name   Image   Trimester   Domain_ID   Note   Status   ObsDate   NbObs
  function __construct($id, $skill_id, $student_id, $code, $name, $image, $trimester, $domain_id, $note, $status, $obsdate, $nbobs){
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

  public static function getHTML_Button($status, $nbobs, $uid, $ptId){
    return
      '<input type="button" class="btn btn-outline-light" value="---" id="patent-obs-'.$uid.'" status="'.$nbobs.'" UID="'.$uid.'" ptid="'.$ptId.'" onclick=\'btnobs('.$uid.');\' />'.
      '<input type="button" class="btn btn-outline-light" value="-" id="patent-rw-'.$uid.'" status="'.$status.'" UID="'.$uid.'" ptid="'.$ptId.'" onclick=\'btnreview('.$uid.');\' />'.
      '<script>'.
      ' document.getElementById("patent-obs-'.$uid.'").value = CodeToEmoji(0,'.$nbobs.');'.
      ' document.getElementById("patent-rw-' .$uid.'").value = CodeToEmoji('.$status.');'.
      '</script>' ;
  }
}
