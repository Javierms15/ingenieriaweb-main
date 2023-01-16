@extends('layouts.app')

@section('template_title')
    Create Parada
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Create Parada</span>
                    </div>
                    <div class="card-body">
                        <form method="GET" action="{{ route('paradas.index') }}"  role="search" enctype="multipart/form-data">
                            @csrf
                            <div class="box box-info padding-1">
                                <div class="box-body">
                                    <div class="form-group">
                                        {{ Form::label('codLinea') }}
                                        {{ Form::text('codLinea', $parada->codLinea, ['class' => 'form-control' . ($errors->has('codLinea') ? ' is-invalid' : ''), 'placeholder' => 'Codlinea']) }}
                                        {!! $errors->first('codLinea', '<div class="invalid-feedback">:message</div>') !!}
                                    </div>
                                    
                                    <div class="form-group">
                                        {{ Form::label('sentido') }}
                                        {{ Form::text('sentido', $parada->sentido, ['class' => 'form-control' . ($errors->has('sentido') ? ' is-invalid' : ''), 'placeholder' => 'Sentido']) }}
                                        {!! $errors->first('sentido', '<div class="invalid-feedback">:message</div>') !!}
                                    </div>
                                    
                                </div>
                                <div class="box-footer mt20">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
