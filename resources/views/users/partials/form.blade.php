<p class="h3 text-blue">Información Personal</p>
<hr>
<div class="row">
    <div class="col-md-4">
        <div class="form-group">
            {!! Form::label('name', 'Nombres  ', ['class' => 'text-blue']) !!}  <span class="text-danger">*</span>
            <div class="input-group mb-3">
                {{ Form::text('name', null, ['class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : ''), 'placeholder' => 'Nombre']) }}
                {!! $errors->first('name', ' <div class="invalid-feedback text-center"><strong>:message</strong></div>') !!}
                
                <input type="hidden" name="slug" id="slug">

            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            {!! Form::label('last_name', 'Apellidos : ', ['class' => 'text-blue']) !!} <span class="text-danger">*</span>
            <div class="input-group mb-3">
                {!! Form::text('last_name', null, ['class' => 'form-control' . ($errors->has('last_name') ? ' is-invalid' : ''), 'placeholder' => 'Apellidos']) !!}
                {!! $errors->first('last_name', ' <div class="invalid-feedback text-center"><strong>:message</strong></div>') !!}

            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            {!! Form::label('cedula', 'Cedula : ', ['class' => 'text-blue']) !!} <span class="text-danger">*</span>
            <div class="input-group mb-3">
                {!! Form::text('cedula', null, ['class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : ''), 'placeholder' => 'Cedula']) !!}
                {!! $errors->first('cedula', ' <div class="invalid-feedback text-center"><strong>:message</strong></div>') !!}
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-4">
        <div class="form-group">
            {!! Form::label('email', 'Correo eléctronico : ', ['class' => 'text-blue']) !!} <span class="text-danger">*</span>
            <div class="input-group mb-3">
                {!! Form::email('email', null, ['class' => 'form-control' . ($errors->has('email') ? ' is-invalid' : ''), 'placeholder' => 'Correo electronico']) !!}
                {!! $errors->first('email', ' <div class="invalid-feedback text-center"><strong>:message</strong></div>') !!}
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            {!! Form::label('password', 'Contraseña : ', ['class' => 'text-blue']) !!}<span class="text-danger">*</span>
            <div class="input-group mb-3">
                {!! Form::password('password', ['class' => 'form-control' . ($errors->has('password') ? ' is-invalid' : ''), 'placeholder' => 'Contraseña']) !!}
                {!! $errors->first('password', ' <div class="invalid-feedback text-center"><strong>:message</strong></div>') !!}
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            {!! Form::label('password_confirmation', 'Contraseña : ', ['class' => 'text-blue']) !!}<span class="text-danger">*</span>
            <div class="input-group mb-3">
                {!! Form::password('password_confirmation', ['class' => 'form-control' . ($errors->has('password') ? ' is-invalid' : ''), 'placeholder' => 'Contraseña']) !!}
                {!! $errors->first('password', ' <div class="invalid-feedback text-center"><strong>:message</strong></div>') !!}

            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            {!! Form::label('store_id', 'Tienda : ', ['class' => 'text-navy']) !!} <span class="text-danger">*</span>
            {!! Form::select('store_id', $stores, null, [
                'class' => 'form-control select2' . ($errors->has('store_id') ? ' is-invalid' : ''),
                'placeholder' => '',
            ]) !!}
            {!! $errors->first('store_id', ' <div class="invalid-feedback text-center"><strong>:message</strong></div>') !!}

        </div>
    </div>
</div>
<br>
<p class="h3 text-blue">Roles</p>
<hr>
<div class="row">
    <div class="col-md-12 d-flex">
        @foreach ($roles as $role)
            <div class="px-2 mb-4">
                <label class="text-blue">
                    {!! Form::checkbox('roles[]', $role->id, null, ['class' => 'mr-1 iradio_flat d-flex']) !!}
                    {{ $role->name }}
                </label>
            </div>
        @endforeach
    </div>
</div>

@section('css')
    {{-- <link rel="stylesheet" href="{{asset('vendor/select2/css/bootstrap-select.min.css')}}"> --}}
    <link rel="stylesheet" href="{{ asset('vendor/select2/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/select2/select2-bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/icheck/skins/flat/flat.css') }}">
@stop


@section('js')
    <script src=" {{ asset('vendor/jquery/jquery.min.js') }}  "></script>
    <script src=" {{ asset('vendor/icheck/icheck.js') }}  "></script>
    <script src=" {{ asset('vendor/adminlte/dist/js/demo.js') }}  "></script>
    <script src="{{ asset('vendor/jQuery-Plugin-stringToSlug-1.3/jquery.stringToSlug.min.js') }}"></script>
    <script src="{{ asset('vendor/select2/select2.full.min.js') }}"></script>
    <script src="{{ asset('vendor/jQuery-Plugin-stringToSlug-1.3/jquery.stringToSlug.min.js') }}"></script>

    <script>
        $(document).ready(function() {
            $('input').iCheck({
                checkboxClass: 'icheckbox_flat',
                radioClass: 'iradio_flat'
            });
        });
    </script>



    <script>
        $('.select2').select2({
            placeholder: 'Selecciona una opcion'
        });

        $(document).ready(function() {
            $("#name").stringToSlug({
                setEvents: 'keyup keydown blur',
                getPut: '#slug',
                space: '-'
            });
        });
    </script>
@stop
