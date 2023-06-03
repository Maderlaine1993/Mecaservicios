<!DOCTYPE html>
<html lang="es">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>RECIBO</title>
    <style>
        @page {
            size: 300pt 300pt;
            margin: 10pt;
        }

        body {
            font-family: Arial, sans-serif;
            margin: 10px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 10px;
        }

        th, td {
            padding: 5px;
            border-bottom: 1px solid #000;
        }

        th {
            background-color: #F5F5F5;
            font-weight: bold;
            text-align: left;
        }

        .label {
            font-weight: bold;
        }

        .compact {
            margin-bottom: 5px;
        }
    </style>
</head>
<body>
<div style="background-color: #0000FF; height: 5px;"></div>
<br>
<h2 align="center" style="color: #F33812; margin: 0;">Boleta de Pago</h2>
<br>
<table>
    <tr>
        <th>NIT del Cliente:</th>
        <td>
            @foreach($servicio_mecanico as $servicio_mecanicos)
                @if($servicio_mecanicos->id_serv_mec == $recibo->serv_mec_id)
                    {{$servicio_mecanicos->cliente_nit}}
                @endif
            @endforeach
        </td>
    </tr>
</table>
<table>
    <tr>
        <th>No de Recibo:</th>
        <td>{{$recibo->id_recibo}}</td>
    </tr>
    <tr>
        <th>Observación:</th>
        <td>{{$recibo->observacion}}</td>
    </tr>
    <tr>
        <th>Total de Descuento:</th>
        <td>{{$recibo->descuento}}</td>
    </tr>
    <tr>
        <th>Costo Total:</th>
        <td>{{$recibo->costo_total}}</td>
    </tr>
</table>
</body>
</html>
