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
                    <img src="https://i.ibb.co/JQdCFp4/Trabajadores.png" width="100" height="100">
                    </a> TRABAJADORES </h1>
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
                <a class="btn btn-success" href="{{route('createTrabajador')}}" style="background-color: #3DA025;border-radius: 50%">
                    <i style="color: white"> <i class="fas fa-plus"></i></i>
                </a>
                <br>
                <br>
                <table class="table table-light table-bordered table-hover text-center">
                    <thead style="color: #8B716C; border-color: #8B716C">
                    <tr>
                        <th style="background-color: #a4c2f4">Num</th>
                        <th style="background-color: #a4c2f4">Contraseña</th>
                        <th style="background-color: #a4c2f4">Nombre</th>
                        <th style="background-color: #a4c2f4">Apellido</th>
                        <th style="background-color: #a4c2f4">Rol</th>
                        <th style="background-color: #a4c2f4">Acciones</th>
                    </tr>
                    </thead>

                    <tbody style="border-color: #8B716C">
                    @foreach($trabajador as $trabajadores)
                        <tr>
                            <td>{{$trabajadores->tnum}}</td>
                            <td>{{$trabajadores->contrasenia}}</td>
                            <td>{{$trabajadores->tnombre}}</td>
                            <td>{{$trabajadores->tapellido}}</td>
                            <td>{{$trabajadores->descripcion}}</td>
                            <td>
                                <div class="btn btn-group">

                                    <a href="{{route('editTrabajador', $trabajadores->tnum)}}" class="btn btn-outline-info mb-2 me-2 m-1" style="border-radius: 50%">
                                        <i class="fas fa-pencil-alt"></i>
                                    </a>

                                    <form action="{{route('deleteTrabajador',$trabajadores->tnum)}}" method="POST">
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
                {{ $trabajador->links() }}

            </div>
        </div>
    </div>
@endsection
