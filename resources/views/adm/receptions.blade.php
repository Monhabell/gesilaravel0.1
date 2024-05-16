@extends('templates/admin')

@section('contentApp')

<div class="container-fluid pt-5 mt-5">
    <!-- Page heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Recepción entorno {{ $environment }}</h1>
        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between">
            <div>
                @if ($receptions_quantity > 0)
                <h6 class="m-0 font-weight-bold text-primary">Cantidad de fichas: {{ $receptions_quantity }}</h6>
                @else
                <h6 class="m-0 font-weight-bold text-primary">No hay fichas cargadas</h6>
                @endif
            </div>
            <div>
                @if (session('success'))
                <div class="alert alert-success mb-0 py-0 px-3">
                    {{ session('success') }}
                </div>
                @endif

                @if (session('error'))
                <div class="alert alert-danger mb-0 py-0 px-3">
                    {{ session('error') }}
                </div>
                @endif
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                @if ($receptions_quantity > 0)
                <form action="{{ route('receptions.receive') }}" method="POST">
                    @method('PUT')
                    @csrf
                    <table class="table table-bordered" id="tableReceptions" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th></th>
                                <th>No. ficha</th>
                                <th>Formato</th>
                                <th>Cantidad</th>
                                <th>Entregado por</th>
                                <th>Fecha cargue</th>
                                <th>Opciones</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th></th>
                                <th>No. ficha</th>
                                <th>Formato</th>
                                <th>Cantidad</th>
                                <th>Entregado por</th>
                                <th>Fecha cargue</th>
                                <th>Opciones</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach ($receptions as $reception)
                            <tr>
                                <td class="text-center">
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input shadow" name="receptionsFiles[]" value="{{ $reception->id }}">
                                    </div>
                                </td>
                                <td>{{ $reception->file_number }}</td>
                                <td>{{ $reception->bases->nombrebase }}</td>
                                <td>{{ $reception->quantity }}</td>
                                <td>{{ $reception->user->name }} {{ $reception->user->last_name }}</td>
                                <td>{{ $reception->created_at }}</td>
                                <td class="between">
                                    <a class="btn btn-sm btn-primary" data-bs-toggle="collapse" href="#{{$reception->file_number}}{{$reception->id}}" role="button" aria-expanded="false" aria-controls="collapseExample">
                                        <i class="fa-solid fa-pen-to-square fa-xl"></i>
                                    </a>
                                    <button type="button" class ="btn btn-sm btn-danger">
                                        <i class="fa-solid fa-square-xmark fa-xl"></i>
                                    </button>    
                                </td>
                            </tr>
                            <tr class="p-0">
                                <td class="p-0"></td>
                                <td colspan="6" class="p-0">
                                    <div class="collapse" id="{{$reception->file_number}}{{$reception->id}}">
                                        <form action="{{ route('receptions.update', $reception) }}" class="container-fluid px-0" method="POST">
                                            @method('PUT')
                                            @csrf
                                            <div class="row d-flex justify-content-between">
                                                <div class="col d-flex justify-content-center">
                                                    <input type="number" class="form-control form-control-sm input-auto" name="file_number" value="{{ $reception->file_number }}">
                                                </div>
                                                <div class="col d-flex justify-content-center">
                                                    <select name="format_id" class="form-select form-select-sm">
                                                        @foreach ($bases as $base)
                                                            <option value="{{ $base->id }}" 
                                                                @if ($reception->bases->id === $base->id)
                                                                selected
                                                                @endif>{{ $base->nombrebase }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="col d-flex justify-content-center">
                                                    <input type="number" class="form-control form-control-sm" name="quantity" value="{{ $reception->quantity }}">
                                                </div>  
                                                <div class="col d-flex justify-content-center">
                                                    <input type="text" class="form-control form-control-sm" value="{{ $reception->user->name }} {{ $reception->user->last_name }}" disabled>
                                                </div>
                                                <div class="col d-flex justify-content-center">
                                                    <input type="text" class="form-control form-control-sm input-auto" value="{{ $reception->created_at }}" disabled>
                                                </div>
                                                <div class="col d-flex justify-content-center">
                                                    <input type="submit" value ="Guardar" class="btn btn-sm btn-success">
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="d-flex justify-content-between">
                        <div>
                            <button type="submit" class="btn btn-success btn-sm">Recibir fichas</button>
                        </div>
                        <div class="alert alert-primary">
                            <span class="text-alert">Cantidad de fichas seleccionadas:</span>
                        </div>
                    </div>
                </form>
                @else
                <div class="alert alert-dark text-dark" role="alert">
                Recepciones de {{$environment}} al día
                </div>
                @endif
            </div>
        </div>
    </div>
</div>

@endsection