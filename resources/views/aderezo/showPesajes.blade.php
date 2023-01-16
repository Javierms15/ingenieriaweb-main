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
                        @csrf
                        <div class="card">
                            <div class="card-header">
                                <div style="display: flex;">
                                    <span id="card_title">
                                        <h3>Campaña <strong>{{$ejercicio}}</strong></h3>
                                    </span>
                                </div>
                            </div>

                            @if ($message = Session::get('success'))
                                <div class="alert alert-success">
                                    <p>{{ $message }}</p>
                                </div>
                            @endif
                            
                            <div class="container card-body">
                                <h3 class="card-subtitle mb-2 text-muted">
                                    Total Neto: {{$contents[0]['totalneto']}} Kg
                                </h3>
                                <div class="nav nav-pills nav-fill flex-column nav-justified mb-3">
                                    @if(!empty($contents))
                                        @foreach ($contents as $pesaje)
                                            <table>
                                                <tbody>
                                                    <tr style="line-height: 60px;">
                                                        <td style="background-color: rgba(0, 0, 0, 0.03);margin: 10px;text-align: center;">
                                                            <i class="fa-solid fa-calendar-days"></i> <strong style="text-align: center">{{$pesaje['fecha']}}</strong>
                                                        </td>
                                                        <td style="background-color: rgba(0, 0, 0, 0.03);margin: 10px;text-align: center;">
                                                            <i class="fa-solid fa-file-invoice"></i> <strong style="text-align: end"><?php echo (($pesaje['cdg']));?></strong>
                                                        </td>
                                                    </tr>
                                                    <tr style="margin-top: 10px;height:6px;">
                                                        <td style="text-align: center;">
                                                            <strong>Neto</strong>
                                                        </td>
                                                        <td style="text-align: center;">
                                                            <p><h2><strong>{{$pesaje['neto']}} kg</strong></h2></p>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="2">
                                                            <div class="nav-item nav-justified">
                                                                <form method="POST" action="{{ route('aderezo.showPesos') }}"  role="form" enctype="multipart/form-data" id="showPesos">
                                                                    @csrf
                                                                    <a class="nav-link active" style="margin-bottom: 10px;background-color: rgb(94, 168, 94);border-radius: 30px;align-items: center">
                                                                        <button   form="showPesos" class="btn btn-sm" style="background-color:  rgb(94, 168, 94);" id="codigo" name="codigo" value="{{$pesaje['cdg']}}">
                                                                            <i class="fa-solid fa-weight-hanging"></i> <strong style="color: white;text-align: center;">Pesos por Tamaños</strong>
                                                                        </button>
                                                                    </a>
                                                                    <input type="hidden" id="empaderezo" name="empaderezo" value="{{$empaderezo}}"/>
                                                                    <input type="hidden" id="offset" name="offset" value="{{$offset}}"/>
                                                                </form>
                                                                <hr style="height: 3px;">
                                                            </div>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        @endforeach
                                    @endif
                                </div>
                            </div>
                            <input type="hidden" id="empaderezo" name="empaderezo" value="{{$empaderezo}}"/>
                            <input type="hidden" id="offset" name="offset" value="{{$offset}}"/>
                            <input type="hidden" id="ejercicio" name="ejercicio" value="{{$ejercicio}}"/>
                            <div class="card-footer">
                                <button form="showPesajes" name="offset" value="{{$offset-1}}" class="btn btn-secondary" <?php if($offset==0) echo 'disabled'; ?>>Anterior</button>
                                <button form="showPesajes" name="offset" value="{{$offset+1}}" class="btn btn-secondary" <?php if($fin==1) echo 'disabled'; ?>>Siguiente</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
