
<div class="form-group">
    {!! Form::label('type', 'Tipo :', ['class' => 'text-navy']) !!}
    {!! Form::text('type', null, ['class' => 'form-control', 'placeholder' => 'Agregue un tipo de incidencia']) !!}
    <input type="hidden" name="slug" id="slug">
    @error('type')
        <span class="text-danger">{{ $message }}</span>
    @enderror
</div>
<div class="form-group">
    {!! Form::label('description', 'Descripción : ', ['class' => 'text-navy']) !!}
    {!! Form::text('description', null, ['class' => 'form-control', 'placeholder' => 'Agregue una descripción']) !!}
    @error('description')
        <span class="text-danger">{{ $message }}</span>
    @enderror
</div>
