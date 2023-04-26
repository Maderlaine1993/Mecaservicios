@extends('layouts.app')
@section('title', 'Camiones')
@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10 ml-5">
                <a href="/home" style="color: #2ECC71;font-size: 35px">
                    <i class="fas fa-arrow-alt-circle-left" style="background-color:  white; border-radius: 100px;"></i>
                </a>
                <h1 class="text-center mt-5"><i style="color:#005555">
                        <img src="https://i.ibb.co/cg8LRmP/Mecanico.png" width="90" height="90">
                    </i> MECANICO </h1>
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

                <table class="table table-light table-bordered table-hover text-center">
                    <thead style="color: #8B716C; border-color: #8B716C">
                    <tr>
                        <th style="background-color: #a4c2f4">ID</th>
                        <th style="background-color: #a4c2f4">Nombre</th>
                        <th style="background-color: #a4c2f4">Disponibilidad</th>
                        <th style="background-color: #a4c2f4">Accion</th>
                    </tr>
                    </thead>

                    <tbody style="border-color: #8B716C">
                    @foreach($mecanico as $mecanicos)
                        <tr>
                            <td>{{$mecanicos->id_mec}}</td>
                            <td>{{$mecanicos->mnombre}}</td>
                            <td>{{$mecanicos->disponibilidad}}</td>
                            <td>
                                <div class="btn btn-group">

                                    <a href="{{route('editMecanico', $mecanicos->id_mec)}}" class="btn btn-outline-info mb-2 me-2 m-1" style="border-radius: 50%">
                                        <i class="fas fa-pencil-alt"></i>
                                    </a>


                                    <form action="{{route('deleteMecanico',$mecanicos->id_mec)}}" method="POST">
                                        @csrf @method('DELETE')

                                        <button type="submit" onclick="return confirm('¿Segurro de borrar?')" class="btn btn-outline-danger mb-2 mr-2 m-1"
                                                style="border-radius: 50%">
                                            <i class="far fa-trash-alt"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>

                        </tr>
                    @endforeach

                    </tbody>

                </table>
                <!-- Paginacion -->
                {{ $mecanico->links() }}

            </div>
        </div>
    </div>
@endsection
