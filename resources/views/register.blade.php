<!doctype html>
<html lang="es">

<head>
    <title>GA - Registro</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="{{ asset('img/logo.png') }}"/>    
    <link rel="stylesheet" href="{{ asset('styles/register.css') }}"> 

    <!-- Bootstrap CSS v5.2.0-beta1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-2756377313199849" crossorigin="anonymous"></script>
</head>

<style>
    /* Importing fonts from Google */
  @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap');

/* Reseting */
* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: 'Poppins', sans-serif;
}

body {
  background: #ecf0f3  !important;
}

.wrapper {
  max-width: 450px;
  min-height: 500px;
  margin: 80px auto;
  padding: 40px 30px 30px 30px;
  background-color: #ecf0f3;
  border-radius: 15px;
  box-shadow: 13px 13px 20px #cbced1, -13px -13px 20px #fff;
}

.logo {
  width: 80px;
  margin: auto;
}

.logo img {
  width: 100%;
  height: 80px;
  object-fit: cover;
  border-radius: 50%;
  box-shadow: 0px 0px 3px #5f5f5f,
    0px 0px 0px 5px #ecf0f3,
    8px 8px 15px #a7aaa7,
    -8px -8px 15px #fff;
}

.wrapper .name {
  font-weight: 600;
  font-size: 1.4rem;
  letter-spacing: 1.3px;
  padding-left: 10px;
  color: #555;
}

.wrapper .form-field input {
  width: 100%;
  display: block;
  border: none;
  outline: none;
  background: none;
  font-size: 1.2rem;
  color: #000;
  padding: 10px 15px 10px 10px;
  /* border: 1px solid red; */
}

.wrapper .form-field {
  padding-left: 10px;
  margin-bottom: 20px;
  border-radius: 20px;
  box-shadow: inset 8px 8px 8px #cbced1, inset -8px -8px 8px #fff;
}

.wrapper .form-field .fas {
  color: #000;
}

.wrapper .btn {
  box-shadow: none;
  width: 100%;
  height: 40px;
  /* background-color: #03A9F4; */
  color: #fff;
  border-radius: 25px;
  box-shadow: 3px 3px 3px #b1b1b1,
    -3px -3px 3px #fff;
  letter-spacing: 1.3px;
}

.btnnext{
      background-color: #03A9F4; 
}

.btnBakc{
    background-color: #FF2D00; 
}

.wrapper .btn:hover {
  background-color: #039BE5;
}

.wrapper a {
  text-decoration: none;
  font-size: 0.8rem;
  color: #03A9F4;
}

.wrapper a:hover {
  color: #039BE5;
}

@media(max-width: 380px) {
  .wrapper {
    margin: 30px 20px;
    padding: 40px 15px 15px 15px;
  }
}

input[type="text"],
input[type="number"],
input[type="email"],
input[type="password"],
select {
  width: 100%;
  padding: 8px 18px;
  background: #fff;
  border-radius: 12px;
  margin-top: 10px;
  margin-bottom: 20px;
  border: 1px solid #ffffff00;
  border-bottom: 1px solid #f8f5f5;
  transition: all ease-in 0.4s;
  color: #000;
}

form {
  background: rgba(255, 255, 255, 0.253);
  border-radius: 10px;
  padding: 1% 5%;
  width: 25rem;
  overflow: hidden;
  transition: all ease-in-out 0.4s;
}

label{font-size: 0.8em;}

.inset{
  margin: 5% 0;
  width: 400%;
  display: grid;
  grid-template-columns: 1fr 1fr 1fr 1fr;
  transition: all ease-in 0.4s;
}

</style>

<body class="center-items relative">

