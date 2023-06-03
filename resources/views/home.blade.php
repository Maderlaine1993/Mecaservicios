@extends('layouts.app')
@section('content')
<div class="container">
   <div class="row justify-content-center">

   <div class="text-center" style= "color:white">
       <h1><b>MECASERVICOS VVA</b></h1>
   </div>
    <div class="row">
        <!-- Grupo de 5 tarjetas arriba -->
        <div class="col-md-12" >
            <br>
            <div class="card-deck">
                <div class="card" style="max-height: 200px; background-color: #a4c2f4; border-radius: 25px">
                    <br>
                    <br>
                    <div class="text-center">
                        <a href="/readcliente">
                            <img src="https://i.ibb.co/TkM3xF4/Diagrama-en-blanco-2.png" width="100" height="100">
                        </a>
                        <h5>Clientes</h5>
                    </div>
                    <br>
                    <br>
                </div>
                <div class="card" style="max-height: 200px; background-color: #a4c2f4; border-radius: 25px">
                    <br>
                    <br>
                    <div class="text-center">
                        <a href="/readVehiculo">
                            <img src="https://i.ibb.co/MfMB6Gq/Vehiculo.png" width="100" height="100">
                        </a>
                        <h5>Vehiculos</h5>
                    </div>
                    <br>
                    <br>
                </div>
                <div class="card" style="max-height: 200px; background-color: #a4c2f4; border-radius: 25px">
                    <br>
                    <br>
                    <div class="text-center">
                        <a href="/readTrabajador">
                            <img src="https://i.ibb.co/JQdCFp4/Trabajadores.png" width="100" height="100">
                        </a>
                        <h5>Trabajadores</h5>
                    </div>
                    <br>
                    <br>
                </div>
                <div class="card" style="max-height: 200px; background-color: #a4c2f4; border-radius: 25px">
                    <br>
                    <br>
                    <div class="text-center">
                        <a href="/readmecanico">
                            <img src="https://i.ibb.co/cg8LRmP/Mecanico.png" width="100" height="100">
                        </a>
                        <h5>Mecanicos</h5>
                    </div>
                    <br>
                    <br>
                </div>
                <div class="card" style="max-height: 200px; background-color: #a4c2f4; border-radius: 25px">
                    <br>
                    <br>
                    <div class="text-center">
                        <a href="/readRepuesto">
                            <img src="https://i.ibb.co/F0Wytfg/Repuestos.png" width="100" height="100">
                        </a>
                        <h5>Repuestos</h5>
                    </div>
                    <br>
                    <br>
                </div>
            </div>
        </div>

        <!-- Grupo de 5 tarjetas abajo -->
        <div class="col-md-12">
            <br>
            <div class="card-deck">
                <div class="card" style="max-height: 200px; background-color: #a4c2f4; border-radius: 25px">
                    <br>
                    <br>
                    <div class="text-center">
                        <a href="/Servicios/list">
                            <img src="https://i.ibb.co/TtCr69L/Servicios.png" width="100" height="100">
                        </a>
                        <h5>Servicio</h5>
                    </div>
                    <br>
                    <br>
                </div>
                <div class="card" style="max-height: 200px; background-color: #a4c2f4; border-radius: 25px">
                    <br>
                    <br>
                    <div class="text-center">
                        <a href="#">
                            <img src="https://i.ibb.co/6YHt7v1/Servicios-Mecanicos.png" width="100" height="100">
                        </a>
                        <h5>Servicios-Mecanicos</h5>
                    </div>
                    <br>
                    <br>
                </div>
                <div class="card" style="max-height: 200px; background-color: #a4c2f4; border-radius: 25px">
                    <br>
                    <br>
                    <div class="text-center">
                        <a href="#">
                            <img src="https://i.ibb.co/41bV4kf/Recibo.png" width="100" height="100">
                        </a>
                        <h5>Recibos</h5>
                    </div>
                    <br>
                    <br>
                </div>
                <div class="card" style="max-height: 200px; background-color: #a4c2f4; border-radius: 25px">
                    <br>
                    <br>
                    <div class="text-center">
                        <a href="/readcompras">
                            <img src="https://i.ibb.co/PFZCgcn/Carrito.png" width="100" height="100">
                        </a>
                        <h5>Compras</h5>
                    </div>
                    <br>
                    <br>
                </div>
                <div class="card" style="max-height: 200px; background-color: #a4c2f4; border-radius: 25px">
                    <br>
                    <br>
                    <div class="text-center">
                        <a href="/readnotificacion">
                            <img src="https://i.ibb.co/tJXDNCM/Notificaciones.png" width="100" height="100">
                        </a>
                        <h5>Notificaciones</h5>
                    </div>
                    <br>
                    <br>
                </div>
                </div>
            </div>
        </div>
    </div>
   </div>
</div>
@endsection
