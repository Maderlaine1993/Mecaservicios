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
                    <img src="https://i.ibb.co/41bV4kf/Recibo.png" width="60" height="60">
                    RECIBO
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
                        <th style="background-color: #a4c2f4">Servico Mecanico</th>
                        <th style="background-color: #a4c2f4">Observacion</th>
                        <th style="background-color: #a4c2f4">Descuento</th>
                        <th style="background-color: #a4c2f4">Costo Total</th>
                        <th style="background-color: #a4c2f4">PDF</th>
                    </tr>
                    </thead>

                    <tbody style="border-color: #8B716C">
                    @foreach($recibo as $recibos)
                        <tr>
                            <td>{{$recibos->id_recibo}}</td>
                            <td>{{$recibos->serv_mec_id}}</td>
                            <td>{{$recibos->observacion}}</td>
                            <td>{{$recibos->descuento}}</td>
                            <td>{{$recibos->costo_total}}</td>
                            <td>
                                <div class="btn btn-group">
                                    <a href="{{route('generarPDF', $recibos->id_recibo)}}" class="btn btn-outline-danger mb-2 me-2 m-1">
                                        <i class="far fa-file-pdf"></i>
                                    </a>
                                </div>
                            </td>

                        </tr>
                    @endforeach

                    </tbody>

                </table>
                <!-- Paginacion -->
                {{ $recibo->links() }}

            </div>
        </div>
    </div>
@endsection
