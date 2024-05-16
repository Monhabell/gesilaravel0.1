@extends('layouts.navDig')

@section('Principal')
<!-- <h2>Bienvenido {{$user->name}}</h2> -->
<div id="cargarPagina">
    <!-- aqui se cargara el contenido de cada pagina  -->

    <div class="row">

        Earnings (Monthly) Card Example
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Total meta ejecutada</div>
                            <div id="Tiempo" class="h5 mb-0 font-weight-bold text-gray-800"></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Meta programada</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">184 horas</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Otros tiempos</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">Resultado consulta</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Digitado Hoy</div>
                            <div id="TiempoDay" class="h5 mb-0 font-weight-bold text-gray-800"></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Usuarios y seguimientos</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">$215,000</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Mes
                            </div>
                            <div class="row no-gutters align-items-center">
                                <div class="col-auto">
                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">50%</div>
                                </div>
                                <div class="col">
                                    <div class="progress progress-sm mr-2">
                                        <div class="progress-bar bg-info" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Dia
                            </div>
                            <div class="row no-gutters align-items-center">
                                <div class="col-auto">
                                    <div id="valdayprogres" class="h5 mb-0 mr-3 font-weight-bold text-gray-800">0%</div>
                                </div>
                                <div class="col">
                                    <div class="progress progress-sm mr-2">
                                        <div id="progressday" class="progress-bar bg-info" role="progressbar" style="width: 0%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pending Requests Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                Paquetes Asignados</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">18</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-comments fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        
        <div class="col-xl-6 col-md-6 mb-4">
            <div class="card mt-2 mx-auto p-2 bg-light">
                <div class="card-body bg-light">

                    <div class="container">
                        <form id="Registroproduc" role="form" >
                            @csrf
                            <div class="controls">

                                <div class="row">
                                    <div class="col-md-6">
                                        <input type="date" id="fecha" name="fecha" value="{{ date('Y-m-d') }}" required hidden>
                                        <input type="number" id="iddig" name="idDig" value="{{ $user->id }}" required hidden>
                                        <div id="user-id" data-user-id="{{ $user->id }}"></div>



                                        <div class="form-group">
                                            <label for="form_name">No. ficha*</label>
                                            <input id="form_name" type="number" name="NoFicha" class="form-control" placeholder="1120345879 *" required="required" data-error="Firstname is required.">

                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="form_lastname">Entorno *</label>
                                            <select type="submit" placeholder="Entorno" class="form-control" name="entorno" id="entorno" required="">
                                            <option selected="" disabled="" value="">Seleccione una entornno</option>
                                            @foreach($entorno as $entornos)
                                                <option value="{{ $entornos->id }}">{{ $entornos->entorno }}</option>
                                            @endforeach
                                        </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="form_email">Base *</label>
                                            <select type="submit" placeholder="Base" id="select_bases" class="form-control" name="BaseEntornos"></select>
                                                <option value="">Seleccione una base</option>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="form_need">Cantidad de usuarios o seguimientos *</label>
                                            <input id="form_name" type="number" name="CantUsuSeg" class="form-control" placeholder="18" required="required" data-error="Firstname is required.">
                                        </div>
                                    </div>

                                    <div class="col-md-2">
                                        <input type="radio" id="nuevo" name="Actualizacion" value="1">
                                        <label for="nuevo">Nuevo</label>
                                    </div>
                                    <div class="col-md-2">
                                        <input type="radio" id="actualizacion" name="Actualizacion" value="0">
                                        <label for="actualizacion">Actualización</label>
                                    </div>
                                </div>

                                <div class="row">

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="form_message">Observaciones *</label>
                                            <textarea id="form_message" name="Observaciones" class="form-control" placeholder="Ingrese las novedades que se encontraron en el formato fisico y las correcciones realizadas" rows="4" required="required" data-error="Please, leave us a message."></textarea>
                                        </div>

                                    </div>

                                   


                                    <div class="col-md-12">

                                        <input type="submit" class="btn btn-success btn-send  pt-2 btn-block" value="Registrar">

                                    </div>

                                </div>

                                <div id="mensaje"></div>


                            </div>
                        </form>
                    </div>
                </div>


            </div>
            <!-- /.8 -->

        </div>
        <!-- /.row-->

        <div class="col-xl-6 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                    <div class="table-responsive">
                    <table class="table table-fixed" >
                        <thead>
                            <tr>
                                
                                <th scope="col" class="col-3">ficha</th>
                                <th scope="col" class="col-3">fecha</th>
                                <th scope="col" class="col-3">usuarios</th>
                                <th scope="col" class="col-3">Observaciones</th>

                            </tr>
                        </thead>
                        <tbody id="tabla-resultados">
                                                       
                           
                        </tbody>
                    </table>
                </div><!-- End -->
                    </div>
                </div>
            </div>
        </div>
  
    </div>
</div>

@endsection

