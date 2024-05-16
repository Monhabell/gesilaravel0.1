//JUEGO SONIC

//****** GAME LOOP ********//

var time = new Date();
var deltaTime = 0;

// if(document.readyState === "complete" || document.readyState === "interactive"){
//     setTimeout(Init, 1);
// }else{
//     document.addEventListener("DOMContentLoaded", Init); 
// }

function Init() {
    time = new Date();
    Start();
    Loop();
}

function Loop() {
    deltaTime = (new Date() - time) / 1000;
    time = new Date();
    Update();
    requestAnimationFrame(Loop);
}

//****** GAME LOGIC ********//

var sueloY = 22;
var velY = 0;
var impulso =1090;
var gravedad = 3400;

var dinoPosX = 42;
var dinoPosY = sueloY; 

var sueloX = 0;
var velEscenario = 1080/3;
var gameVel = 1;
var score = 0;

var parado = false;
var saltando = false;

var tiempoHastaObstaculo = 1.2;
var tiempoObstaculoMin = 0.8;
var tiempoObstaculoMax = 1.5;
var obstaculoPosY = 5;
var obstaculos = [];

var tiempoHastaNube = 0.1;
var tiempoNubeMin = 0.9;
var tiempoNubeMax = 1.7;
var maxNubeY = 370;
var minNubeY = 200;
var nubes = [];
var velNube = 0.5;

var contenedor;
var dino;
var textoScore;
var suelo;
var gameOver;

function Start() {
    gameOver = document.querySelector(".game-over");
    suelo = document.querySelector(".suelo");
    contenedor = document.querySelector(".contenedorGame");
    textoScore = document.querySelector(".score");
    dino = document.querySelector(".dino");
    document.addEventListener("keydown", HandleKeyDown);
}

function Update() {
    if(parado) return;
    
    MoverDinosaurio();
    MoverSuelo();
    DecidirCrearObstaculos();
    DecidirCrearNubes();
    MoverObstaculos();
    MoverNubes();
    DetectarColision();

    velY -= gravedad * deltaTime;
}

function HandleKeyDown(ev){
    if(ev.keyCode == 32){
        Saltar();
    }else if(ev.keyCode == 13){
        Saltar();
    }else if(ev.keyCode == 38){
        Saltar();
    }
}

function Saltar(){
    if(dinoPosY === sueloY){
        saltando = true;
        velY = impulso;
        dino.classList.remove("dino-corriendo");
    }
}

function MoverDinosaurio() {
    dinoPosY += velY * deltaTime;
    if(dinoPosY < sueloY){
        
        TocarSuelo();
    }
    dino.style.bottom = dinoPosY+"px";
}

function TocarSuelo() {
    dinoPosY = sueloY;
    velY = 0;
    if(saltando){
        dino.classList.add("dino-corriendo");
    }
    saltando = false;
}

function MoverSuelo() {
    sueloX += CalcularDesplazamiento();
    suelo.style.left = -(sueloX % contenedor.clientWidth) + "px";
}

function CalcularDesplazamiento() {
    return velEscenario * deltaTime * gameVel;
}

function Estrellarse() {
    dino.classList.remove("dino-corriendo");
    dino.classList.add("dino-estrellado");
    parado = true;
}

function DecidirCrearObstaculos() {
    tiempoHastaObstaculo -= deltaTime;
    if(tiempoHastaObstaculo <= 0) {
        CrearObstaculo();
    }
}

function DecidirCrearNubes() {
    tiempoHastaNube -= deltaTime;
    if(tiempoHastaNube <= 0) {
        CrearNube();
    }
}

function CrearObstaculo() {
    var obstaculo = document.createElement("div");
    contenedor.appendChild(obstaculo);
    obstaculo.classList.add("cactus");
    if(Math.random() > 0.5) obstaculo.classList.add("cactus2");
    obstaculo.posX = contenedor.clientWidth;
    obstaculo.style.left = contenedor.clientWidth+"px";

    if(gameVel > 3.5 ){
        tiempoObstaculoMin = 0.1;
        tiempoObstaculoMax = 0.5;
        gravedad = 3800;
    }

    obstaculos.push(obstaculo);
    tiempoHastaObstaculo = tiempoObstaculoMin + Math.random() * (tiempoObstaculoMax-tiempoObstaculoMin) / gameVel;
    console.log(tiempoHastaObstaculo)
}

