@extends('layouts.app')
@section('title', 'Camiones')
@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10 ml-5">
                <a href="/home" style="color: #2ECC71;font-size: 35px">
                    <i class="fas fa-arrow-alt-circle-left" style="background-color:  white; border-radius: 100px;"></i>
                </a>
                <h1 class="text-center mt-5" style= "color:white"><i style="color:#005555"></i>
                    <img src="https://i.ibb.co/tJXDNCM/Notificaciones.png" width="60" height="60">
                    NOTIFICACIONES
                </h1>
                <br>

                <!--Mensaje de Eliminado-->
                @if(session('Eliminado'))
                    <div class="alert alert-danger text-dark" style="background-color: #F1D914 ;">
                        {{session('Eliminado')}}
                    </div>
                @endif

                <table class="table table-light table-bordered table-hover text-center">
                    <thead style="color: #8B716C; border-color: #8B716C">
                    <tr>
                        <th style="background-color: #a4c2f4">ID</th>
                        <th style="background-color: #a4c2f4">Nombre</th>
                        <th style="background-color: #a4c2f4">Correo</th>
                        <th style="background-color: #a4c2f4">Descripcion</th>
                        <th style="background-color: #a4c2f4">Enviar</th>
                    </tr>
                    </thead>

                    <tbody style="border-color: #8B716C">
                    @foreach($notificacion as $notificaciones)
                        <tr>
                            <td>{{$notificaciones->id_noti}}</td>
                            <td>{{$notificaciones->nombre_n}}</td>
                            <td>{{$notificaciones->correo_n}}</td>
                            <td>{{$notificaciones->descripcion_n}}</td>
                            <td>
                                <div class="btn btn-group">
                                    <form action="{{route('deleteNoti',$notificaciones->id_noti)}}" method="POST">
                                        @csrf @method('DELETE')

                                        <button type="submit" onclick="return confirm('¿Segurro de enviar correo?')" class="btn btn-outline-danger mb-2 mr-2 m-1">
                                            <i class="fas fa-paper-plane"></i>
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
                {{ $notificacion->links() }}

            </div>
        </div>
    </div>
@endsection
