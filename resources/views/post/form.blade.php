<div class="box box-info padding-1">
    <div class="box-body">
        <div class="form-group">
            {{ Form::label('comment') }}
            {{ Form::text('comment', $post->comment, ['class' => 'form-control' . ($errors->has('comment') ? ' is-invalid' : ''), 'placeholder' => 'Comment']) }}
            {!! $errors->first('comment', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('user_id') }}
            {{ Form::text('user_id', $post->user_id, ['class' => 'form-control' . ($errors->has('user_id') ? ' is-invalid' : ''), 'placeholder' => 'User Id']) }}
            {!! $errors->first('user_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('advertisement_id') }}
            {{ Form::text('advertisement_id', $post->advertisement_id, ['class' => 'form-control' . ($errors->has('advertisement_id') ? ' is-invalid' : ''), 'placeholder' => 'Advertisement Id']) }}
            {!! $errors->first('advertisement_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>