@extends('layouts.navDig')
@section('Principal')

<link rel="stylesheet" href="{{ asset('styles/dig/dig_product.css') }}">
<link rel="stylesheet" href="{{ asset('styles/modal_user.css') }}">


<div class="cuerpoPag">
    <div id="user-id" data-user-id="{{ $user->id }}"></div>
    <div class="row">
        <button id="btnActualizar" class="btn btn-light"><i class="fa-solid fa-arrows-rotate fa-spin-pulse"></i></button>
        <div id="mensajeInformativo" class="messPaquetes" style="display: none;">
            <div class="container">
                <h1>En estos momentos no tienes nada asignado</h1>
                <p>Por favor, regresa más tarde para ver si hay actualizaciones.</p>

                <button onclick="Init()">Jugar</button>

                <div class="contenedorGame">

                    <div class="suelo"></div>
                    
                    <div class="dino dino-corriendo"></div>

                    <div class="score">0</div>

                    <div class="game-over">GAME OVER</div>

                </div>
            </div>
        </div>
        <div id="listaPaquetes" class="row"></div>
    </div>
</div>

<div class="table-responsive" id="contenedorTable" >
    <table id="tablaPaquetes" class="table custom-table">
        <thead>
            <tr>              
                <th scope="col">Paquete</th>  
                <th scope="col">Ficha</th>
                <th scope="col">Base</th>
                <th scope="col">Digitado</th>
                <th scope="col">Digitado por</th>
            </tr>
        </thead>
        <tbody>
        </tbody>        
    </table>
</div>

<div>
    @include('modals/dataUser')   
</div>

<script src="{{ asset('js/dig/play.js') }}"></script>
<!-- jQuery y Bootstrap JavaScript -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha384-KyZXEAg3QhqLMpG8r+Knujsl5+z5v2KgKkXXD+B39+YEow5mFX2swG+O6X6yFfws" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js" integrity="sha384-pzjw8f+ua7O5NzB+3U8kRj3YhiuduP+ra0X4xXs1rZxytc++O1FvMz2Z8F4pRy4z" crossorigin="anonymous"></script>


@endsection