@extends('layouts.app')

@section('template_title')
    {{ $publicacion->name ?? 'Show Publicacion' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Publicacion</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('publicacions.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong> Id:</strong>
                            {{ $publicacion->_id }}
                        </div>
                        <div class="form-group">
                            <strong>Like:</strong>
                            {{ $publicacion->like }}
                        </div>
                        <div class="form-group">
                            <strong>Descripcion:</strong>
                            {{ $publicacion->descripcion }}
                        </div>
                        <div class="form-group">
                            <strong>Url:</strong>
                            {{ $publicacion->url }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
