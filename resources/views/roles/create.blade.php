@extends('adminlte::page')

@section('title', 'CREAR NUEVO ROL')
@section('content_header')
    <x-card-header>
        <h3 class="text-white">Registrar nuevo rol</h3>
    </x-card-header>

@stop

@section('content')
    @include('sweetalert::alert')

    <x-card-body>
        {!! Form::open(['route' => 'roles.store']) !!}
        @include('roles.partials.form')
        {!! Form::submit('CREAR ROL', ['class' => 'btn btn-block bg-navy btn-sm px-3 py-2 elevation-4']) !!}
        {!! Form::close() !!}
    </x-card-body>
@stop
@section('footer')
    <x-footer></x-footer>
@stop