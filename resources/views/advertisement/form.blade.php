<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('address') }}
            {{ Form::text('address', $advertisement->address, ['class' => 'form-control' . ($errors->has('address') ? ' is-invalid' : ''), 'placeholder' => 'Address']) }}
            {!! $errors->first('address', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('capacity') }}
            {{ Form::text('capacity', $advertisement->capacity, ['class' => 'form-control' . ($errors->has('capacity') ? ' is-invalid' : ''), 'placeholder' => 'Capacity']) }}
            {!! $errors->first('capacity', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('date') }}
            {{ Form::date('date', $advertisement->date, ['class' => 'form-control' . ($errors->has('date') ? ' is-invalid' : ''), 'placeholder' => 'Date']) }}
            {!! $errors->first('date', '<div class="invalid-feedback">:message</div>') !!}
        </div>

        <div class="form-group">
            {{ Form::label('features') }}
            {{ Form::text('features', $advertisement->features, ['class' => 'form-control' . ($errors->has('features') ? ' is-invalid' : ''), 'placeholder' => 'Features']) }}
            {!! $errors->first('features', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('other') }}
            {{ Form::text('other', $advertisement->other, ['class' => 'form-control' . ($errors->has('other') ? ' is-invalid' : ''), 'placeholder' => 'Other']) }}
            {!! $errors->first('other', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('price') }}
            {{ Form::text('price', $advertisement->price, ['class' => 'form-control' . ($errors->has('price') ? ' is-invalid' : ''), 'placeholder' => 'Price']) }}
            {!! $errors->first('price', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('failed_at') }}
            {{ Form::text('failed_at', $advertisement->failed_at, ['class' => 'form-control' . ($errors->has('failed_at') ? ' is-invalid' : ''), 'placeholder' => 'Failed At']) }}
            {!! $errors->first('failed_at', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <input type="hidden" name="user_id" value="{{ Auth::id() }}">
        <input type="file" name="images" placeholder="Choose image" id="image">

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>