@extends('adminlte::page')

@section('title', 'Crear Tienda')

@section('content')

    <x-card-header class="">
        <h3 class="text-white pt-2">Crear nueva Tienda</h3>
    </x-card-header>

    <x-card-body>

        {!! Form::open(['route' => 'stores.store']) !!}
        @include('stores.partials.form')
        {!! Form::submit('Crear Tienda', ['class' => 'btn btn-primary float-right']) !!}
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
