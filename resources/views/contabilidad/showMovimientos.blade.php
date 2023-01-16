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
                    <form method="POST" action="{{ route('contabilidad.showMovimientos') }}"  role="form" enctype="multipart/form-data">
                        @csrf
                        <div class="card">
                            <div class="card-header">
                                <div style="display: flex;">
                                    <span id="card_title">
                                        <h3><strong>{{$concepto}}</strong></h3>
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
                                        @foreach ($contents as $movimiento)
                                            <table>
                                                <tbody>
                                                    <tr>
                                                        <td colspan="2" style="background-color: rgba(0, 0, 0, 0.03); height: 25%;margin: 10px;text-align: center">
                                                            <p><h6><i class="fa-solid fa-calendar-days"></i>   <strong>{{$movimiento['fecha']}}</strong></h6></p>
                                                        </td>
                                                    </tr>
                                                    <tr style="margin-top: 10px;height:6px;">
                                                        <td style="bottom: 0;">
                                                            <strong>Importe</strong>
                                                        </td>
                                                        <td style="bottom: 0;">
                                                            <strong>Saldo</strong>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td style="width: 40%">
                                                            <p><h6>{{$movimiento['importe']}}€</h6></p>
                                                        </td>
                                                        <td style="width: 60%">
                                                            <p><strong><h4 @if($movimiento['saldo']<0) style="color: red;" @elseif($movimiento['saldo']>=0) style="color: green;" @endif>{{$movimiento['saldo']}}€</h4></strong></p>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="2">
                                                            <p><?php echo (($movimiento['concepto']));?></p>
                                                            <hr style="height: 3px;">
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            </form>
                                        @endforeach
                                    @endif
                                </div>
                            </div>
                            <input type="hidden" id="cuenta" name="cuenta" value="{{$cuenta}}"/>
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
