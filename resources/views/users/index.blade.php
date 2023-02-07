@extends('adminlte::page')

@section('title', 'MAKRO | Usuarios')
@section('content_header')

    <x-card-header class="mt-2">
        <h3 class="text-white pt-2">Lista de Usuarios</h3>
    </x-card-header>
@stop

@section('content')
    @livewire('show-user')
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop