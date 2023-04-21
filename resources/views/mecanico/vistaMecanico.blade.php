@extends('layouts.app')
@section('title', 'Camiones')
@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10 ml-5">
                <h1 class="text-center mt-5" style="color: #005555"><i style="color:#005555"></i> MECANICO </h1><br>

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
                    <thead style="color: #069a8e">
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Disponibilidad</th>
                        <th>Accion</th>
                    </tr>
                    </thead>

                    <tbody>
                    @foreach($mecanico as $mecanicos)
                        <tr>
                            <td>{{$mecanicos->id_mec}}</td>
                            <td>{{$mecanicos->mnombre}}</td>
                            <td>{{$mecanicos->disponibilidad}}</td>
                            <td>
                                <div class="btn btn-group">

                                    <a href="{{route('editMecanico', $mecanicos->id_mec)}}" class="btn btn-outline-info mb-2 me-2 m-1">
                                        <i class="fas fa-edit"></i>
                                    </a>


                                    <form action="{{route('deleteMecanico',$mecanicos->id_mec)}}" method="POST">
                                        @csrf @method('DELETE')

                                        <button type="submit" onclick="return confirm('¿Segurro de borrar?')" class="btn btn-outline-danger mb-2 mr-2 m-1">
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
