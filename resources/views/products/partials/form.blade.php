<hr>

<div class="row mb-4">
    <div class="col-md-8">
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    {!! Form::label('name', 'Nombre del producto : ', ['class' => 'text-navy']) !!} <span class="text-danger">*</span>
                    {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el nombre de la categoria']) !!}
                    <input type="hidden" name="slug" id="slug">
                    @error('name')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    {!! Form::label('store_id', 'Tienda : ', ['class' => 'text-navy']) !!} <span class="text-danger">*</span>
                    {!! Form::select('store_id', $stores, null, [
                        'class' => 'form-control select2' . ($errors->has('store_id') ? ' is-invalid' : ''),
                        'placeholder' => '',
                    ]) !!}
                    {!! $errors->first('store_id', ' <div class="invalid-feedback text-center"><strong>:message</strong></div>') !!}

                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    {!! Form::label('category_id', 'Categoria : ', ['class' => 'text-navy']) !!} <span class="text-danger">*</span>
                    {!! Form::select('category_id', $categories, null, [
                        'class' => 'form-control select2' . ($errors->has('category_id') ? ' is-invalid' : ''),
                        'placeholder' => '',
                    ]) !!}
                    {!! $errors->first('category_id', ' <div class="invalid-feedback text-center"><strong>:message</strong></div>') !!}

                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    {!! Form::label('incidence_id', 'Incidencia : ', ['class' => 'text-navy']) !!} <span class="text-danger">*</span>
                    {!! Form::select('incidence_id', $incidences, null, [
                        'class' => 'form-control select2' . ($errors->has('incidence_id') ? ' is-invalid' : ''),
                        'placeholder' => '',
                    ]) !!}
                    {!! $errors->first('incidence_id', ' <div class="invalid-feedback text-center"><strong>:message</strong></div>') !!}

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

    <div class="col-md-4">
        <div class="col">
            <div class="image image-wrapper">
                @isset ($product->image)
                    <img id="picture" class="" src="{{Storage::url($product->image->url)}}" alt="" srcset="">
                @else
                    <img id="picture" class="" src="{{asset("img/nodisponible.jpg")}}" width="300px" alt="" srcset="">
                @endisset
            </div>
            <div class="form-group">
                {!! Form::label('file', 'Imagen') !!}
                {!! Form::file('file', ['class' => 'form-control-file', 'accept' => 'image/*']) !!}
            </div>
            @error('status')
            <br>
            <small class="text-danger">{{$message}}</small>
            @enderror
        </div>
    </div>
</div>









@section('css')
    {{-- <link rel="stylesheet" href="{{asset('vendor/select2/css/bootstrap-select.min.css')}}"> --}}
    <link rel="stylesheet" href="{{ asset('vendor/select2/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/select2/select2-bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/icheck/skins/flat/flat.css') }}">
@stop

@section('js')
    <script src="{{ asset('vendor/jquery/jquery.min.js') }}  "></script>
    <script src="{{ asset('vendor/icheck/icheck.js') }}  "></script>
    <script src="{{ asset('vendor/jQuery-Plugin-stringToSlug-1.3/jquery.stringToSlug.min.js') }}"></script>
    <script src="{{ asset('vendor/select2/select2.full.min.js') }}"></script>
    <script>
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
@stop
