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
                    <form method="POST" action="{{ route('almazara.show') }}"  role="form" enctype="multipart/form-data">
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
                            <div class="card-body">
                                <h5 class="card-title">{{$fechaini}} al {{$fechafin}}</h5>
                                <h6 class="card-subtitle mb-2 text-muted">
                                    <ul>
                                        <li>Total Kilos: {{$tkilos}} Kg</li>
                                        <li>Total Grasa: {{$tgrasa}} Kg</li>
                                    </ul>
                                </h6>
                                <div class="table-responsive">
                                    <table class="table table-striped table-hover">
                                        <tbody>
                                            @if(!empty($contents))
                                                @foreach ($contents as $pesaje)
                                                <tr>
                                                    <td>
                                                        <p><strong>Codigo:</strong> {{$pesaje['cdg']}}</p>
                                                        <p><strong>Fecha:</strong> {{$pesaje['fecha']}}</p>
                                                        <p></p>
                                                        <strong>Rendimiento:</strong> {{$pesaje['rto']}}%
                                                    </td>
                                                    <td>
                                                        <strong>Kilos:</strong> {{$pesaje['kilos']}} kg<br>
                                                        <strong>Grasa:</strong> {{$pesaje['grasa']}} kg<br>
                                                        <strong>Acidez:</strong> {{$pesaje['acidez']}}%
                                                    </td>
                                                </tr>
                                                @endforeach
                                            @endif
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <input type="hidden" id="ejercicio" name="ejercicio" value="{{$ejercicio}}"/>
                            <input type="hidden" id="proveedor" name="proveedor" value="{{$proveedor}}"/>
                            <input type="hidden" id="fechaini" name="fechaini" value="{{$fechaini}}"/>
                            <input type="hidden" id="fechafin" name="fechafin" value="{{$fechafin}}"/>
                            <input type="hidden" id="tkilos" name="tkilos" value="{{$tkilos}}"/>
                            <input type="hidden" id="tgrasa" name="tgrasa" value="{{$tgrasa}}"/>
                            <div class="card-footer">
                                <button name="offset" value="{{$offset-1}}" class="btn btn-secondary" <?php if($offset==0) echo 'disabled'; ?>>Anterior</button>
                                <button name="offset" value="{{$offset+1}}" class="btn btn-secondary" <?php if($fin==1) echo 'disabled'; ?>>Siguiente</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
