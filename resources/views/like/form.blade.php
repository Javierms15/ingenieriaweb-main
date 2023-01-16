<div class="box box-info padding-1">
    <div class="box-body">
    <input type="hidden" name="user_id" value="{{ Auth::id() }}">
    <input type="hidden" name="publicacion_id" value="{{$like->publicacion_id}}" >
    <div class="form-group">
        {{ Form::label('Usuario') }}
        {{ Form::select('user_id', $usuarios, ['class' => 'form-control' . ($errors->has('user_id') ? ' is-invalid' : ''), 'placeholder' => 'Name']) }}
        {!! $errors->first('user_id', '<div class="invalid-feedback">:message</div>') !!}
    </div>
    <div class="form-group">
        {{ Form::label('Publicacion') }}
        {{ Form::select('publicacion_id', $publicaciones, ['class' => 'form-control' . ($errors->has('publicacion_id') ? ' is-invalid' : ''), 'placeholder' => 'Descripcion']) }}
        {!! $errors->first('publicacion_id', '<div class="invalid-feedback">:message</div>') !!}
    </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>