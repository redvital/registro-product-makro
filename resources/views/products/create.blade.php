@extends('adminlte::page')

@section('title', 'MAKRO | Registrar incidencia')

@section('content_header')
    <x-card-header class="">
        <h3 class="text-white pt-2">Reporte de incidencias</h3>
    </x-card-header>

@stop

@section('content')
    <x-card-body>
        @can('products.index')
            
        <a href="{{ route('products.index') }}" class="btn bg-navy btn-sm float-right mb-4 px-2 elevation-4"><i
            class="fas fa-reply mt-2 px-3"></i>
        </a>
        @endcan
        <br>
        {!! Form::open(['route' => 'products.store','files' => true]) !!}
        @include('products.partials.form')
        {!! Form::submit('Crear registro', ['class' => 'btn bg-navy float-right']) !!}
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


        //cambiar imagen
        document.getElementById("file").addEventListener('change', cambiarImagen);

        function cambiarImagen(event) {
            var file = event.target.files[0];

            var reader = new FileReader();
            reader.onload = (event) => {
                document.getElementById("picture").setAttribute('src', event.target.result);
            }

            reader.readAsDataURL(file);

        }
    </script>


@endsection
