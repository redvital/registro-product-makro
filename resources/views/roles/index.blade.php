@extends('adminlte::page')

@section('title', 'ROLES Y PERMISOS')

@section('content_header')

<x-card-header>
    <h3 class="text-white">Lista de roles y permisos</h3>
</x-card-header>
@stop


@section('content')
    @include('sweetalert::alert')

    
    @livewire('show-roles')
@stop

@section('footer')
    <x-footer></x-footer>
@stop


@section('css')
    <link rel="stylesheet" href="{{ asset('css/sweetalert2.min.css') }}">

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
