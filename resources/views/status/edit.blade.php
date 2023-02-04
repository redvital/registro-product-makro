@extends('adminlte::page')

@section('title', 'Editar Estatus')

@section('content_header')

<x-card-header class="mt-2">
    <h3 class="text-white pt-2">Editar Estatus</h3>
</x-card-header>
@stop
@section('content')
    <x-card-body>
        <a href="{{ route('status.index') }}" class="btn bg-navy btn-sm float-right mb-4 px-2 elevation-4"><i class="fas fa-reply mt-2 px-3"></i>
        </a>
        <br>
        {!! Form::model($status, ['route' => ['status.update', $status], 'method' => 'PUT']) !!}
        @include('status.partials.form')
        {!! Form::submit('Actualizar Estatus', ['class' => 'btn bg-navy float-right']) !!}
        {!! Form::close() !!}
    </x-card-body>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')

    <script src="{{ asset('vendor/jQuery-Plugin-stringToSlug-1.3/jquery.stringToSlug.min.js') }}"></script>

    <script>
        $(document).ready(function() {
            $("#type").stringToSlug({
                setEvents: 'keyup keydown blur',
                getPut: '#slug',
                space: '-'
            });
        });
    </script>


@endsection
