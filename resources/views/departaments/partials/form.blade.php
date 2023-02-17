<div class="form-group">
    {!! Form::label('name', 'Nombre : ', ['class' => 'text-navy']) !!}
    {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el nombre del departamento']) !!}
    <input type="hidden" name="slug" id="slug">
    @error('name')
        <span class="text-danger">{{ $message }}</span>
    @enderror
</div>
<div class="form-group">
    {!! Form::label('description', 'Descripción :', ['class' => 'text-navy']) !!}
    {!! Form::text('description', null, ['class' => 'form-control', 'placeholder' => 'Agregue una descripción']) !!}
    @error('description')
        <span class="text-danger">{{ $message }}</span>
    @enderror
</div>