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
                    <form action=" {{ route('updateVehiculo', $vehiculo->placa) }}" method="POST">
                        @csrf @method("PATCH")

                        <div class=" card-header text-center" style="background-color: #a4c2f4; border-color: #8B716C">
                            <h2 style="color: #8B716C"><i class="fas fa-user-tag"></i></i> Modificar Vehiculo</h2>
                        </div>

                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg">
                                    <input type="text" name="placa" class="form-control"
                                           value="{{$vehiculo->placa}}" placeholder="Placa">
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-lg">
                                    <input type="text" name="marca" class="form-control"
                                           value="{{$vehiculo->marca}}" placeholder="Marca">
                                </div>

                                <div class="col-lg">
                                    <input type="text" name="linea" class="form-control"
                                           value="{{$vehiculo->linea}}" placeholder="Linea">
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-lg">
                                    <input type="text" name="modelo" class="form-control"
                                           value="{{$vehiculo->modelo}}" placeholder="Modelo">
                                </div>

                                <div class="col-lg">
                                    <label class="mr-sm-2 sr-only" for="inlineFormCustomSelect"></label>
                                    <select name="nit_cliente" class="form-select" aria-label="Default select example" style="color: #839192">
                                        <option class="align-self-center" value="{{$vehiculo->nit_cliente}}" >Descuento</option>

                                        @foreach($cliente as $clientes)
                                            <option style="color: black" value="{{$clientes->nit}}" {{ $clientes->nit == old('nit_cliente', $vehiculo->nit_cliente) ? 'selected' : '' }}>{{$clientes->cnombre}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <br>

                            <div class="row">
                                <div class="row form-group">
                                    <button id="Guardado" type="submit" class="btn btn-outline-info col-md-4 offset-2 mr-3" onclick="save()">
                                        <i class="fas fa-save"></i> Editar
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
