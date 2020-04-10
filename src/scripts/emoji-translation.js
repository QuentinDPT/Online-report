function CodeToEmoji(code, value = -1){
  switch(code%3){
    case 0:
      switch (value) {
        case -1:
          return "🔸" ;
        case 0:
          return "🔸🔸🔸" ;
        case 1:
          return "👁🔸🔸" ;
        case 2:
          return "👁👁🔸" ;
        case 3:
          return "👁👁👁" ;
      }
    case 1:
      return "👍" ;
    case 2:
      return "🎓";
  }
}
