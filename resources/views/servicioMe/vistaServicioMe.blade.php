@extends('layouts.app')
@section('title', 'Trabajador')
@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10 ml-5">
                <a href="/home" style="color: #2ECC71;font-size: 35px">
                    <i class="fas fa-arrow-alt-circle-left" style="background-color:  white; border-radius: 100px;"></i>
                </a>
                <h1 class="text-center mt-5" style= "color:white">
                    <img src="https://i.ibb.co/6YHt7v1/Servicios-Mecanicos.png" width="100" height="100">
                    </a> SERVICOS MECANICOS </h1>
                <br>

                <!--Mensaje de Eliminado-->
                @if(session('Eliminado'))
                    <div class="alert alert-danger text-dark" style="background-color: #F1D914 ;">
                        {{session('Eliminado')}}
                    </div>
                @endif

            <!--Mensaje de Modificado-->
                @if(session('Editado'))
                    <div class="alert alert-primary">
                        {{session('Editado')}}
                    </div>
                @endif

            <!--Mensaje de Guardado-->
                @if(session('Guardado'))
                    <div class="alert alert-success">
                        {{session('Guardado')}}
                    </div>
                @endif

            <!--boton para agregar trabajador-->
                <a class="btn btn-success" href="{{route('createServ_Mec')}}" style="background-color: #3DA025;border-radius: 50%">
                    <i style="color: white"> <i class="fas fa-plus"></i></i>
                </a>
                <br>
                <br>
                <table class="table table-light table-bordered table-hover text-center">
                    <thead style="color: #8B716C; border-color: #8B716C">
                    <tr>
                        <th style="background-color: #a4c2f4">ID</th>
                        <th style="background-color: #a4c2f4">Servicio</th>
                        <th style="background-color: #a4c2f4">Repuesto</th>
                        <th style="background-color: #a4c2f4">Mecanico</th>
                        <th style="background-color: #a4c2f4">Cliente</th>
                        <th style="background-color: #a4c2f4">Vehiculo</th>
                        <th style="background-color: #a4c2f4">Fecha</th>
                        <th style="background-color: #a4c2f4">Estado</th>
                        <th style="background-color: #a4c2f4">Acciones</th>
                    </tr>
                    </thead>

                    <tbody style="border-color: #8B716C">
                    @foreach($servicio_mecanico as $servicio_mecanicos)
                        <tr>
                            <td>{{$servicio_mecanicos->id_serv_mec}}</td>
                            <td>{{$servicio_mecanicos->snombre}}</td>
                            <td>{{$servicio_mecanicos->rnombre}}</td>
                            <td>{{$servicio_mecanicos->mnombre}}</td>
                            <td>{{$servicio_mecanicos->cnombre}}</td>
                            <td>{{$servicio_mecanicos->placa}}</td>
                            <td>{{date('d/m/y', strtotime($servicio_mecanicos->fecha))}}</td>
                            <td>{{$servicio_mecanicos->estado}}</td>
                            <td>
                                <div class="btn btn-group">

                                    <a href="{{route('editServ_Mec', $servicio_mecanicos->id_serv_mec)}}" class="btn btn-outline-info mb-2 me-2 m-1" style="border-radius: 50%">
                                        <i class="fas fa-pencil-alt"></i>
                                    </a>

                                    <form action="{{route('deleteServ_Mec',$servicio_mecanicos->id_serv_mec)}}" method="POST">
                                        @csrf @method('DELETE')

                                        <button type="submit" onclick="return confirm('¿Segurro de borrar?')" class="btn btn-outline-danger mb-2 mr-2 m-1"
                                                style="border-radius: 50%">
                                            <i class="far fa-trash-alt"></i>
                                        </button>
                                    </form>
                                    </form>
                                </div>
                            </td>

                        </tr>
                    @endforeach

                    </tbody>

                </table>
                <!-- Paginacion -->
                {{ $servicio_mecanico->links() }}

            </div>
        </div>
    </div>
@endsection
