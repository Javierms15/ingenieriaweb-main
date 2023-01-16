<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('_id') }}
            {{ Form::text('_id', $user->_id, ['class' => 'form-control' . ($errors->has('_id') ? ' is-invalid' : ''), 'placeholder' => ' Id']) }}
            {!! $errors->first('_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('name') }}
            {{ Form::text('name', $user->name, ['class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : ''), 'placeholder' => 'Name']) }}
            {!! $errors->first('name', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('email') }}
            {{ Form::text('email', $user->email, ['class' => 'form-control' . ($errors->has('email') ? ' is-invalid' : ''), 'placeholder' => 'Email']) }}
            {!! $errors->first('email', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('social_id') }}
            {{ Form::text('social_id', $user->social_id, ['class' => 'form-control' . ($errors->has('social_id') ? ' is-invalid' : ''), 'placeholder' => 'Social Id']) }}
            {!! $errors->first('social_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('social_type') }}
            {{ Form::text('social_type', $user->social_type, ['class' => 'form-control' . ($errors->has('social_type') ? ' is-invalid' : ''), 'placeholder' => 'Social Type']) }}
            {!! $errors->first('social_type', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>