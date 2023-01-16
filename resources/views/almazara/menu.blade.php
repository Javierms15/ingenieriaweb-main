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
                                    @foreach($contents as $ejercicio)
                                    @if ($ejercicio['tkilos'] == 0)
                                            @continue
                                    @endif
                                    
                                    <form method="POST" action="{{ route('almazara.show') }}"  role="form" enctype="multipart/form-data">
                                        @csrf
                                        <input type="hidden" id="ejercicio" name="ejercicio" value="{{$ejercicio['ejercicio']}}"/>
                                        <input type="hidden" id="proveedor" name="proveedor" value="{{$ejercicio['proveedor']}}"/>
                                        <input type="hidden" id="fechaini" name="fechaini" value="{{$ejercicio['fechaini']}}"/>
                                        <input type="hidden" id="fechafin" name="fechafin" value="{{$ejercicio['fechafin']}}"/>
                                        <input type="hidden" id="tkilos" name="tkilos" value="{{$ejercicio['tkilos']}}"/>
                                        <input type="hidden" id="tgrasa" name="tgrasa" value="{{$ejercicio['tgrasa']}}"/>
                                        <input type="hidden" id="offset" name="offset" value="0"/>
                                            <div class="nav nav-pills flex-column nav-justified mb-3" style="border-bottom: 1px solid rgb(0, 0, 0);">
                                                <ul style="list-style-type: none;">
                                                    <li><i class="fa-solid fa-weight-hanging"></i>&nbsp;<strong>Aceituna:</strong> {{$ejercicio['tkilos']}} Kg</li>
                                                    <li><i class="fa-solid fa-droplet"></i>&nbsp;&nbsp;<strong>Aceite:</strong> {{$ejercicio['tgrasa']}} Kg</li>
                                                    <li><i class="fa-solid fa-gears"></i>&nbsp;<strong>Rendimiento medio:</strong> {{number_format(((( $ejercicio['tgrasa'] / $ejercicio['tkilos'])))*100, 2)}}%</li>
                                                </ul>
                                                <div class="nav-item" style="border-radius: 30px;">
                                                    <a class="nav-link nav-justified" style="margin-bottom: 10px;background-color: rgb(94, 168, 94);border-radius: 30px;">
                                                        <button  class="btn" style="background-color:  rgb(94, 168, 94);justify-content:center;">
                                                            <strong style="color: white">Ejercicio {{$ejercicio['ejercicio']}}</strong> 
                                                        </button>
                                                    </a>
                                                </div>
                                            </div>
                                        </li>
                                    </form>
                                    @endforeach
                                </div>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
