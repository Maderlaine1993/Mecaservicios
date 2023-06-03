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
                    <form action=" {{ route('Serv_Mec.saveServ_Mec') }}" method="POST">
                        @csrf

                        <div class=" card-header text-center" style="background-color: #a4c2f4; border-color: #8B716C">
                            <h2 style="color: #8B716C"><i class="fas fa-user-check"></i> Registrar Servicio Mecanico</h2>
                        </div>

                        <div class="card-body">
                            <div class="row">
                                    <div class="col-lg">
                                        <label class="mr-sm-2 sr-only" for="inlineFormCustomSelect"></label>
                                        <select name="servicio_id" class="form-select" aria-label="Default select example" value="{{old('servicio_id')}}" style="color: #839192">
                                            <option class="align-self-center" value="" >Servicio</option>

                                            @foreach($servicio as $servicios)
                                                <option style="color: black" value="{{$servicios->id_servicio}}">{{$servicios->snombre}}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="col-lg">
                                        <label class="mr-sm-2 sr-only" for="inlineFormCustomSelect"></label>
                                        <select name="repuesto_id" class="form-select" aria-label="Default select example" value="{{old('repuesto_id')}}" style="color: #839192">
                                            <option class="align-self-center" value="" >Repuesto</option>

                                            @foreach($repuesto as $repuestos)
                                                <option style="color: black" value="{{$repuestos->id_repuesto}}">{{$repuestos->rnombre}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-lg">
                                        <label class="mr-sm-2 sr-only" for="inlineFormCustomSelect"></label>
                                        <select name="mecanico_id" class="form-select" aria-label="Default select example" value="{{old('mecanico_id')}}" style="color: #839192">
                                            <option class="align-self-center" value="" >Mecanico</option>

                                            @foreach($mecanico as $mecanicos)
                                                <option style="color: black" value="{{$mecanicos->id_mec}}">{{$mecanicos->mnombre}}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="col-lg">
                                        <label class="mr-sm-2 sr-only" for="inlineFormCustomSelect"></label>
                                        <select name="cliente_nit" class="form-select" aria-label="Default select example" value="{{old('cliente_nit')}}" style="color: #839192">
                                            <option class="align-self-center" value="" >Cliente</option>

                                            @foreach($cliente as $clientes)
                                                <option style="color: black" value="{{$clientes->nit}}">{{$clientes->cnombre}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-lg">
                                        <label class="mr-sm-2 sr-only" for="inlineFormCustomSelect"></label>
                                        <select name="vehiculo_placa" class="form-select" aria-label="Default select example" value="{{old('vehiculo_placa')}}" style="color: #839192">
                                            <option class="align-self-center" value="" >Vehiculo</option>

                                            @foreach($vehiculo as $vehiculos)
                                                <option style="color: black" value="{{$vehiculos->placa}}">{{$vehiculos->placa}}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="col-lg">
                                        <input type="text" name="fecha" class="form-control"
                                               value="{{old('fecha')}}" placeholder="Fecha">
                                    </div>

                                    <div class="col-lg">
                                        <input type="text" name="estado" class="form-control"
                                               value="{{old('estado')}}" placeholder="Estado">
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="row form-group">
                                        <button id="Guardado" type="submit" class="btn btn-outline-info col-md-4 offset-2 mr-3" onclick="save()">
                                            <i class="fas fa-save"></i> Guardar
                                        </button>

                                        <a class="btn btn-outline-danger btn-xs col-md-4" href=" {{ url('/readServ_Mec') }}"><i
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
