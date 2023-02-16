@extends('adminlte::page')

@section('title', 'MAKRO | Crear departamento')

@section('content_header')
<x-card-header class="">
    <h3 class="text-white pt-2">Crear nueva departamento</h3>
</x-card-header>
@endsection

@section('content')
    <x-card-body>
        <a href="{{ route('departaments.index') }}" class="btn bg-navy btn-sm float-right mb-4 px-2 elevation-4"><i class="fas fa-reply mt-2 px-3"></i>
        </a>
        <br>
        {!! Form::open(['route' => 'departaments.store']) !!}
        @include('departaments.partials.form')
        {!! Form::submit('Crear departamento', ['class' => 'btn bg-navy float-right']) !!}
        {!! Form::close() !!}
    </x-card-body>
@stop

@section('js')

    <script src="{{ asset('vendor/jQuery-Plugin-stringToSlug-1.3/jquery.stringToSlug.min.js') }}"></script>

    <script>
        $(document).ready(function() {
            $("#name").stringToSlug({
                setEvents: 'keyup keydown blur',
                getPut: '#slug',
                space: '-'
            });
        });
    </script>


@endsection
