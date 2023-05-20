@extends('layouts.app')
@section('title', 'Camiones')
@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10 ml-5">
                <a href="/home" style="color: #2ECC71;font-size: 35px">
                    <i class="fas fa-arrow-alt-circle-left" style="background-color:  white; border-radius: 100px;"></i>
                </a>
                <h1 class="text-center mt-5" style= "color:white"><i style="color:#005555">
                        <img src="https://i.ibb.co/PFZCgcn/Carrito.png" width="100" height="100">
                    </i> COMPRAS </h1>
                <br>

                <table class="table table-light table-bordered table-hover text-center">
                    <thead style="color: #8B716C; border-color: #8B716C">
                    <tr>
                        <th style="background-color: #a4c2f4">No. Compras</th>
                        <th style="background-color: #a4c2f4">Nombre</th>
                    </tr>
                    </thead>

                    <tbody style="border-color: #8B716C">
                    @foreach($compras as $compra)
                        <tr>
                            <td>{{$compra->id_compras}}</td>
                            <td>{{$compra->nombre_co}}</td>
                        </tr>
                    @endforeach

                    </tbody>

                </table>
                <!-- Paginacion -->
                {{ $compras->links() }}

            </div>
        </div>
    </div>
@endsection
