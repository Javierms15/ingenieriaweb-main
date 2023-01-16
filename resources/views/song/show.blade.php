@extends('layouts.app')

@section('template_title')
    {{ $song->name ?? 'Show Song' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Song</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('songs.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong> Id:</strong>
                            {{ $song->_id }}
                        </div>
                        <div class="form-group">
                            <strong>Decade:</strong>
                            {{ $song->decade }}
                        </div>
                        <div class="form-group">
                            <strong>Artist:</strong>
                            {{ $song->artist }}
                        </div>
                        <div class="form-group">
                            <strong>Song:</strong>
                            {{ $song->song }}
                        </div>
                        <div class="form-group">
                            <strong>Weeksatone:</strong>
                            {{ $song->weeksAtOne }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
