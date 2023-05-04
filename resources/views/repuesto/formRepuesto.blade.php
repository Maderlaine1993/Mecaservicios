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

                <div class="card" style="border-color: #8B716C">
                    <form action=" {{ route('repuesto.saveRepuesto') }}" method="POST">
                        @csrf

                        <div class=" card-header text-center" style="background-color: #a4c2f4; border-color: #8B716C">
                            <h2 style="color: #8B716C"><i class="fas fa-user-check"></i> Ingresar Repuesto</h2>
                        </div>

                        <div class="card-body">
                            <div class="col-lg">
                                <input type="text" class="form-control" value="{{old('id_repuesto')}}"
                                       placeholder="ID" name="id_repuesto">
                            </div>
                            <br>

                            <div class="row">
                                <div class="col-lg">
                                    <input type="text" name="rnombre" class="form-control"
                                           value="{{old('rnombre')}}" placeholder="Nombre">
                                </div>

                                <div class="col-lg">
                                    <input type="text" name="rcantidad" class="form-control"
                                           value="{{old('rcantidad')}}" placeholder="Cantidad">
                                </div>
                            </div>
                            <br>

                            <div class="row">
                                <div class="col-lg">
                                    <input type="text" name="rprecio" class="form-control"
                                           value="{{old('rprecio')}}" placeholder="Precio">
                                </div>

                                <div class="col-lg">
                                    <input type="text" name="stock_min" class="form-control"
                                           value="{{old('stock_min')}}" placeholder="Stock Minimo">
                                </div>
                            </div>
                            <br>

                            <div class="row">
                                <div class="row form-group">
                                    <button id="Guardado" type="submit" class="btn btn-outline-info col-md-4 offset-2 mr-3" onclick="save()">
                                        <i class="fas fa-save"></i> Guardar Repuesto
                                    </button>
                                    <a class="btn btn-outline-danger btn-xs col-md-4" href=" {{ url('/readRepuesto') }}"><i
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
