@extends('layouts.app')

@section('template_title')
    Menu
@endsection

@section('content')

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/md-date-time-picker@2.3.0/dist/css/mdDateTimePicker.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-clock-timepicker@2.5.0/jquery-clock-timepicker.min.js"></script>

    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="container">
                    <div class="card">
                        <div class="card-header">
                            <div style="display: flex;">
                                <span id="card_title">
                                    {{ __('Menu') }}
                                </span>
                            </div>
                        </div>

                        @if ($message = Session::get('success'))
                            <div class="alert alert-success">
                                <p>{{ $message }}</p>
                            </div>
                        @endif
                        <div class="container card-body">
                            <div class="nav nav-pills nav-fill flex-column nav-justified mb-3">
                                <img src="" alt="">
                            </div>
                        </div>
                        
                    </div>
                </div>
                <br>
                <div class="container">
                    <div class="card" >
                        <div class="card-header">
                            <div style="display: flex;">
                                <span id="card_title">
                                    {{ __('Noticias') }}
                                </span>
                            </div>
                        </div>
                        <div class="container card-body">
                                <div style="text-align: center">
                                </div>
                                <hr>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
