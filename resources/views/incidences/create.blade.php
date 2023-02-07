@extends('adminlte::page')

@section('title', 'MAKRO | Crear Incidencia')
@section('content_header')

<x-card-header class="mt-2">
    <h3 class="text-white pt-2">Crear una incidencias</h3>
</x-card-header>
@stop
@section('content')



    <x-card-body>
        <a href="{{ route('incidences.index') }}" class="btn bg-navy btn-sm float-right mb-4 px-2 elevation-4"><i class="fas fa-reply mt-2 px-3"></i>
        </a>
        <br>
        {!! Form::open(['route' => 'incidences.store']) !!}
        @include('incidences.partials.form')
        {!! Form::submit('Crear Incidencia', ['class' => 'btn bg-navy float-right']) !!}
        {!! Form::close() !!}
    </x-card-body>
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
