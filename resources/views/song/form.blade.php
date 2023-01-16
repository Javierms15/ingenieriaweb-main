<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('_id') }}
            {{ Form::text('_id', $song->_id, ['class' => 'form-control' . ($errors->has('_id') ? ' is-invalid' : ''), 'placeholder' => ' Id']) }}
            {!! $errors->first('_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('decade') }}
            {{ Form::text('decade', $song->decade, ['class' => 'form-control' . ($errors->has('decade') ? ' is-invalid' : ''), 'placeholder' => 'Decade']) }}
            {!! $errors->first('decade', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('artist') }}
            {{ Form::text('artist', $song->artist, ['class' => 'form-control' . ($errors->has('artist') ? ' is-invalid' : ''), 'placeholder' => 'Artist']) }}
            {!! $errors->first('artist', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('song') }}
            {{ Form::text('song', $song->song, ['class' => 'form-control' . ($errors->has('song') ? ' is-invalid' : ''), 'placeholder' => 'Song']) }}
            {!! $errors->first('song', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('weeksAtOne') }}
            {{ Form::text('weeksAtOne', $song->weeksAtOne, ['class' => 'form-control' . ($errors->has('weeksAtOne') ? ' is-invalid' : ''), 'placeholder' => 'Weeksatone']) }}
            {!! $errors->first('weeksAtOne', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>