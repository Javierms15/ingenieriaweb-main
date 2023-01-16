@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('iniciosesion') }}">
                        @csrf
                        <a href="{{ url('auth/google') }}" class="btn btn-lg btn-danger btn-block">  
                            <strong>Login con Google</strong>  
                        </a>  
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
