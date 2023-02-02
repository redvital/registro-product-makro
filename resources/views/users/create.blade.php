@extends('adminlte::page')

@section('title', 'CREAR NUEVO USUARIO')
@section('content_header')
    <x-card-header>
        <h3 class="text-white">Registrar nuevo usuario</h3>
    </x-card-header>
@stop
@section('content')
    @include('sweetalert::alert')


    <x-card-body>
        <a href=" {{ route('users.index') }} " class="float-right btn bg-navy btn-sm px-3 py-2 elevation-4"><i
                class="fas fa-reply"></i> Volver </a>
        {!! Form::open(['route' => 'users.store', 'autocomplete' => 'off', 'files' => true]) !!}
        @include('users.partials.form')
        {!! Form::submit('Guardar usuario', ['class' => 'btn bg-navy btn-block']) !!}

        {!! Form::close() !!}
    </x-card-body>
@stop

@section('footer')
    <x-footer></x-footer>

@stop
