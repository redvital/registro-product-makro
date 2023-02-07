@extends('adminlte::page')

@section('title', 'MAKRO | Editar Categoria')

@section('content_header')

<x-card-header class="mt-2">
    <h3 class="text-white pt-2">Editar Categorias</h3>
</x-card-header>
@stop

@section('content')
    <x-card-body>
        <a href="{{ route('categories.index') }}" class="btn bg-navy btn-sm float-right mb-4 px-2 elevation-4"><i class="fas fa-reply mt-2 px-3"></i>
        </a>
        <br>
        {!! Form::model($category, ['route' => ['categories.update', $category], 'method' => 'PUT']) !!}
        @include('categories.partials.form')
        {!! Form::submit('Actualizar Categoria', ['class' => 'btn bg-navy float-right']) !!}
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
            $("#name").stringToSlug({
                setEvents: 'keyup keydown blur',
                getPut: '#slug',
                space: '-'
            });
        });
    </script>


@endsection
