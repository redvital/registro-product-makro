<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Incidencias Makro</title>
    <link rel="stylesheet" href="{{ asset('css/redvital.css') }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('vendor/select2/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/select2/select2-bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/icheck/skins/flat/flat.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

</head>

<body>
    <div class="container5" id="container">
        <!-- sign in page -->
        <div class="form-container sign-in-container">
            <form method="POST" action="{{ route('register') }}" class="form2">
                {{-- <form method="POST" action="" class="form2" id="login"> --}}
                @csrf
                <div class="logo_login"><img src="img/loo3.png" width="620px" alt=""></div>

                <div class="row">
                    <div class="col-md-6">
                        {!! Form::label('name', 'Nombres : ', ['class' => '']) !!}
                        {!! Form::text('name', null, ['class' => 'form-control']) !!}
                        <input type="hidden" name="slug" id="slug">
                        @error('name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            {!! Form::label('name', 'Apellidos : ', ['class' => '']) !!}
                            {!! Form::text('last_name', null, [
                                'class' => 'form-control',
                            ]) !!}
                            @error('last_name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        {!! Form::label('cedula', 'Cedula : ', ['class' => '']) !!}
                        {!! Form::text('cedula', null, ['class' => 'form-control']) !!}
                        @error('cedula')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        {!! Form::label('email', 'Correo : ', ['class' => '']) !!}
                        {!! Form::text('email', null, ['class' => 'form-control']) !!}
                        @error('email')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <br>
                    <div class="col-md-6">
                        {!! Form::label('store_id', 'Tienda : ', ['class' => '']) !!}
                        <select class="form-control  selectpicker select2" required name="store_id" id="store_id"
                            data-live-search="true">
                            <option value="">Seleccione una opci??n</option>
                            @foreach ($stores as $store)
                                <option value="{{ $store->id }}">{{ $store->name }}</option>
                            @endforeach
                        </select>
                        @error('store_id')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                        {!! $errors->first('store_id', ' <div class="invalid-feedback text-center"><strong>:message</strong></div>') !!}

                    </div>
                    <div class="col-md-6">
                        {!! Form::label('departament_id', 'Departamento : ', ['class' => '']) !!}
                        <select class="form-control  selectpicker select2" required name="departament_id"
                            id="departament_id" data-live-search="true">
                            <option value="">Seleccione una opci??n</option>
                            @foreach ($departaments as $departament)
                                <option value="{{ $departament->id }}">{{ $departament->name }}</option>
                            @endforeach
                        </select>
                        @error('departament_id')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                        {!! $errors->first(
                            'departament_id',
                            ' <div class="invalid-feedback text-center"><strong>:message</strong></div>',
                        ) !!}

                    </div>
                    <br>
                    <div class="col-md-6">

                        <x-jet-label for="password" value="{{ __('Password :') }}" />
                        <x-jet-input id="password" class="block form-control mt-1 w-full" type="password"
                            name="password" required autocomplete="new-password" />
                    </div>
                    <div class="col-md-6">
                        <x-jet-label for="password_confirmation" value="{{ __('Confirm Password :') }}" />
                        <x-jet-input id="password_confirmation" class="block form-control mt-1 w-full" type="password"
                            name="password_confirmation" required autocomplete="new-password" />
                    </div>
                </div>
                <br>
                <button type="submit">Registrarme</button>
                <a href="/login" class="form__button">Iniciar sesi??n</a>

            </form>

        </div>
    </div>
    <!--  create account page -->
    <div class="overlay-container">
        <div class="overlay">
            <div class="overlay-panel overlay-left">
                <h1>Welcome Back!</h1>
                <p>Please login with your personal info</p>
                <button class="ghost" id="signIn">Sign In</button>
            </div>
            <div class="overlay-panel overlay-right">
                <h1>Bienvenido</h1>
                <p>Amigo Proveedor</p>
                <div class="logo_login"><img src="img/Makro_logo.svg.png" width="220px" alt=""></div>
            </div>
        </div>
    </div>

    <script src="js/login.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
    <script src="{{ asset('vendor/jquery/jquery.min.js') }}  "></script>

    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
    <script src="{{ asset('vendor/jQuery-Plugin-stringToSlug-1.3/jquery.stringToSlug.min.js') }}"></script>
    <script src="{{ asset('vendor/select2/select2.full.min.js') }}"></script>

    <script>
        const queryString = window.location.search;
        if (queryString != "") {
            //?c=401
            const eCode = parseInt(queryString.replace("?c=", ""));
            if (eCode == 401) {
                document.getElementById("idMensaje").style.display = "block";
            }
        }
        $(document).ready(function() {
            $('input').iCheck({
                checkboxClass: 'icheckbox_flat',
                radioClass: 'iradio_flat'
            });
        });

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
</body>
