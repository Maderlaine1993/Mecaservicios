@extends('layouts.app')
@section('title', 'Camiones')
@section('content')

    <div class="container">
        <div class=" row justify-content-center">
            <div class="col-md-7 mt-5 ml-5">

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

                <div class="card">
                    <form action=" {{ route('updateMecanico', $mecanico->id_mec) }}" method="POST">
                        @csrf @method("PATCH")

                        <div class=" card-header text-center" style="background-color: #a4c2f4; border-color: #8B716C">
                            <h2 style="color: #8B716C"><i class="fas fa-user-cog"></i></i> Editar Mecanico</h2>
                        </div>
                        <br>
                        <div class="col-md-10 offset-md-1">
                            <div class="col-lg">
                                <label for="" class="col-4">ID Mecanico</label>
                                <input type="text" name="id_mec" class="form-control"
                                       value="{{$mecanico->id_mec}}">
                            </div>
                            <br>
                            <div class="col-lg">
                                <label for="" class="col-4">Nombre</label>
                                <input type="text" name="mnombre" class="form-control"
                                       value="{{$mecanico->mnombre}}">
                            </div>
                            <br>
                            <div class="col-lg">
                                <label for="" class="col-4">Disponibilidad</label>
                                <input type="text" name="disponibilidad" class="form-control"
                                       value="{{$mecanico->disponibilidad}}">
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="row form-group">
                                <button id="Guardado" type="submit" class="btn btn-outline-info col-md-4 offset-2 mr-3" onclick="save()">
                                    <i class="fas fa-save"></i> Editar Mecanico
                                </button>
                                <a class="btn btn-outline-danger btn-xs col-md-4" href=" {{ url('/readmecanico') }}"><i
                                        class="fas fa-ban"></i> Cancelar
                                </a>
                            </div>
                            <br>
                        </div>
                        <br>
                    </form>
                </div>
            </div>

@endsection
