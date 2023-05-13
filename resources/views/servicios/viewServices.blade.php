@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10 ml-5">
            <a href="/home" style="color: #2ECC71;font-size: 35px">
                <i class="fas fa-arrow-alt-circle-left" style="background-color:  white; border-radius: 100px;"></i>
            </a>
            <h1 class="text-center mt-5" >
                <img src="https://i.ibb.co/TtCr69L/Servicios.png" width="100" height="100">
                </a> SERVICIOS </h1>
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

        <!--boton de agregar-->
            <a class="btn btn-success" href="{{route('createServicio')}}" style="background-color: #3DA025;border-radius: 50%">
                <i style="color: white"> <i class="fas fa-plus"></i></i>
            </a>
            <br>
            <br>
            <table class="table table-light table-bordered table-hover text-center">
                <thead style="color: #8B716C; border-color: #8B716C">
                <tr>
                    <th style="background-color: #a4c2f4">ID</th>
                    <th style="background-color: #a4c2f4">Nombre</th>
                    <th style="background-color: #a4c2f4">Precio</th>
                    <th style="background-color: #a4c2f4">Acciones</th>
                </tr>
                </thead>


                <tbody style="border-color: #8B716C">
                    @foreach($servicio as $servicios)
                        <tr >
                            <td>{{$servicios->id_servicio}}</td>
                            <td>{{$servicios->snombre}}</td>
                            <td>Q {{$servicios->scosto}}</td>
                            <!-- Botones de Acción -->
                            <td>
                                <div class="btn btn-group">

                                    <a href="{{route('editServicio', $servicios->id_servicio)}}" class="btn btn-outline-info mb-2 me-2 m-1" style="border-radius: 50%">
                                        <i class="fas fa-pencil-alt"></i>
                                    </a>

                                    <form action="{{route('deleteServicio',$servicios->id_servicio)}}" method="POST">
                                        @csrf @method('DELETE')

                                        <button type="submit" onclick="return confirm('¿Segurro de borrar la Información?')" class="btn btn-outline-danger mb-2 mr-2 m-1"
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
            {{ $servicio->links() }}
        </div>
    </div>
</div>

@endsection
