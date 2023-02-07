@extends('adminlte::page')

@section('title', 'MAKRO | Crear Tienda')

@section('content_header')
<x-card-header class="">
    <h3 class="text-white pt-2">Crear nueva Tienda</h3>
</x-card-header>
@endsection

@section('content')
    <x-card-body>
        <a href="{{ route('stores.index') }}" class="btn bg-navy btn-sm float-right mb-4 px-2 elevation-4"><i class="fas fa-reply mt-2 px-3"></i>
        </a>
        <br>
        {!! Form::open(['route' => 'stores.store']) !!}
        @include('stores.partials.form')
        {!! Form::submit('Crear Tienda', ['class' => 'btn bg-navy float-right']) !!}
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
