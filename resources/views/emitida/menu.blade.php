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
                    <form method="POST" action="{{ route('emitida.show') }}"  role="form" enctype="multipart/form-data">
                        @csrf
                        <div class="card">
                            <div class="card-header">
                                <div style="display: flex;">
                                    <span id="card_title">
                                        <h3><strong>Mis Facturas Emitidas</strong></h3>
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
                                    @if(!empty($contents))
                                        @foreach ($contents as $factura)
                                            <table>
                                                <tbody>
                                                    <tr style="line-height: 60px;">
                                                        <td style="background-color: rgba(0, 0, 0, 0.03);margin: 10px;text-align: center;">
                                                            <i class="fa-solid fa-calendar-days"></i> <strong style="text-align: center">{{$factura['fechafaccpcb']}}</strong>
                                                        </td>
                                                        <td style="background-color: rgba(0, 0, 0, 0.03);margin: 10px;text-align: center;">
                                                            <i class="fa-solid fa-file-invoice"></i> <strong style="text-align: end"><?php echo (($factura['cdgfaccpcb']));?></strong>
                                                        </td>
                                                    </tr>
                                                    <tr style="margin-top: 10px;height:6px;">
                                                        <td style="text-align: center;">
                                                            <strong>Total Factura</strong>
                                                        </td>
                                                        <td style="text-align: center;">
                                                            <p><h2><strong>{{$factura['totalfra']}}€</strong></h2></p>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="2">
                                                            <div class="nav-item">
                                                                <form method="POST" action="{{ route('emitida.showFactura') }}"  role="form" enctype="multipart/form-data" id="showFactura">
                                                                    @csrf
                                                                    <a class="nav-link active" style="margin-bottom: 10px;background-color: rgb(94, 168, 94);border-radius: 30px;">
                                                                        <button id="codigo" name="codigo"  form="showFactura" class="btn btn-sm" style="background-color:  rgb(94, 168, 94);" value="{{$factura['cdgfaccpcb']}}">
                                                                            <i class="fa-solid fa-file-pdf"></i>   <strong style="color: white">Ver Factura</strong> 
                                                                        </button>
                                                                    </a>
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
