@extends('layouts.app')

@section('template_title')
    {{ $like->name ?? 'Show Like' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Like</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('likes.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
