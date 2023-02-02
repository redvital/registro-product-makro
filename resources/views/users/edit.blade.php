@extends('adminlte::page')

@section('title', 'EDITAR USUARIO')
@section('content_header')
<x-card-header>
    <h3 class="text-white">Editar datos de {{ $user->name }} {{ $user->last_name }}</h3>
</x-card-header>
@endsection

@section('content')
    @include('sweetalert::alert')

    <x-card-body>
        <a href=" {{ route('users.index') }} "
            class="float-right btn bg-navy btn-sm px-3 py-2 elevation-4"><i class="fas fa-reply"></i>
            Volver</a>
        {!! Form::model($user, ['route' => ['users.update', $user], 'method' => 'PUT', 'autocomplete' => 'off']) !!}
        @include('users.partials.form')
        {!! Form::submit('Guardar usuario', ['class' => 'btn bg-navy btn-block']) !!}

        {!! Form::close() !!}
    </x-card-body>
@stop

@section('footer')
<x-footer></x-footer>
@stop

@section('js')
    {{-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script> --}}

    <script>
        Livewire.on('alert', function($message) {
            Swal.fire(
                'Buen Trabajo!',
                $message,
                'success'
            )
        })
    </script>
@stop
