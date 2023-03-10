@extends('adminlte::page')

@section('title', 'MAKRO | Lista de incidencias reportadas')

@section('content_header')

<x-card-header class="mt-2">
    <h3 class="text-white pt-2">Lista de incidencias reportadas</h3>
</x-card-header>
@stop

@section('content')
    @include('sweetalert::alert')

    @livewire('show-product')

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