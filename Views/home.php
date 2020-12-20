<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <?php $PageName = "Accueil" ?>
    <?php require("./Views/Common/header.php") ?>

    <script type="text/javascript" src="./src/lib/ThreeJs/three.js"></script>
    <script type="text/javascript" src="./src/lib/ThreeJs/OBJLoader.js"></script>
    <script type="text/javascript" src="./src/lib/ThreeJs/MTLLoader.js"></script>
    <script type="text/javascript" src="./src/lib/ThreeJs/OBJMTLLoader.js"></script>

    <script type="text/javascript" src="./src/lib/ThreeJs/stats.js"></script>
    <script type="text/javascript" src="./src/lib/ThreeJs/dat.gui.js"></script>

  </head>
  <body>
    <?php $NavActive = "home" ?>
    <?php require("./Views/Common/navbar.php") ?>

    <div id="Stats-output">
    </div>
    <div style="width:100%;background-color: red;">
      <div id="renderer" style="width:50vw;height:40vh">
      </div>
    </div>

    <script type="text/javascript">
      var mouseX = 0 ;
      var mouseY = 0 ;

      window.onmousemove = function(e){
        mouseX = e.clientX / window.innerWidth *2-1 ;
        mouseY = e.clientY / window.innerHeight *2-1 ;
      }

      document.getElementById("renderer").onmouseenter = function(){
        book.animate = "open" ;
      } ;

      document.getElementById("renderer").onmouseleave = function(){
        book.animate = "close" ;
      } ;

    </script>
    <script type="text/javascript">
      var scene = new THREE.Scene();
      var container = document.getElementById("renderer");
      var camera = new THREE.PerspectiveCamera(45, container.offsetWidth / container.offsetHeight, 0.1, 1000);
      var webGLRenderer = new THREE.WebGLRenderer();

      webGLRenderer.setClearColor(new THREE.Color(0xaaaaff, 1.0));
      webGLRenderer.setSize(container.offsetWidth, container.offsetHeight);
      webGLRenderer.shadowMapEnabled = true;

      camera.position.x = 0;
      camera.position.y = 5;
      camera.position.z = 0;
      camera.lookAt(new THREE.Vector3(0, 0, 0));

      var spotLight = new THREE.SpotLight(0xffffff);
      spotLight.position.set(0, 5, 0);
      spotLight.intensity = 2;
      scene.add(spotLight);

      // add the output of the renderer to the html element
      container.appendChild(webGLRenderer.domElement);

      window.onresize = function(e){
        //camera = new THREE.PerspectiveCamera(45, container.offsetWidth / container.offsetHeight, 0.1, 1000);
        webGLRenderer.setSize(container.offsetWidth, container.offsetHeight);
      }

    </script>

    <script type="text/javascript">
      class Book3D{
        constructor(){
          this.object = new THREE.Object3D() ;
          this.buildBook() ;

          this.animation = 0 ;
          this.animationMax = 25 ;
          this.animate = "" ;
        }

        buildBook(){
          var result = new THREE.Object3D() ;

          var pages = new THREE.Mesh(
            new THREE.BoxGeometry( 0.18, 1.8-0.2, 2.25-0.12 ),
            new THREE.MeshPhongMaterial( {color: 0xFEFEE2} )
          ) ;

          result.add(pages) ;

          var couverture1Parent = new THREE.Object3D() ;
          var couverture1 = new THREE.Mesh(
            new THREE.BoxGeometry( 0.001, 1.8, 2.25 ),
            new THREE.MeshPhongMaterial( {color: 0xEE0000} )
          ) ;
          couverture1.translateX(0.18/2+0.001) ;
          couverture1.translateY(-1.8/2) ;
          //*
          couverture1Parent.translateY(1.8/2) ;

          couverture1Parent.add(couverture1) ;

          result.add(couverture1Parent) ;
          //*/

          //result.add(couverture1) ;

          var couverture4 = new THREE.Mesh(
            new THREE.BoxGeometry( 0.001, 1.8, 2.25 ),
            new THREE.MeshPhongMaterial( {color: 0xEE0000} )
          ) ;
          couverture4.position.x = -(0.18/2+0.001) ;

          result.add(couverture4) ;

          var ringGeometry = new THREE.TorusGeometry( 0.23, 0.005, 16, 100 ) ;
          var ringMeterial = new THREE.MeshBasicMaterial( { color: 0x000000 } ) ;

          for(var i = 0 ; i< 16 ; i++){
            // 0.2 cm entre les rings

            var firstRing  = new THREE.Mesh(
              ringGeometry,
              ringMeterial
            );
            firstRing.position.y = 1.8/2 ;
            firstRing.position.z = (i - 7.5)/17 * (2.25) - 0.01 ;

            var secondRing  = new THREE.Mesh(
              ringGeometry,
              ringMeterial
            );
            secondRing.position.y = 1.8/2 ;
            secondRing.position.z = firstRing.position.z + 0.02 ;

            result.add( firstRing );
            result.add( secondRing );

            result.rotation.x = Math.PI/2 ;
            result.rotation.y = Math.PI/2 ;
            this.object.add(result) ;
          }
        }

        refresh(){
          switch (this.animate) {
            case "open":
              this.animation++ ;

              this._anim() ;

              if(this.animation == this.animationMax)
                this.animate = "" ;
              break;
            case "close":
              this.animation-- ;

              this._anim() ;

              if(this.animation == 0)
                this.animate = "" ;
              break;
            default:

          }
        }

        _anim(){
          this.object.children[0].children[1].rotation.z = this.animation/this.animationMax * 2*Math.PI/3 ;
          this.object.children[0].rotation.y = this.animation/this.animationMax * (Math.PI/5)  +Math.PI/2 ;
          this.object.children[0].rotation.x = this.animation/this.animationMax * (-Math.PI/6) + Math.PI/2 ;
          this.object.children[0].position.x = this.animation/this.animationMax * .3 ;
        }
      }
    </script>

    <script type="text/javascript">

      var position = new THREE.Vector3() ;
      var book = new Book3D() ;

      // once everything is loaded, we run our Three.js stuff.
      function init() {

          var animationState = 0 ;

          var gui = new dat.GUI();
          scene.add(book.object) ;

          render();

          function render() {
              animationState += 1 ;

              book.refresh() ;

              book.object.position.x = position.x + Math.sin(animationState/360 * Math.PI)/3 ;

              // render using requestAnimationFrame
              requestAnimationFrame(render);
              webGLRenderer.render(scene, camera);
          }
      }
      window.onload = init;
    </script>

  </body>
</html>
