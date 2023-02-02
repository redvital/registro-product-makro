<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('store_id', 'Tienda : ', ['class' => 'text-navy']) !!} <span class="text-danger">*</span>
            {!! Form::select('store_id', $stores, null, [
                'class' => 'form-control select2' . ($errors->has('store_id') ? ' is-invalid' : ''),
                'placeholder' => '',
            ]) !!}
            {!! $errors->first('store_id', ' <div class="invalid-feedback text-center"><strong>:message</strong></div>') !!}

        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('user_id', 'Usuario : ', ['class' => 'text-navy']) !!} <span class="text-danger">*</span>
            {!! Form::select('user_id', $users, null, [
                'class' => 'form-control select2' . ($errors->has('user_id') ? ' is-invalid' : ''),
                'placeholder' => '',
            ]) !!}
            {!! $errors->first('user_id', ' <div class="invalid-feedback text-center"><strong>:message</strong></div>') !!}

        </div>
    </div>
</div>