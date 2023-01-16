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
                    <form method="POST" action="{{ route('aderezo.show') }}"  role="form" enctype="multipart/form-data" id="showPesajes">
                        @foreach($contents as $pesos)
                        @csrf
                        @if($pesos['cdg'] != $cdg)
                            @continue
                        @endif
                        <div class="card">
                            <div class="card-header">
                                <div style="display: flex;">
                                    <span id="card_title">    
                                        <div class="col">
                                            <h3>{{$pesos['fecha']}}</h3><h6>{{$cdg}}</h6>
                                        </div>
                                    </span>
                                </div>
                            </div>

                            @if ($message = Session::get('success'))
                                <div class="alert alert-success">
                                    <p>{{ $message }}</p>
                                </div>
                            @endif
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-hover">
                                        <thead>
                                            <tr>
                                                <th>Descripcion</th>
                                                <th>Cantidad</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            
                                            

                                            <tr>
                                                <td>{{$pesos['desc01']}}</td>
                                                <td>{{$pesos['kilos01']}} kg</td>
                                            </tr>
                                            <tr>
                                                <td>{{$pesos['desc02']}}</td>
                                                <td>{{$pesos['kilos02']}} kg</td>
                                            </tr>
                                            <tr>
                                                <td>{{$pesos['desc03']}}</td>
                                                <td>{{$pesos['kilos03']}} kg</td>
                                            </tr>
                                            <tr>
                                                <td>{{$pesos['desc04']}}</td>
                                                <td>{{$pesos['kilos04']}} kg</td>
                                            </tr>
                                            <tr>
                                                <td>{{$pesos['desc05']}}</td>
                                                <td>{{$pesos['kilos05']}} kg</td>
                                            </tr>
                                            <tr>
                                                <td>{{$pesos['desc06']}}</td>
                                                <td>{{$pesos['kilos06']}} kg</td>
                                            </tr>
                                            <tr>
                                                <td>{{$pesos['desc07']}}</td>
                                                <td>{{$pesos['kilos07']}} kg</td>
                                            </tr>
                                            <tr>
                                                <td>{{$pesos['desc08']}}</td>
                                                <td>{{$pesos['kilos08']}} kg</td>
                                            </tr>
                                            <tr>
                                                <td>{{$pesos['desc09']}}</td>
                                                <td>{{$pesos['kilos09']}} kg</td>
                                            </tr>
                                            <tr>
                                                <td>{{$pesos['desc10']}}</td>
                                                <td>{{$pesos['kilos10']}} kg</td>
                                            </tr>
                                            <tr>
                                                <td>{{$pesos['desc11']}}</td>
                                                <td>{{$pesos['kilos11']}} kg</td>
                                            </tr>
                                            <tr>
                                                <td>{{$pesos['desc12']}}</td>
                                                <td>{{$pesos['kilos12']}} kg</td>
                                            </tr>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
