@extends('layouts.app')

@section('template_title')
    {{ $post->name ?? 'Show Post' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Post</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('posts.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong> Id:</strong>
                            {{ $post->_id }}
                        </div>
                        <div class="form-group">
                            <strong>Comment:</strong>
                            {{ $post->comment }}
                        </div>
                        <div class="form-group">
                            <strong>User Id:</strong>
                            {{ $post->user_id }}
                        </div>
                        <div class="form-group">
                            <strong>Advertisement Id:</strong>
                            {{ $post->advertisement_id }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
