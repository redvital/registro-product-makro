<div class="form-group">
    {!! Form::label('name', 'Nombre : ', ['class' => 'text-navy']) !!}
    {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el nombre de la tienda']) !!}
    <input type="hidden" name="slug" id="slug">
    @error('name')
        <span class="text-danger">{{ $message }}</span>
    @enderror
</div>
<div class="form-group">
    {!! Form::label('address', 'Dirección :', ['class' => 'text-navy']) !!}
    {!! Form::text('address', null, ['class' => 'form-control', 'placeholder' => 'Agregue una dirección']) !!}
    @error('address')
        <span class="text-danger">{{ $message }}</span>
    @enderror
</div>