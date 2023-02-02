@extends('adminlte::page')

@section('title', 'Lista Tiendas')

@section('content_header')
    <x-card-header class="mt-2">
        <h3 class="text-white pt-2">Incidencias en tienta {{$store->name}} </h3>
    </x-card-header>
@stop

@section('content')
    @include('sweetalert::alert')


    <x-card-body>
        
        <a href="{{ route('stores.index') }}" class="btn bg-navy btn-sm float-right mb-4 px-2 elevation-4"><i
            class="fas fa-reply mt-2 px-3"></i>
    </a>
        @livewire('show-incidencestore', ['store' => $store])
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
