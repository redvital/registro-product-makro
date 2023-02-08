@extends('adminlte::page')

@section('title', 'MAKRO | RESPALDOS')
@section('content_header')
<div class="mb-1">

</div>
@stop

@section('content')

    <x-card-body>
        <livewire:laravel_backup_panel::app />
    </x-card-body>
@stop

@section('footer')
    <x-footer></x-footer>
@stop

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/backup/toastify.min.css') }}">
    <link href="{{ asset('vendor/laravel_backup_panel/bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/laravel_backup_panel/app.css') }}" rel="stylesheet">
@stop

@section('js')
<script src="{{ asset('vendor/sweetalert2.js') }}  "></script>
<script src="{{ asset('vendor/backup/jquery-3.5.1.slim.min.js') }}"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="{{ asset('vendor/backup/bootstrap.bundle.min.js') }}"
        integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous">
    </script>
    <script type="text/javascript" src="{{ asset('vendor/backup/toastify-js.js') }}"></script>

@stop
