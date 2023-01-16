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
                                    {{ __('Aderezo') }}
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
                                @foreach($contents as $ejercicio)                                
                                <form method="POST" action="{{ route('aderezo.show') }}"  role="form" enctype="multipart/form-data">
                                    @csrf
                                    <div class="nav-item">
                                        <a class="nav-link active" style="margin-bottom: 10px;background-color: rgb(94, 168, 94);border-radius: 30px;">
                                            <button  class="btn" style="background-color: rgb(94, 168, 94);">
                                                <strong style="color: white">Ejercicio {{$ejercicio['ejercicio']}}</strong> 
                                            </button>
                                        </a>
                                    </div>
                                    <input type="hidden" id="empaderezo" name="empaderezo" value="{{$ejercicio['empaderezo']}}"/>
                                    <input type="hidden" id="offset" name="offset" value="0"/>
                                    <input type="hidden" id="ejercicio" name="ejercicio" value="{{$ejercicio['ejercicio']}}"/>
                                </form>
                                @endforeach
                            </div>
                        </div>
                </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
