<!DOCTYPE html>
<html lang="en">

<head>
  <title>GESI APP</title>
  <!-- Required meta tags -->
  <meta http-equiv="Expires" content="0">
  <meta http-equiv="Last-Modified" content="0">
  <meta http-equiv="Cache-Control" content="no-cache, mustrevalidate">
  <meta http-equiv="Pragma" content="no-cache">
  <meta name="keywords" lang="es" content="gesi, gesiapp, digitacion">
  <meta name="description" content="Gestión y administración integral del proceso GESI, para la Subred Integrada de Servicios de Salud Norte">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="icon" href="{{ asset('img/logo.png') }}" />
  <!-- Bootstrap CSS v5.2.0-beta1 -->
  <link rel="stylesheet" href="{{ asset('styles/inx_new.css') }}">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-2756377313199849" crossorigin="anonymous"></script>>
</head>

<body>
  <div class="hero">
    <div class="wrapper">
      <div class="logo">
        <img src="{{ asset('img/logo_temp.png') }}" alt="">
      </div>
      <div class="text-center mt-4 name">
        GesiApp
      </div>
      <form class="p-3 mt-3" method="POST" action="{{ route('login') }}">
        @csrf
        <div class="form-field d-flex align-items-center">
          <span class="fa fa-user"></span>
          <input type="email" name="email" id="email" placeholder="gesiapp@gmail.com">
        </div>

        <div class="form-field d-flex align-items-center">
          <span class="fa fa-key"></span>
          <input id="viuPass" type="password" class="color " name="password" id="password" placeholder="Contraseña">
          <span id="viuPasseyes" class="fa fa-eye" onclick="viewPassword()"></span>
        </div>

        @error('message')
        <div class="alertaRed">
          <h3 class="textAlert" role="alert">{{ $message }}</h3>
        </div>
        @enderror

        <button type="submit" name="ingresar" id="ingresar" class="btn mt-3">Iniciar Sesion</button>
      </form>
      <div class="text-center fs-6">
        <a href="{{ route('password.request') }}">¿Olvidaste tu contraseña?</a> o <a href="{{ route('register') }}">Registrarse</a>
      </div>
    </div>
    <div class="cube"></div>
    <div class="cube"></div>
    <div class="cube"></div>
    <div class="cube"></div>
    <div class="cube"></div>
    <div class="cube"></div>
  </div>

</body>
<script>
  function viewPassword() {
    const pass = document.getElementById('viuPass');
    const viueyes = document.getElementById('viuPasseyes');
    if (pass.type == "password") {
      pass.type = "text";
      viueyes.classList.remove('fa-eye')
      viueyes.classList.add('fa-eye-slash')
      viueyes.classList.add('active')
    } else {
      pass.type = "password";
      viueyes.classList.remove('active')
      viueyes.classList.remove('fa-eye-slash')
      viueyes.classList.add('fa-eye')
    }
  }
</script>

</html>