function CrearNube() {
    var nube = document.createElement("div");
    contenedor.appendChild(nube);
    nube.classList.add("nube");
    nube.posX = contenedor.clientWidth;
    nube.style.left = contenedor.clientWidth+"px";
    nube.style.bottom = minNubeY + Math.random() * (maxNubeY-minNubeY)+"px";
    
    nubes.push(nube);
    tiempoHastaNube = tiempoNubeMin + Math.random() * (tiempoNubeMax-tiempoNubeMin) / gameVel;
}

function MoverObstaculos() {
    for (var i = obstaculos.length - 1; i >= 0; i--) {
        if(obstaculos[i].posX < -obstaculos[i].clientWidth) {
            obstaculos[i].parentNode.removeChild(obstaculos[i]);
            obstaculos.splice(i, 1);
            GanarPuntos();
        }else{
            obstaculos[i].posX -= CalcularDesplazamiento();
            obstaculos[i].style.left = obstaculos[i].posX+"px";
        }
    }
}

function MoverNubes() {
  // Determina cuántas nubes deseas tener en pantalla
  var numNubesDeseadas = 90;

  // Agrega nuevas nubes si el número actual de nubes es menor que el límite deseado
  while (nubes.length < numNubesDeseadas) {
      // Crea una nueva nube
      var nuevaNube = document.createElement('div');
      nuevaNube.className = 'nube'; // Clase CSS para estilizar la nube
      // Posiciona la nueva nube fuera del área visible
      nuevaNube.style.left = '100%';
      // Agrega la nueva nube al documento HTML y al array de nubes
      document.body.appendChild(nuevaNube);
      nubes.push(nuevaNube);
  }

  // Mueve todas las nubes existentes
  for (var i = nubes.length - 1; i >= 0; i--) {
      if (nubes[i].posX < -nubes[i].clientWidth) {
          // Elimina las nubes que ya no están visibles
          nubes[i].parentNode.removeChild(nubes[i]);
          nubes.splice(i, 1);
      } else {
          // Mueve las nubes visibles
          nubes[i].posX -= CalcularDesplazamiento() * velNube;
          nubes[i].style.left = nubes[i].posX + "px";
      }
  }
}


function GanarPuntos() {
    score++;
    textoScore.innerText = score;
    if(score == 5){
        gameVel = 1.5;
        contenedor.classList.add("mediodia");
    }else if(score == 8) {
        gameVel = 2;
        contenedor.classList.add("tarde");
    }else if(score == 10) {
        gameVel = 3.5;
        contenedor.classList.add("noche");
    }else if(score == 15) {
        gameVel = 1.5;
        contenedor.classList.add("tarde");
    }else if(score == 22) {
        gameVel = 2.5;
        contenedor.classList.add("mediodia");
    }else if(score == 28) {
        gameVel = 1;
        contenedor.classList.add("tarde");
    }else if(score == 35) {
        gameVel = 3.5;
        contenedor.classList.add("mediodia");
    }
    else if(score == 40) {
        gameVel = 5;
        contenedor.classList.add("mediodia");
    }
    else if(score == 40) {
        gameVel = 1;
        contenedor.classList.add("mediodia");
    }
    
    suelo.style.animationDuration = (3/gameVel)+"s";
}

function GameOver() {
    Estrellarse();
    gameOver.style.display = "block";
}

function DetectarColision() {
    for (var i = 0; i < obstaculos.length; i++) {
        if(obstaculos[i].posX > dinoPosX + dino.clientWidth) {
            //EVADE
            break; //al estar en orden, no puede chocar con más
        }else{
            if(IsCollision(dino, obstaculos[i], 10, 30, 15, 20)) {
                GameOver();
            }
        }
    }
}

function IsCollision(a, b, paddingTop, paddingRight, paddingBottom, paddingLeft) {
    var aRect = a.getBoundingClientRect();
    var bRect = b.getBoundingClientRect();

    return !(
        ((aRect.top + aRect.height - paddingBottom) < (bRect.top)) ||
        (aRect.top + paddingTop > (bRect.top + bRect.height)) ||
        ((aRect.left + aRect.width - paddingRight) < bRect.left) ||
        (aRect.left + paddingLeft > (bRect.left + bRect.width))
    );
}