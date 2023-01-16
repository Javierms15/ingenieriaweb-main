@extends('layouts.app')

@section('template_title')
    {{ $trino->name ?? 'Show Trino' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Trino</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('trinos.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong> Id:</strong>
                            {{ $trino->_id }}
                        </div>
                        <div class="form-group">
                            <strong>Autor:</strong>
                            {{ $trino->autor }}
                        </div>
                        <div class="form-group">
                            <strong>Post:</strong>
                            {{ $trino->post }}
                        </div>
                        <div class="form-group">
                            <strong>Lat:</strong>
                            {{ $trino->lat }}
                        </div>
                        <div class="form-group">
                            <strong>Long:</strong>
                            {{ $trino->long }}
                        </div>
                        <div class="form-group">
                            <strong>Stamp:</strong>
                            {{ $trino->stamp }}
                        </div>
                        <div class="form-group">
                            <strong>Reports:</strong>
                            {{ $trino->reports }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
