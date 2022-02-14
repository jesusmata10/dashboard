<html>
<head>
    <link rel="stylesheet" href="css/pdf.css">
</head>
<body>

<table class="">
    <tbody>
        <tr>

            <td class="text-right" style="width: 30%"><img src="{{ public_path('/img/Escudo-de-Venezuela.jpg') }}" width="50%" height="10%"alt=""></td>
            <td class="text-center" style="width: 60%; font-size:10pt"><b>{{-- env('APP_NAME') --}}</b> <br><br>
                <b style="color: #0c0c0c ;">REPÚBLICA BOLIVARIANA DE VENEZUELA</b><br>
                <b style="color: #0c0c0c ;">ESTADO BOLIVARIANO DE MIRANDA</b><br>
                <b style="color: #0c0c0c ;">MUNICIPIO AUTONOMO INDEPENDENCIA</b><br>
                <b style="color: #0c0c0c ;">PARROQUIA SANTA TERESA DEL TUY</b><br>
                <b style="color: #0c0c0c ;">CONSEJO COMUNAL</b><br>
                <b style="color: #0c0c0c ;">"JESUCRISTO ES MI SALVADOR"</b><br>
                <b style="color: #0c0c0c ;">URB.GRAN MARISCAL DE AYACUCHO, SECTOR 2B (MOPIA III)</b><br>
                <b style="color: #0c0c0c ;">CODIGO SITUR: CC-URB-2016-11-00028</b><br>
                <b style="color: #0c0c0c ;">RIF: C409522822</b>
            </td>
            <td class="text-left" style="width: 30%"><img src="{{ public_path('/img/escudo_de_miranda.jfif') }}" width="50%" height="11%"alt=""></td>
        </tr>
        <br>
        <br>
        <tr>
            <td colspan="3" class="text-center" style="vertical-align: center">
                <b>CONSTANCIA DE RESIDENCIA</b>
            </td>
        </tr>
    </tbody>
</table>
<table>
    <tbody>
        <tr style="text-align: justify;">
            <p>Quien suscribe las Voceras de Concejo Comunal "Jesuscristo es Mi Salvador" de la Ubr. Gran Mariscal de ayacucho del sector 2B (Mopia III), por medio de la presente hacemos constar que el (la) Ciudadano (a): {{ Auth::user()->name }}, mayor de edad: Si ( ) ó No ( ), portador de la Cedula de Identidad N° V ( ) E( ): ; esta residenciado (a) en la siguiente dirección:, desde hace (  ) años, la misma se solicita por motivo de tramite:_______________________________________________________________________. </p><br>
            <br>
            <p>Constancia que se Expide a solicitud de la parte interessada en Santa Teresa del Tuy a los ___ dias, del mes de _________________ del año 20____.</p>
        </tr>
    </tbody>
</table>
<table style="margin: 5em auto 2em;">
    <tbody>
        <tr>
            <td class="text-center" style="width: 30%; font-size:10pt; margin: 1em 2em;">
                <b>C.I.N°:</b><br>
                <b>TELF:</b><br>
                <b>VOCERA PRINCIPAL DE FINANZA</b>
            </td>
            <td class="" style="width: 15%; font-size:10pt">

            </td>
            <td class="text-center" style="width: 30%; font-size:10pt; margin: 1em 2em;">
                <b>C.I.N°:</b><br>
                <b>TELF:</b><br>
                <b>VOCERA PRINCIPAL DE CONTRALORIA</b>
            </td>
            <td class="" style="width: 15%; font-size:10pt">

            </td>
            <td class="text-center" style="width: 30%; font-size:10pt; margin: 1em 2em;">
                <b>C.I.N°:</b><br>
                <b>TELF:</b><br>
                <b>LIDER DE COMUNIDAD</b>
            </td>
        </tr>
        
    </tbody>
</table>
<table style="margin: 5em auto 2em;">
    <tbody>
        <td>
            <tr>
                <td class="text-right" style="width: 60%; font-size:10pt">
                    
                    <b>NOMBRE DEL JEFE DE AV. CALLE O VEREDA:</b><br>
                    <b>C.I.N°:</b><br>
                    <b>TELF:</b><br>
                    
                </td>
                <td class="text-left" style="width: 60%; font-size:10pt">
                    
                    <b>{{ Auth::user()->name }}</b><br>
                    <b>______________________________</b><br>
                    <b>______________________________</b><br>
                    
                </td>
            </tr>
        </td>
    </tbody>
</table>

</body>
</html>
