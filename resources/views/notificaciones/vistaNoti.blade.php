@extends('layouts.app')
@section('title', 'Camiones')
@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10 ml-5">
                <h1 class="text-center mt-5" style="color: #005555"><i style="color:#005555"></i> NOTIFICACIONES </h1><br>

                <!--Mensaje de Eliminado-->
                @if(session('Eliminado'))
                    <div class="alert alert-danger text-dark" style="background-color: #F1D914 ;">
                        {{session('Eliminado')}}
                    </div>
                @endif

                <table class="table table-light table-bordered table-hover text-center">
                    <thead style="color: #069a8e">
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Correo</th>
                        <th>Descripcion</th>
                        <th>Enviar</th>
                    </tr>
                    </thead>

                    <tbody>
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
