@extends('adminlte::page')

@section('title', 'Lista Productos')

@section('content_header')

    <x-card-header class="mt-2">
        <h3 class="text-white pt-2">Incidencia</h3>
    </x-card-header>
@stop

@section('content')
    @include('sweetalert::alert')
    <x-card-body>

        <div class="invoice p-3 mb-3" style="border-radius: 0.95rem" bis_skin_checked="1">

            <div class="row" bis_skin_checked="1">
                <div class="col-12" bis_skin_checked="1">
                    <h4>
                        <small class="float-right">Ingreso: {{ $product->created_at->toFormattedDateString() }}</small>
                    </h4>
                </div>

            </div>

            <div class="row invoice-info" style="border-radius: 0.95rem" bis_skin_checked="1">
                <div class="col-sm-4 invoice-col" bis_skin_checked="1">
                    <h5 class="text-blue h5 text-underline" style="text-decoration: underline;"> <strong> Datos</strong>
                    </h5>
                    <address>
                        <strong>Producto:</strong> {{ $product->name }}<br>
                        <strong>Usuario :</strong> {{ $product->user->name }}<br>
                        <strong>Tienda:</strong> {{ $product->store->name }}<br>
                    </address>
                </div>

                <div class="col-sm-4 invoice-col" bis_skin_checked="1">
                    <h5 class="text-blue h5 text-underline" style="text-decoration: underline;"> <strong> Fechas</strong>
                    </h5>
                    <address>
                        <strong>Se registró :</strong> {{ $product->created_at->toFormattedDateString() }}<br>
                        <strong>Se Actualizó :</strong> {{ $product->updated_at->toFormattedDateString() }}<br>
                    </address>
                </div>

                <div class="col-sm-4 invoice-col" bis_skin_checked="1">
                    <h5 class="text-blue h5 text-underline" style="text-decoration: underline;"> <strong> Otros</strong>
                    </h5>
                    <strong>Observación:</strong> {{ $product->observation }}<br>
                </div>

            </div>

            <hr>

            <div class="row no-print" bis_skin_checked="1">
                <div class="col-12" bis_skin_checked="1">
                    <a href="invoice-print.html" rel="noopener" target="_blank" class="btn btn-default"><i
                            class="fas fa-print"></i> Print</a>
                    <button type="button" class="btn btn-primary float-right" style="margin-right: 5px;">
                        <i class="fas fa-download"></i> Generar PDF
                    </button>
                </div>
            </div>
        </div>
    </x-card-body>


@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script src=" {{ asset('vendor/sweetalert2.js') }}  "></script>
    <script src=" {{ asset('vendor/sweetalert-eliminar.js') }} "></script>
    <script src=" {{ asset('vendor/sweetalert-estatus.js') }} "></script>
    <script src=" {{ asset('vendor/sweetalert-estatus2.js') }} "></script>
    <script src=" {{ asset('vendor/popper.min.js') }} "></script>

    <script>
        $(function() {
            $('[data-toggle="tooltip"]').tooltip()
        })
    </script>

@stop
