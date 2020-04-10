function CodeToEmoji(code){
  switch(code%4){
    case 0:
      return "👤" ;
    case 1:
      return "👁" ;
    case 2:
      return "👍";
    case 3:
      return "🎓";
  }
}

function EmojiToCode(emoji){
  switch(emoji){
    case "👤" :
      return 0 ;
    case "👁" :
      return 1 ;
    case "👍":
      return 2 ;
    case "🎓":
      return 3 ;
  }
}

function CodeToDesc(code){
  switch(code%4){
    case 0:
      return "Absent" ;
    case 1:
      return "Vue" ;
    case 2:
      return "Réalisé";
    case 3:
      return "Remis";
  }
}
