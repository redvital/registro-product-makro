<a href=" {{ route('roles.index') }} " class="float-right btn bg-navy btn-sm px-3 py-2 elevation-4"><i
        class="fas fa-reply"></i> Volver</a>
<p class="h3 text-blue">Rol</p>
<hr>
<div class="col-md-12">
    <div class="form-group">
        {!! Form::label('name', 'Nombre : ', ['class' => 'text-blue']) !!} <span class="text-danger">*</span>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-clipboard-list text-blue"></i></span>
            </div>
            {{ Form::text('name', null, ['class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : ''), 'placeholder' => 'Nombre']) }}
            {!! $errors->first('name', ' <div class="invalid-feedback text-center"><strong>:message</strong></div>') !!}

        </div>
    </div>
</div>
<h2 class="h4 text-center font-weight-bold text-secondary">Lista de permisos</h2>



@section('css')
    <link rel="stylesheet" href="{{ asset('vendor/icheck/skins/flat/flat.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/icheck/skins/flat/_all.css') }}">
@stop

@section('js')
    <script src=" {{ asset('vendor/jquery/jquery.min.js') }}  "></script>
    <script src=" {{ asset('vendor/icheck/icheck.js') }}  "></script>
    <script src=" {{ asset('vendor/adminlte/dist/js/demo.js') }}  "></script>
    <script src="{{ asset('vendor/jQuery-Plugin-stringToSlug-1.3/jquery.stringToSlug.min.js') }}"></script>

    <script>
        $(document).ready(function() {
            $('input').iCheck({
                checkboxClass: 'icheckbox_flat',
                radioClass: 'iradio_flat'
            });
        });
        $(document).ready(function() {
            $('input').iCheck({
                checkboxClass: 'icheckbox_flat-blue',
                radioClass: 'iradio_flat'
            });
        });
    </script>
@endsection
