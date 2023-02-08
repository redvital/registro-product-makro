@extends('adminlte::page')

@section('title', 'MAKRO | Lista Productos')

@section('content_header')

    <x-card-header class="mt-2">
        <h3 class="text-white pt-2">Incidencia</h3>
    </x-card-header>
@stop

@section('content')
    @include('sweetalert::alert')
    <x-card-body>

        <div class="invoice p-3 mb-3" style="border-radius: 0.95rem" bis_skin_checked="1">
            <div class="row invoice-info" style="border-radius: 0.95rem" bis_skin_checked="1">
                <div class="col-md-7">
                    <div class="row" bis_skin_checked="1">
                        <div class="col-12" bis_skin_checked="1">
                            <h4>
                                <small class="float-left">Ingreso:
                                    {{ $product->created_at->toFormattedDateString() }}</small>
                            </h4>

                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-7 invoice-col" bis_skin_checked="1">
                            <h5 class="text-blue h5 text-underline" style="text-decoration: underline;"> <strong>
                                    Datos</strong>
                            </h5>
                            <address>
                                <strong>Producto:</strong> {{ $product->name }}<br>
                                <strong>Usuario :</strong> {{ $product->user->name }}<br>
                                <strong>Tienda:</strong> {{ $product->store->name }}<br>
                            </address>
                        </div>

                        <div class="col-md-5 invoice-col" bis_skin_checked="1">
                            <h5 class="text-blue h5 text-underline" style="text-decoration: underline;"> <strong>
                                    Fechas</strong>
                            </h5>
                            <address>
                                <strong>Se registró :</strong> {{ $product->created_at->toFormattedDateString() }}<br>
                                <strong>Se Actualizó :</strong> {{ $product->updated_at->toFormattedDateString() }}<br>
                            </address>
                        </div>
                    </div>
                    <div class="row invoice-info" style="border-radius: 0.95rem" bis_skin_checked="1">
                        <div class="col-sm-12 invoice-col" bis_skin_checked="1">
                            <h5 class="text-blue h5 text-underline" style="text-decoration: underline;"> <strong>
                                    Comentarios</strong>
                            </h5>
                            <hr>
                            <address>
                            </address>
                        </div>
                    </div>
                </div>


                <div class="col-sm-5 mt-6 invoice-col" bis_skin_checked="1">
                    <div class="view-img">
                        <div class="image image-wrapper">

                            <img class="w-full h-80 object-cover object-center"
                                src="{{ Storage::url($product->image->url) }}" alt="">
                        </div>
                    </div>
                </div>

            </div>


            <hr>


            {{-- <div class="row no-print" bis_skin_checked="1">
                <div class="col-12" bis_skin_checked="1">
                    <a href="invoice-print.html" rel="noopener" target="_blank" class="btn btn-default"><i
                            class="fas fa-print"></i> Print</a>
                    <button type="button" class="btn btn-primary float-right" style="margin-right: 5px;">
                        <i class="fas fa-download"></i> Generar PDF
                    </button>
                </div>
            </div> --}}
        </div>
    </x-card-body>


@stop

@section('css')
    <style>
        .view-img {
            width: 400px;
            height: 250px;
        }

        .image-wrapper {
            position: relative;
            padding-bottom: 56.25%;
        }

        .image-wrapper img {
            position: absolute;
            object-fit: cover;
            width: 100%;
            height: 100%;
        }
    </style>
@endsection
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
