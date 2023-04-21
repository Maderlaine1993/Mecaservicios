@extends('layouts.app')
@section('title', 'Camiones')
@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10 ml-5">
                <h1 class="text-center mt-5" style="color: #005555"><i style="color:#005555"></i> COMPRAS </h1><br>

                <table class="table table-light table-bordered table-hover text-center">
                    <thead style="color: #069a8e">
                    <tr>
                        <th>No. Compras</th>
                        <th>Nombre</th>
                    </tr>
                    </thead>

                    <tbody>
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
