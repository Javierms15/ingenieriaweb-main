<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('_id') }}
            {{ Form::text('_id', $parada->_id, ['class' => 'form-control' . ($errors->has('_id') ? ' is-invalid' : ''), 'placeholder' => ' Id']) }}
            {!! $errors->first('_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('codLinea') }}
            {{ Form::text('codLinea', $parada->codLinea, ['class' => 'form-control' . ($errors->has('codLinea') ? ' is-invalid' : ''), 'placeholder' => 'Codlinea']) }}
            {!! $errors->first('codLinea', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('nombreLinea') }}
            {{ Form::text('nombreLinea', $parada->nombreLinea, ['class' => 'form-control' . ($errors->has('nombreLinea') ? ' is-invalid' : ''), 'placeholder' => 'Nombrelinea']) }}
            {!! $errors->first('nombreLinea', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('sentido') }}
            {{ Form::text('sentido', $parada->sentido, ['class' => 'form-control' . ($errors->has('sentido') ? ' is-invalid' : ''), 'placeholder' => 'Sentido']) }}
            {!! $errors->first('sentido', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('orden') }}
            {{ Form::text('orden', $parada->orden, ['class' => 'form-control' . ($errors->has('orden') ? ' is-invalid' : ''), 'placeholder' => 'Orden']) }}
            {!! $errors->first('orden', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('codParada') }}
            {{ Form::text('codParada', $parada->codParada, ['class' => 'form-control' . ($errors->has('codParada') ? ' is-invalid' : ''), 'placeholder' => 'Codparada']) }}
            {!! $errors->first('codParada', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('nombreParada') }}
            {{ Form::text('nombreParada', $parada->nombreParada, ['class' => 'form-control' . ($errors->has('nombreParada') ? ' is-invalid' : ''), 'placeholder' => 'Nombreparada']) }}
            {!! $errors->first('nombreParada', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('direccion') }}
            {{ Form::text('direccion', $parada->direccion, ['class' => 'form-control' . ($errors->has('direccion') ? ' is-invalid' : ''), 'placeholder' => 'Direccion']) }}
            {!! $errors->first('direccion', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('lon') }}
            {{ Form::text('lon', $parada->lon, ['class' => 'form-control' . ($errors->has('lon') ? ' is-invalid' : ''), 'placeholder' => 'Lon']) }}
            {!! $errors->first('lon', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('lat') }}
            {{ Form::text('lat', $parada->lat, ['class' => 'form-control' . ($errors->has('lat') ? ' is-invalid' : ''), 'placeholder' => 'Lat']) }}
            {!! $errors->first('lat', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>