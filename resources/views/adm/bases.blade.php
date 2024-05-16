@extends('templates/admin')

@section('contentApp')

<div class="container-fluid pt-5 mt-5">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Bases y formatos</h1>
        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-toggle="modal" data-target="#insertBasesModal"><i class="fa-solid fa-sm fa-plus text-white-50"></i>Añadir Base</a>
    </div>

    <table class="table">
        <thead>
            <tr>
                <th>Entorno</th>
                <th>Nombre</th>
                <th>Tiempo encabezado</th>
                <th>Tiempo ind / seg</th>
                <th colspan="2" class="text-center">Opciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($bases as $base)
            <tr>
                <td>{{ $base->entorno->entorno }}</td>
                <td>{{ $base->nombrebase }}</td>
                <td>{{ $base->tiempoencabezado }}</td>
                <td>{{ $base->tiempoindseg }}</td>
                <td class="text-danger fw-bold">
                    <form action="{{ route('bases.destroy', $base) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <input type="submit" class="text-danger btn btn-light fw-bold" value="Eliminar" onclick="return confirm('¿Desea eliminar la base {{ $base->nombrebase }} ({{$base->entorno->entorno}})?')">
                    </form>
                </td>
                <td class="text-primary fw-bold">Editar</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<!-- Bases Modal -->
<div class="modal fade" id="insertBasesModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Agregar base</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form class="container" action="{{ route('bases.store') }}" method="POST" class="container">
            @csrf
            <div class="row">
                <div class="col-12 col-md-6 mb-3">
                    <label for="environment" class="col-form-label">Entorno</label>
                    <select class="form-select" aria-label="Default select example" id = "environment" name = "environment">
                        <option selected>Seleccionar entorno</option>
                        @foreach ($environments as $environment)
                        @if ($environment->entorno != "Gesi")
                        <option value="{{ $environment->id}}">{{ $environment->entorno}}</option>
                        @endif
                        @endforeach
                    </select>
                </div>
                <div class="col-12 col-md-6 mb-3">
                    <label for="baseName" class="col-form-label">Nombre base</label>
                    <input type = "text" class="form-control" id="baseName" name="baseName">
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-md-6 mb-3">
                    <label for="timeHeader" class="col-form-label">Tiempo encabezado</label>
                    <input type = "number" class="form-control" id="timeHeader" name="timeHeader">
                </div>
                <div class="col-12 col-md-6 mb-3">
                    <label for="timeUserSeg" class="col-form-label">Tiempo usuario/seguimiento</label>
                    <input type = "number" class="form-control" id="timeUserSeg" name="timeUserSeg">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-primary">Guardar</button>
            </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection