var loadingElement ;

class skillAcquire{
  constructor(SkillAcq_ID, Student_ID, Skill_ID, ObsDate, Note, Status){
    this.SkillAcq_ID = SkillAcq_ID ;
    this.Student_ID = Student_ID ;
    this.Skill_ID = Skill_ID ;
    this.ObsDate = ObsDate ;
    this.Note = Note ;
    this.Status = Status ;
  }
}

function patentAddClick(id){
  let element = document.getElementById("p-"+id) ;
  console.log(element) ;
  loadingElement.style = 'display:block' ;
  loadingElement.innerHTML = createForm("Accorder le brevet",function(){
    return "";
  }) ;
}

function patentModifyClick(id){
  let element = document.getElementById("p-"+id) ;
  console.log(element) ;
  loadingElement.style = 'display:block' ;
  loadingElement.innerHTML = createForm("Modifier le brevet",function(){
    return "";
  }) ;
}

function changeObs(){

}

function createForm(name, fct){
  return `
  <form action="/api/acquireSkill" method="post" class='col-sm-12 col-md-4'>
      <div class="row justify-content-between">
        <div class="w-auto">
          <h2>` + name + `</h2>
        </div>
        <div>` +
        fct() +
       `</div>
      </div>
      <div class="row" style="height:100%; margin-bottom: .5rem;">
        <textarea class="form-control" style="max-height:100% ; height:100% ;" placeholder="Mémo"></textarea>
      </div>
      <div class="row">
        <input type="submit" class="btn btn-primary col-md-6 col-sm-12" value="Valider" onclick="loadingElement.style = 'display:none' ;">
        <input type="button" class="btn btn-danger col-md-6 col-sm-12" value="Annuler" onclick="loadingElement.style = 'display:none' ;">
      </div>
  </form>`
}


window.onload = function(){
  document.body.innerHTML =
  `<style>
    #loading{
      display:none;
      top:0;
      background-color: #000000CC;
      position: absolute;
      z-index: 2000;
      left: 0;
      right: 0;
      bottom: 0;
    }
    #loading>*{
      padding: 15px 25px 15px 25px ;
      z-index: 2001;
      background-color: #FFF;
      height: 50vh;
      position: relative ;
      left: 50%;
      top: 50%;
      transform: translate(-50%,-50%);
      display: flex;
      flex-direction: column ;
      justify-content: space-between ;
    }

    #loading>*>*{
      position: inherit ;
    }
   </style>
   <div id='loading'></div>` + document.body.innerHTML ;
  loadingElement = document.getElementById("loading") ;
}
