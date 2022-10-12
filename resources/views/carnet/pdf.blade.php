<html>
<head>
    <link rel="stylesheet" href="css/pdf.css">
</head>
<body>

<table class="table">
    <tbody>
        <tr>
            <td class="text-left" style="width: 30%"><img src="{{ public_path('/img/logo.jfif') }}" width="40%" height="10%"alt=""></td>
            <td class="text-center" style="width: 60%; font-size:12pt"><b>{{ env('APP_NAME') }}</b> <br><br></BR><b style="color: #337DFF ;">CONSEJO COMUNAL JESUCRISTO ES MI SALVADOR</b></td>

            <td class="text-right" style="width: 30%; font-size:7pt">
                <span>Realizado por: {{ Auth::user()->name }}</span>
                <br>
                <spanp>{{ \Carbon\Carbon::now()->format('d/m/Y h:m:s') }}</spanp>
                <br>
                <span>Vocero:</span>
                <br>
                <span>Ubicación:</span>
            </td>
        </tr>
        <tr>
            <td colspan="3" class="text-center" style="vertical-align: center">
                <b>Lista de Carnet Registrado</b>
            </td>
        </tr>
    </tbody>
</table>

<table class="table table-bordered table-sm">
    <thead>
        <tr class="text-center" style="font-size:9pt">
            <th style="width: 4%">N°</th>
            <th style="width: 10%">CÉDULA</th>
            <th>NOMBRES</th>
            <th>APELLIDOS</th>
            <th>SERIAL</th>
            <th>CODIGO</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($lista as $items)
            <tr class="text-center" style="font-size:10pt">
                <td> {{$items->num}} </td>
                <td> {{$items->cedula}} </td>
                <td> {{$items->primer_nombre}}, {{$items->segundo_nombre}} </td>
                <td> {{$items->primer_apellido}}, {{$items->segundo_apellido}} </td>
                <td> {{$items->serial}}</td>
                <td> {{$items->codigo}}</td>
            </tr>
        @endforeach
    </tbody>
</table>

</body>
</html>