<div class="hero">
    <div class="wrapper">
        <div class="logo">
            <img src="{{ asset('img/logo_temp.png') }}" alt="">
        </div>
        <div class="text-center mt-4 name">
            Registro / GesiApp
        </div>
        
        <form method="POST" id="form-reg" class="relative" action="{{ route('saveRegister') }}">
          @csrf
          
          <div id="container-fills" class="inset">
            <div id="section-1">
              <div class="align-items-center">
                <label for="subnet">Subred<span class = "req"> *</span></label>
                <select id="subnet" name="subnet" class="form-field">
                    <option value="">Seleccione</option>
                    <option value="1">Norte</option>
                    <option value="2">Centro oriente</option>
                    <option value="3">Sur occidente</option>
                    <option value="4">Sur</option>
                </select>
              </div>

              <div class="align-items-center">
                  <label for="environment">Entorno / Proceso<span class = "req"> *</span></label>
                  <select id="environment" name="environment" class="form-field">
                      <option value="">Seleccione</option>
                      <option value="1">GESI</option>
                      <option value="4">Educativo</option>
                      <option value="5">Comunitario</option>
                      <option value="3">Laboral</option>
                      <option value="6">Institucional</option>
                      <option value="2">Hogar</option>
                  </select>
              </div>
            </div>

            <div id="section-2" hidden>
              <div class="align-items-center">
                <label for="position">Cargo<span class = "req"> *</span></label>
                <select id="position" name="position" class="form-field">
                    <option value="">Seleccione</option>
                    <option value="1">Técnico de sistemas</option>
                    <option value="2">Técnico administrativo</option>
                    <option value="3">Profesional de apoyo</option>
                    <option value="4">Ingeniero</option>
                    <option value="5">Referente</option>
                    <option value="6">Digitador(a)</option>
                </select>                     
              </div>

              <div>
                <label class="colorWhite" for="email">Email<span class = "req"> *</span></label>
                <input type="email" name="email" id="email" autocomplete="off" class="form-field">
              </div>
            </div>

            <div id="section-3" class="relative" hidden>
              <div class="flex-row flex-between">
                <div class = "box-name" id="box-name">
                    <label class="colorWhite" for="name">Nombre(s)<span class = "req"> *</span></label>
                    <input type="text" name="name" id="name" autocomplete="off" class="form-field">
                </div>
              </div>

              <div class="mt-3">
                  <label class="colorWhite" for="last_name">Apellido(s)<span class = "req"> *</span></label>
                  <input type="text" name="last_name" id="last_name" autocomplete="off" class="form-field">
              </div>
            </div>

            <div id="section-4" hidden>
              <div>
                  <label for="password colorWhite">Contraseña <small style="font-size: 10px;">(Mínimo 6 caracteres)</small></label>
                  <input type="password" name="password" id="password" autocomplete="off" class="form-field">
                  <span id ="res-pass1"></span>
              </div>

              <div class="mt-3">
                  <label for="password colorWhite">Confirme la contraseña</label>
                  <input type="password" name="password_confirmation" id="password_confirmation" autocomplete="off" class="form-field">
                  <span id ="res-pass2"></span>
              </div>
            </div>
          </div>

          <div class="containerBtn flex-row flex-between">
              <div class="relative box-icon-back">
                  <button name="btn_next" id="btn_back" class="btn btnBakc colorWhitew" hidden><svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-chevron-left" width="18" height="18" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                          <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                          <path d="M15 6l-6 6l6 6"></path>
                      </svg>Atrás</button>
              </div>

              <div class="relative box-icon-next">
                  <button name="btn_next" id="btn_next" class="btn btnnext colorWhitew">Siguiente<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-chevron-right" width="18" height="18" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                          <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                          <path d="M9 6l6 6l-6 6"></path>
                      </svg></button>
                  <button type="submit" id="register_btn" name="register_btn" class="btn-registro colorWhitew" hidden>Finalizar</button>
              </div>
          </div>
        </form>
        <div class="text-center fs-6">
            <a href="{{ route('index') }}">Ya tengo una cuenta</a>
        </div>
        <div class="cube"></div>
        <div class="cube"></div>
        <div class="cube"></div>
        <div class="cube"></div>
        <div class="cube"></div>
        <div class="cube"></div>
    </div>


    <!-- Modal -->
    <div class="modal fade" id="register-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">
                    <div id = "res-registro"></div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
    <script type="text/javascript" src="{{ asset('js/noResend.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/register.js') }}"></script>
</body>

</html>