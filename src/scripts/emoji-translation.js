function CodeToEmoji(code, value = -1){
  switch(code%3){
    case 0:
      switch (value) {
        case -1:
          return "⚪️" ;
        case 0:
          return "⚪️⚪️⚪️" ;
        case 1:
          return "👁⚪️⚪️" ;
        case 2:
          return "👁👁⚪️" ;
        case 3:
          return "👁👁👁" ;
      }
    case 1:
      return "👍" ;
    case 2:
      return "🎓";
  }
}

function btnobs(id){
  console.log(id) ;
  let lm = document.getElementById("patent-obs-"+id);
  lm.attributes.status.nodeValue = (parseInt(lm.attributes.status.nodeValue)+1) %4;
  lm.value=CodeToEmoji(0,parseInt(lm.attributes.status.nodeValue));
  sendToServer(
    lm.attributes.status.nodeValue,
    document.getElementById("patent-rw-"+id).attributes.status.nodeValue,
    lm.attributes.UID.nodeValue,
    lm.attributes.ptid.nodeValue) ;
}

function btnreview(id){
  console.log(id) ;
  let lm = document.getElementById("patent-rw-"+id);
  lm.attributes.status.nodeValue = (parseInt(lm.attributes.status.nodeValue)+1)%3;
  lm.value=CodeToEmoji(lm.attributes.status.nodeValue);
  sendToServer(
    document.getElementById("patent-obs-"+id).attributes.status.nodeValue,
    lm.attributes.status.nodeValue,
    lm.attributes.UID.nodeValue,
    lm.attributes.ptid.nodeValue) ;
}

function sendToServer(nbobs,status,UID,SkID){
  $.ajax({
    url: "/api/acquireSkill",
    type:"POST",
    data: "nbobs=" + nbobs + "&status=" + status + "&UID=" + UID + "&SkID=" + SkID,
    success: function(result, status){

    },
    error: function(result, status, error){
      console.log(result) ;
      console.log(status) ;
      console.log(error) ;
      alert("Erreur lors de l'envoi des données") ;
    },
    complete : function(result, status){
      console.log(result) ;
      console.log(status) ;
    }
  });
}
