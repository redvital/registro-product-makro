@extends('adminlte::page')

@section('title', 'MAKRO | SESIONES')
@section('content_header')
    <x-card-header>
        <h3 class="text-white">Lista de sesiones</h3>
    </x-card-header>
@stop
@section('content')
    @include('sweetalert::alert')
    <div class="container">
        @livewire('show-login-sistema')
    </div>
@stop

@section('footer')
    <x-footer></x-footer>
@stop
