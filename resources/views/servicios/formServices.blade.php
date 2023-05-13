@extends('layouts.app')
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
                <br><br><br>
                <div class="card" style="border-color: #8B716C">
                    <form action=" {{ route('servicio.saveServicio') }}" method="POST">
                        @csrf

                        <div class=" card-header text-center" style="background-color: #a4c2f4; border-color: #8B716C">
                            <h2 style="color: #8B716C"><i class="fas fa-tools"></i> Ingresa el Nuevo Servicio</h2>
                        </div>
                        <br>
                        <div class="card-body">

                            <div class="row">

                                <div class="col-lg">
                                    <input type="text" name="snombre" class="form-control" placeholder="Nombre">
                                </div>

                                <div class="col-lg">
                                    <input type="text" name="scosto" class="form-control" placeholder="Costo">
                                </div>
                            </div>

                            <br>

                            <div class="row">
                                <div class="row form-group">
                                    <button id="Guardado" type="submit" class="btn btn-outline-info col-md-4 offset-2 mr-3" onclick="save()">
                                        <i class="fas fa-save"></i> Guardar Información
                                    </button>
                                    <a class="btn btn-outline-danger btn-xs col-md-4" href=" {{ url('/Servicios/list') }}"><i
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
