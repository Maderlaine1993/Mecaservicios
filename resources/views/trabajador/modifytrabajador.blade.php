@extends('layouts.app')
@section('title', 'Container')
@section('content')

    <div class="container">
        <div class=" row justify-content-center">
            <div class="col-md-7 mt-5 ml-5">

                <!-- Mensaje Flash -->
                @if(session('Guardado'))
                    <div class="alert alert-success">
                        {{ session('Guardado') }}
                    </div>
                @endif

            <!-- Validacion de Errores -->
                @if($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach($errors->all() as $error)
                                <li> {{ $error}} </li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="card" style="border-color: #8B716C">
                    <form action=" {{ route('updateTrabajador', $trabajador->tnum) }}" method="POST">
                        @csrf @method("PATCH")

                        <div class=" card-header text-center" style="background-color: #a4c2f4; border-color: #8B716C">
                            <h2 style="color: #8B716C"><i class="fas fa-user-tag"></i></i> Modificar Trabajador</h2>
                        </div>

                        <div class="card-body">
                            <div class="col-lg">
                                <input type="text" class="form-control" value="{{$trabajador->tnum}}"
                                       placeholder="Num" name="tnum">
                            </div>
                            <br>

                            <div class="row">
                                <div class="col-lg">
                                    <input type="text" name="contrasenia" class="form-control"
                                           value="{{$trabajador->contrasenia}}" placeholder="Contraseña">
                                </div>

                                <div class="col-lg">
                                    <input type="text" name="tnombre" class="form-control"
                                           value="{{$trabajador->tnombre}}" placeholder="Nombre">
                                </div>
                            </div>
                            <br>

                            <div class="row">
                                <div class="col-lg">
                                    <input type="text" name="tapellido" class="form-control"
                                           value="{{$trabajador->tapellido}}" placeholder="Apellido">
                                </div>

                                <div class="col-lg">
                                    <input type="text" name="rol_id" class="form-control"
                                           value="{{$trabajador->rol_id}}" placeholder="Rol ID">
                                </div>
                            </div>
                            <br>

                            <div class="row">
                                <div class="row form-group">
                                    <button id="Guardado" type="submit" class="btn btn-outline-info col-md-4 offset-2 mr-3" onclick="save()">
                                        <i class="fas fa-save"></i> Editar Datos Trabajador
                                    </button>
                                    <a class="btn btn-outline-danger btn-xs col-md-4" href=" {{ url('/readTrabajador') }}"><i
                                            class="fas fa-ban"></i> Cancelar
                                    </a>
                                </div>
                                <br>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

@endsection
