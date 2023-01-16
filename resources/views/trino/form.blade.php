<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('_id') }}
            {{ Form::text('_id', $trino->_id, ['class' => 'form-control' . ($errors->has('_id') ? ' is-invalid' : ''), 'placeholder' => ' Id']) }}
            {!! $errors->first('_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('autor') }}
            {{ Form::text('autor', $trino->autor, ['class' => 'form-control' . ($errors->has('autor') ? ' is-invalid' : ''), 'placeholder' => 'Autor']) }}
            {!! $errors->first('autor', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('post') }}
            {{ Form::text('post', $trino->post, ['class' => 'form-control' . ($errors->has('post') ? ' is-invalid' : ''), 'placeholder' => 'Post']) }}
            {!! $errors->first('post', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('lat') }}
            {{ Form::text('lat', $trino->lat, ['class' => 'form-control' . ($errors->has('lat') ? ' is-invalid' : ''), 'placeholder' => 'Lat']) }}
            {!! $errors->first('lat', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('long') }}
            {{ Form::text('long', $trino->long, ['class' => 'form-control' . ($errors->has('long') ? ' is-invalid' : ''), 'placeholder' => 'Long']) }}
            {!! $errors->first('long', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('stamp') }}
            {{ Form::text('stamp', $trino->stamp, ['class' => 'form-control' . ($errors->has('stamp') ? ' is-invalid' : ''), 'placeholder' => 'Stamp']) }}
            {!! $errors->first('stamp', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('reports') }}
            {{ Form::text('reports', $trino->reports, ['class' => 'form-control' . ($errors->has('reports') ? ' is-invalid' : ''), 'placeholder' => 'Reports']) }}
            {!! $errors->first('reports', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>