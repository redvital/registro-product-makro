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
        {!! Form::open(['route' => 'products.store', 'files' => true]) !!}
        <hr>

        <div class="row mb-4">
            <div class="col-md-7">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">

                            {!! Form::label('name', 'Nombre del producto : ', ['class' => 'text-navy']) !!} <span class="text-danger">*</span>
                            {!! Form::text('name', null, [
                                'class' => 'form-control',
                                'placeholder' => 'Ingrese el nombre del producto',
                            ]) !!}
                            <input type="hidden" name="slug" id="slug">
                            @error('name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            {!! Form::label('sku', 'SKU del producto : ', ['class' => 'text-navy']) !!} <span class="text-danger">*</span>
                            {!! Form::text('sku', null, [
                                'class' => 'form-control',
                                'placeholder' => 'Ingrese el sku del producto',
                            ]) !!}

                            @error('sku')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            {!! Form::label('phone', 'Telefono : ', ['class' => 'text-navy']) !!} <span class="text-danger">*</span>
                            {!! Form::text('phone', null, [
                                'class' => 'form-control',
                                'placeholder' => 'Ingrese el un numero de telefono',
                            ]) !!}

                            @error('sku')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row">
                    @if (auth()->user()->roles[0]->id == 2)
                        <div class="col-md-12">
                            <div class="form-group">
                                {!! Form::label('store_id', 'Tienda : ', ['class' => 'text-navy']) !!} <span class="text-danger">*</span>
                                <p class="form-control"> {{ auth()->user()->store->name }} </p>
                                <input type="hidden" name="store_id" id="store_id"
                                    value="{{ auth()->user()->store->id }}">

                                {!! $errors->first(
                                    'store_id',
                                    ' <div class="invalid-feedback text-center"><strong>:message</strong>
                                                                                                                                            </div>',
                                ) !!}

                            </div>
                        </div>
                    @endif

                    @if (auth()->user()->roles[0]->id == 1)
                        <div class="col-md-12">
                            <div class="form-group">
                                {!! Form::label('store_id', 'Tienda : ', ['class' => 'text-navy']) !!} <span class="text-danger">*</span>
                                {!! Form::select('store_id', $stores, null, [
                                    'class' => 'form-control select2' . ($errors->has('store_id') ? ' is-invalid' : ''),
                                ]) !!}
                                {!! $errors->first(
                                    'store_id',
                                    ' <div class="invalid-feedback text-center"><strong>:message</strong>
                                                                                                                                            </div>',
                                ) !!}

                            </div>
                        </div>
                    @endif



                    <div class="col-md-12">
                        <div class="form-group">
                            {!! Form::label('category_id', 'Categoria : ', ['class' => 'text-navy']) !!} <span class="text-danger">*</span>
                            {!! Form::select('category_id', $categories, null, [
                                'class' => 'form-control select2' . ($errors->has('category_id') ? ' is-invalid' : ''),
                                'placeholder' => '',
                            ]) !!}
                            {!! $errors->first(
                                'category_id',
                                ' <div class="invalid-feedback text-center">
                                                                                                                                <strong>:message</strong>
                                                                                                                            </div>',
                            ) !!}

                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            {!! Form::label('incidence_id', 'Incidencia : ', ['class' => 'text-navy']) !!} <span class="text-danger">*</span>
                            {!! Form::select('incidence_id', $incidences, null, [
                                'class' => 'form-control select2' . ($errors->has('incidence_id') ? ' is-invalid' : ''),
                                'placeholder' => '',
                            ]) !!}
                            {!! $errors->first(
                                'incidence_id',
                                ' <div class="invalid-feedback text-center">
                                                                                                                                <strong>:message</strong>
                                                                                                                            </div>',
                            ) !!}

                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            {!! Form::label('description', 'Descripción :', ['class' => 'text-navy']) !!}
                            {!! Form::textarea('description', null, [
                                'class' => 'form-control',
                                'rows' => 2,
                                'placeholder' => 'Agregue una descripción',
                            ]) !!}
                            @error('description')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-5">
                <div class="image image-wrapper">
                    @isset($product->image)
                        <img id="picture" class="" src="{{ Storage::url($product?->image?->url) }}" alt=""
                            srcset="">
                    @else
                        <img id="picture" class="" src="https://via.placeholder.com/400x230" alt=""
                            srcset="">
                    @endisset
                </div>
                <div class="form-group">
                    {!! Form::label('file', 'Imagen') !!}
                    {!! Form::file('file', ['class' => 'form-control-file', 'accept' => 'image/*']) !!}
                </div>
                @error('status')
                    <br>
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
        </div>


        {!! Form::submit('Crear registro', ['class' => 'btn bg-navy float-right']) !!}
        {!! Form::close() !!}
    </x-card-body>
@stop
@section('css')
    <style>
        .image-wrapper {
            position: relative;
            padding-bottom: 56.25%;
        }

        .image-wrapper img {
            position: absolute;
            object-fit: cover;
            width: 100%;
            height: 100%;
        }
    </style>
    <link rel="stylesheet" href="{{ asset('vendor/select2/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/select2/select2-bootstrap4.min.css') }}">
@stop
@section('js')
    <script src="{{ asset('vendor/select2/select2.full.min.js') }}"></script>
    <script src="{{ asset('vendor/jQuery-Plugin-stringToSlug-1.3/jquery.stringToSlug.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $("#name").stringToSlug({
                setEvents: 'keyup keydown blur',
                getPut: '#slug',
                space: '-'
            });
        });
        $('.select2').select2({
            placeholder: 'Selecciona una opcion'
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
