@extends('layouts.app')
@section('title', 'Camiones')
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

                <div class="card">
                    <form action=" {{ route('cliente.saveCliente') }}" method="POST">
                        @csrf

                        <div class=" card-header text-center" style="background-color: #005555">
                            <h2 style="color: #FEFBE7"><i class="fas fa-user-check"></i> Registrar Cliente</h2>
                        </div>

                        <div class="card-body">
                            <div class="col-lg">
                                <input type="text" class="form-control" value="{{old('nit')}}"
                                       placeholder="NIT" name="nit">
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-lg">
                                    <input type="text" name="cnombre" class="form-control"
                                           value="{{old('cnombre')}}" placeholder="Nombre">
                                </div>

                                <div class="col-lg">
                                    <input type="text" name="capellido" class="form-control"
                                           value="{{old('capellido')}}" placeholder="Apellido">
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-lg">
                                    <input type="text" name="ctelefono" class="form-control"
                                           value="{{old('ctelefono')}}" placeholder="Telefono">
                                </div>

                                <div class="col-lg">
                                    <input type="text" name="cemail" class="form-control"
                                           value="{{old('cemail')}}" placeholder="Email">
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-lg">
                                    <input type="text" name="cdireccion" class="form-control"
                                           value="{{old('cdireccion')}}" placeholder="Direccion">
                                </div>

                                <div class="col-lg">
                                    <input type="text" name="num_servicio" class="form-control"
                                           value="{{old('num_servicio')}}" placeholder="Numero de Servicio">
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="row form-group">
                                    <button id="Guardado" type="submit" class="btn btn-outline-info col-md-4 offset-2 mr-3" onclick="save()">
                                        <i class="fas fa-save"></i> Guardar Cliente
                                    </button>
                                    <a class="btn btn-outline-danger btn-xs col-md-4" href=" {{ url('/readcliente') }}"><i
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
