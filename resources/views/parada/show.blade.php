@extends('layouts.app')

@section('template_title')
    {{ $parada->name ?? 'Show Parada' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Parada</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('paradas.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong> Id:</strong>
                            {{ $parada->_id }}
                        </div>
                        <div class="form-group">
                            <strong>Codlinea:</strong>
                            {{ $parada->codLinea }}
                        </div>
                        <div class="form-group">
                            <strong>Nombrelinea:</strong>
                            {{ $parada->nombreLinea }}
                        </div>
                        <div class="form-group">
                            <strong>Sentido:</strong>
                            {{ $parada->sentido }}
                        </div>
                        <div class="form-group">
                            <strong>Orden:</strong>
                            {{ $parada->orden }}
                        </div>
                        <div class="form-group">
                            <strong>Codparada:</strong>
                            {{ $parada->codParada }}
                        </div>
                        <div class="form-group">
                            <strong>Nombreparada:</strong>
                            {{ $parada->nombreParada }}
                        </div>
                        <div class="form-group">
                            <strong>Direccion:</strong>
                            {{ $parada->direccion }}
                        </div>
                        <div class="form-group">
                            <strong>Lon:</strong>
                            {{ $parada->lon }}
                        </div>
                        <div class="form-group">
                            <strong>Lat:</strong>
                            {{ $parada->lat }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
