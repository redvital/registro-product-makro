@extends('adminlte::page')

@section('title', 'MAKRO | Editar incidencia')

@section('content_header')

    <x-card-header class="mt-2">
        <h3 class="text-white pt-2">Editar incidencia</h3>
    </x-card-header>
@stop

@section('content')
    <x-card-body>
        <a href="{{ route('products.index') }}" class="btn bg-navy btn-sm float-right mb-4 px-2 elevation-4"><i
                class="fas fa-reply mt-2 px-3"></i>
        </a>
        <br>
        {!! Form::model($product, ['route' => ['products.update', $product],'files' => true, 'method' => 'PUT','autocomplete' => 'off']) !!}
        
        <div class="col-md-8">
            <div class="form-group">
                {!! Form::label('status_id', 'Estatus : ', ['class' => 'text-navy']) !!} <span
                    class="text-danger">*</span>
                {!! Form::select('status_id', $status, null, [
                'class' => 'form-control select2' . ($errors->has('status_id') ? ' is-invalid' : ''),
                'placeholder' => ''
                ]) !!}
                {!! $errors->first('status_id', ' <div class="invalid-feedback text-center">
                    <strong>:message</strong>
                </div>') !!}

            </div>
        </div>
        {!! Form::submit('Actualizar Registro', ['class' => 'btn bg-navy float-right']) !!}
        {!! Form::close() !!}
    </x-card-body>
@stop
