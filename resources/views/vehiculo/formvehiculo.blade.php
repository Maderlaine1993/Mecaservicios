@extends('layouts.app')
@section('title', 'Trabajador')
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
                    <form action=" {{ route('trabajador.saveVehiculo') }}" method="POST">
                        @csrf

                        <div class=" card-header text-center" style="background-color: #a4c2f4; border-color: #8B716C">
                            <h2 style="color: #8B716C"><i class="fas fa-user-check"></i> Registrar Vehiculo</h2>
                        </div>

                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg">
                                    <input type="text" name="placa" class="form-control"
                                           value="{{old('placa')}}" placeholder="Placa">
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-lg">
                                    <input type="text" name="marca" class="form-control"
                                           value="{{old('marca')}}" placeholder="Marca">
                                </div>

                                <div class="col-lg">
                                    <input type="text" name="linea" class="form-control"
                                           value="{{old('linea')}}" placeholder="Linea">
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-lg">
                                    <input type="text" name="modelo" class="form-control"
                                           value="{{old('modelo')}}" placeholder="Modelo">
                                </div>

                                <div class="col-lg">
                                    <label class="mr-sm-2 sr-only" for="inlineFormCustomSelect"></label>
                                    <select name="nit_cliente" class="form-select" aria-label="Default select example" value="{{old('nit_cliente')}}" style="color: #839192">
                                        <option class="align-self-center" value="" >Cliente</option>

                                        @foreach($cliente as $clientes)
                                            <option style="color: black" value="{{$clientes->nit}}">{{$clientes->cnombre}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="row form-group">
                                    <button id="Guardado" type="submit" class="btn btn-outline-info col-md-4 offset-2 mr-3" onclick="save()">
                                        <i class="fas fa-save"></i> Guardar Vehiculo
                                    </button>
                                    <a class="btn btn-outline-danger btn-xs col-md-4" href=" {{ url('/readVehiculo') }}"><i
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
