@extends('adminlte::page')

@section('title', 'MAKRO | Lista incidencias por tienda')

@section('content_header')
    <x-card-header class="mt-2">
        <h3 class="text-white pt-2">Incidencias en tienta {{ $store->name }} </h3>
    </x-card-header>
@stop

@section('content')
    @include('sweetalert::alert')
    <x-card-body>
        @livewire('show-incidencestore', ['store' => $store])
    </x-card-body>
@stop

@section('css')

<link rel="stylesheet" href="{{ asset('vendor/select2/select2.min.css') }}">
<link rel="stylesheet" href="{{ asset('vendor/select2/select2-bootstrap4.min.css') }}">
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script src=" {{ asset('vendor/sweetalert2.js') }}  "></script>
    <script src=" {{ asset('vendor/sweetalert-eliminar.js') }} "></script>
    <script src=" {{ asset('vendor/sweetalert-estatus.js') }} "></script>
    <script src=" {{ asset('vendor/sweetalert-estatus2.js') }} "></script>
    <script src=" {{ asset('vendor/popper.min.js') }} "></script>
    <script src="{{ asset('vendor/select2/select2.full.min.js') }}"></script>
    <script>
        $(function() {
            $('[data-toggle="tooltip"]').tooltip()
        });
        $('.select2').select2({
            placeholder: 'Selecciona una opcion'
        });
    </script>

@stop
