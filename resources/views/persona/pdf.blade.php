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
                <b>Lista de Jefe de Hogares</b>
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
            <th>CORREO</th>
            <th style="width: 40%">DIRECCIÓN</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($lista as $items)
            <tr class="text-center" style="font-size:10pt">
                <td> {{$items->num}} </td>
                <td> {{$items->cedula}} </td>
                <td> {{$items->nombres}} </td>
                <td> {{$items->apellidos}} </td>
                <td> {{$items->correo}}</td>
                <td> {{$items->estado}}, {{$items->urbanizacion}}, {{$items->zona}} {{$items->nzona}}, {{$items->calle}} {{$items->ncalle}}, {{$items->vivienda}} {{$items->nvivienda}} </td>
            </tr>
        @endforeach
    </tbody>
</table>

<!-- footer>
    <script type="text/php">
        if ( isset($pdf) ) {
            $pdf->page_script('
                $font = $fontMetrics->get_font("Arial, Helvetica, sans-serif", "normal");
                $pdf->text(750, 565, "Pagina $PAGE_NUM de $PAGE_COUNT", $font, 10);

            ');
        }
    </script>
</footer -->
</body>
</html>
