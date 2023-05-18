@section('title', 'Capacidades')

@extends('layouts.app')

@section('content')
    <style>
        //---------------------------------------------------------------------
        /* Estilo para tablas y responsive */

        #DataTable {
            position: relative;
            padding: 15px;
            box-sizing: border-box;
        }

        table {
            //width: 100%;
            border-collapse: collapse;
        }

        th {
            font-weight: bold;
            text-align: center;
            cursor: cell;
        }


        /* responsive */
        @media only screen and (max-width: 760px),
        (min-device-width: 768px) and (max-device-width: 1024px) {

            table {
                margin-top: 106px;
            }

            /* Fozar tablas a cambiar de forma en tarjetas individuales*/
            table,
            thead,
            tbody,
            th,
            td,
            tr {
                display: block;
            }

            thead {
                --cols: 5;
                --height: calc(1.67em * var(--cols));
                text-shadow: 0 var(--height),
                    0 calc(var(--height) * 2),
                    0 calc(var(--height) * 3),
                    0 calc(var(--height) * 4);
                /* extra shadows are still ok */
            }

            /* Esconde las cabeceras (pero sin display: none;, para accesibilidad) */
            thead tr {
                position: absolute;
                top: -9999px;
                left: -9999px;
            }

            tr {
                margin: 0 0 1rem 0;
                overflow: auto;
                // border-bottom: 1px solid #ccc;

            }



            tbody tr:before {
                counter-increment: my-sec-counter;
                content: "";
                //background-color:#333;
                display: block;
                height: 1px;

            }


            /* tr:nth-child(odd) {
                      background: #ccc;
                    } */

            td {
                /* Se comporta como una "fila" */
                // border: 1px solid;
                margin-right: 0%;
                display: block;
                box-sizing: border-box;
                text-align: left;



                border-top: 1px solid #414141 !important;
                border-bottom: 1px solid #414141;
                border-right: 1px solid #414141;
                border-left: 1px solid #414141;
            }

            td:before {
                /* Los valores superior/izquierdo imitan el relleno */
                width: 50%;
                float: left;
                box-sizing: border-box;
                padding-left: 5px;
            }

            strong {
                width: 20px;
                display: inline-block;
                white-space: pre-wrap;
            }

            /*
                  Label the data
                    You could also use a data-* attribute and content for this. That way "bloats" the HTML, this way means you need to keep HTML and CSS in sync. Lea Verou has a clever way to handle with text-shadow.
                  */
            td:nth-of-type(1):before {
                content: "Nombre";
                font-weight: bold;
                text-align:initial;
            }

            td:nth-of-type(2):before {
                content: "Población femenina";
                font-weight: bold;
            }

            td:nth-of-type(3):before {
                content: "Población masculina";
                font-weight: bold;
            }

            td:nth-of-type(4):before {
                content: "Población transgénero";
                font-weight: bold;
            }


            .box ul.pagination {
                position: relative !important;
                bottom: auto !important;
                right: auto !important;
                display: block !important;
                width: 100%;
            }

            .box {
                text-align: left;
                position: fixed;
                width: 100%;
                background-color: #fff;
                top: 0px;
                left: 0px;
                padding: 15px;
                box-sizing: border-box;
                border-bottom: 1px solid;
                border-top: 1px solid;

            }

            ul.pagination {
                display: flex;
                margin: 0px;
            }

            .box .dvrecords {
                display: block;
                margin-bottom: 10px;
            }

            .pagination>li {
                display: inline-block;
            }

            .container nav {
                z-index: 1;
                width: 50%;

            }
        }

        /* FIN Estilo para tablas y responsive */
        //---------------------------------------------------------------------
    </style>
    <div class="container mt-2">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>Partes Diarios de Capacidades</h2>
                    <form action="" method="GET">
                        @csrf
                        <input type="date" name="fecha" value={{$fecha}} onfocusout="this.form.submit();">
                    </form>
                </div>
            </div>
        </div>
        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif
        <div id="DataTable" class="cuerpo-impresion">
            <div id="table_box_bootstrap"></div>
            <table class="table table-bordered .w-auto">
                <thead>
                    <tr>
                        <th> Destino </th>
                        <th> Población femenina</th>
                        <th> Población masculina</th>
                        <th> Población transgénero</th>

                    </tr>
                </thead>
                <tbody>
                    @if (!is_null($destinos))
                        @foreach ($destinos as $destino)
                            @if ($destino != null)
                                <tr>
                                    <td><strong>{{ $destino->nombre }}</strong></td>
                                    <td>{{ $destino->capacidadActual($fecha) ? $destino->capacidadActual($fecha)->cap_femenina : '-' }}</td>
                                    <td>{{ $destino->capacidadActual($fecha) ? $destino->capacidadActual($fecha)->cap_masculina : '-' }}</td>
                                    <td>{{ $destino->capacidadActual($fecha) ? $destino->capacidadActual($fecha)->cap_trans : '-' }}</td>

                                </tr>
                            @endif
                        @endforeach
                    @endif
                </tbody>
            </table>
            
            <div class="boton-impresion">
                <input type="button" value="Imprimir" alt="Imprima su página" onclick="javascript:window.print()" />
            </div>
            
        </div>
        {!! $destinos->links() !!}
    </div>

@endsection
