@extends('adminlte::page')

@section('title', 'MAKRO | Usuarios')


@section('content_header')
    <x-card-header>
        <h3 class="text-white">Asignar rol a {{ $user->name }}</h3>
    </x-card-header>
@stop


@section('content')

    @include('sweetalert::alert')
    <x-card-body>
        <a href="{{ route('users.index') }}" class="btn bg-navy btn-sm float-right mb-4 px-2 elevation-4"><i
            class="fas fa-reply mt-2 px-3"></i>
    </a>
    <br>
        {!! Form::model($user, ['route' => ['users.update', $user], 'method' => 'PUT']) !!}
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    {!! Form::label('cedula', 'Cedula : ', ['class' => 'text-navy']) !!} <span class="text-danger">*</span>
                    <p type="text" class="form-control" >V-{{$user->cedula}}</p>
                    
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    {!! Form::label('name', 'Nombres : ', ['class' => 'text-navy']) !!} <span class="text-danger">*</span>
                    <p type="text" class="form-control" >{{$user->name}}-{{$user->last_name}}</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    {!! Form::label('name', 'Tienda : ', ['class' => 'text-navy']) !!} <span class="text-danger">*</span>
                    <p type="text" class="form-control" >{{$user?->store?->name}}</p>
                </div>
            </div>
        </div>

        @foreach ($roles as $role)
            <div class="">
                <label>
                    {!! Form::checkbox('roles[]', $role->id, null, ['class' => 'mr-1 iradio_flat']) !!}
                    {{ $role->name }}
                </label>
            </div>
        @endforeach

        {!! Form::submit('Asignar rol', ['class' => 'btn bg-navy float-right mt-2']) !!}
        {!! Form::close() !!}
    </x-card-body>
@stop

@section('css')
    <link rel="stylesheet" href="{{ asset('vendor/icheck/skins/flat/flat.css') }}">
@stop


@section('js')
    <script src=" {{ asset('vendor/jquery/jquery.min.js') }}  "></script>
    <script src=" {{ asset('vendor/icheck/icheck.js') }}  "></script>
    <script>
        $(document).ready(function() {
            $('input').iCheck({
                checkboxClass: 'icheckbox_flat',
                radioClass: 'iradio_flat'
            });
        });
    </script>
@stop
