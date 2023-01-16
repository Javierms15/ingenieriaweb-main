<!DOCTYPE html>
<html lang="es">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Styles -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: DejaVu Sans;
        }
    </style>
</head>
<style>
    .s1 {
        font-family: serif;
        font-weight: normal;
        font-size: 12pt;
        margin-left: 15px;
    }

    .s2 {
        font-family: serif;
        font-weight: normal;
        font-size: 15pt;
    }

    .s3 {
        font-family: serif;
        font-weight: normal;
        font-size: 9pt;
    }

    .s4 {
        font-family: serif;
        font-weight: normal;
        font-size: 12pt;
    }

    .s5 {
        font-family: serif;
        font-weight: normal;
        font-size: 8pt;
    }
    .s6 {
        font-family: serif;
        font-weight: normal;
        font-size: 9pt;
        text-align: right;
    }
    .s7 {
        font-family: serif;
        font-weight: normal;
        font-size: 8pt;
        text-align: right;
    }

    .t1 {
        width: 100%;
    }

    .t2 {
        width: 100%;
        height: 14pt;
    }

    .th1 {
        font-family: serif;
        font-weight: normal;
        font-size: 8pt;
    }

    .th2 {
        font-family: serif;
        font-weight: normal;
        margin-left: 10px;
    }

    .th3 {
        font-family: serif;
        font-weight: normal;
        font-size: 8pt;
        text-align: right;
    }

    .tr1 {
        font-family: serif;
        font-weight: normal;
        font-size: 10pt;
        height: 14pt;
        margin: 20px;
    }
</style>

<body>
  <div class="container-flex">
              <div class="row mb-4 flex-column text-center">
                  <table class="t1" style="height: 150px">
                      <thead>
                          <tr>
                              <th style="text-align: center;font-size: 20px;">Algodoliva S.C.A</th>
                              <th style="text-align: center">FACTURA</th>
                          </tr>
                      </thead>
                      <tbody>
                          <tr>
                              <td style="width: 50%;text-align: center;">
                                  <div class="s3">NIF: F91953976</div>
                                  <div class="s3">Avda Don Manuel Pimentel, s/n</div>
                                  <div class="s3">Algodonales</div>
                                  <div class="s3">CP: 11680 CADIZ</div>
                                  <div class="s3">Tlfn; 956137156 E-mail: xxxxx@yyyy.</div>
                              </td>
                              <td style="width: 50%;text-align: start;margin: 15px;">
                                  <div class="border border-success p-2 mb-2">
                                      <div class="s3">
                                          <strong>{{ $contents[0]['descripcion'] }}</strong>
                                      </div class="s3">
                                      <div class="s3">{{ $contents[0]['direccion'] }}</div>
                                      <div class="s3">{{ $contents[0]['poblacion'] }}</div>
                                      <div class="s3">{{ $contents[0]['provincia'] }} CP:
                                          {{ $contents[0]['codpostal'] }}</div>
                                      <div class="s3">NIF: {{ $contents[0]['nif'] }}</div>
                                  </div>
                              </td>
                          </tr>
                      </tbody>
                  </table>
                  <table class="border border-success p-2 mb-2 t1" >
                      <thead>
                          <tr class="tr1">
                              <th style="width: 10px;"></th>
                              <th class="th2" style="margin-right: 30px;"><strong>Fecha</strong></th>
                              <th class="th2"><strong>Nº Factura</strong></th>
                              <th class="th2"><strong>Cliente</strong></th>
                              <th class="th2"><strong>Dto1</strong></th>
                              <th class="th2"><strong>Dto2</strong></th>
                              <th class="th2"><strong>Página</strong></th>
                          </tr>
                      </thead>
                      <tbody>
                          <tr class="tr1" style="margin-right: 30px;">
                              <td></td>
                              <td style="margin-right: 30px;">{{ $contents[0]['fechafacvtcb'] }}</td>
                              <td>{{ $contents[0]['cdgfacvtcb'] }}</td>
                              <td>{{ $contents[0]['cliente'] }}</td>
                              <td>{{ $contents[0]['dto'] }}</td>
                              <td>{{ $contents[0]['dto2'] }}</td>
                              <td>1 de 1</td>
                          </tr>
                          <tr>
                            <td></td>
                            <td colspan="6"  class="th2" style="margin-right: 30px;">Dirección Envio: {{ $contents[0]['clidir'] }}</td>
                            <td colspan="2"  class="th2" style="margin-right: 30px;">@if($contents[0]['matricula'] != " ") Matricula: {{ $contents[0]['matricula'] }} @endif</td>
                          </tr>
                      </tbody>
                  </table>
                  <table class="t1" style="height: 610px; background-image: url(https://algodoliva.es/wp-content/uploads/2019/10/algodologomasclaro.png); background-repeat: no-repeat; background-attachment: fixed; background-size: 50% 20%;background-position: center;opacity:0.1;">
                      <thead>
                          <tr>
                              <th class="th1" style="width: 10%;"><strong>Referencia</strong></th>
                              <th class="th1" style="width: 50%;"><strong>Descripcion</strong></th>
                              <th class="th3" style="width: 5%;"><strong>Cant.</strong></th>
                              <th class="th3" style="width: 10%;"><strong>Precio</strong></th>
                              <th class="th3" style="width: 5%;"><strong>Dto.</strong></th>
                              <th class="th3" style="width: 10%;"><strong>Importe</strong></th>
                          </tr>
                      </thead>
                      <tbody class="s3" style="">
                          <tr>
                              <td></td>
                          </tr>
                          <?php
                          foreach ($contents[0]['albvtcb'] as $albvtcb) {
                              echo " <tr>
                                                    <td></td>
                                                    <td class=\"center s5\"> <strong>Albaran: ";
                              echo print_r($albvtcb['cdgalbvtcb']);
                              echo ' ';
                              echo print_r($albvtcb['fechaalbvtcb']);
                              echo ' ';
                              if (!empty($albvtcb['suref'])) {
                                  echo print_r($albvtcb['suref']);
                              }
                              echo "</strong></td>
                                                  <tr>
                                                ";
                              foreach ($albvtcb['albvtln'] as $albvtln) {
                                  echo "<tr><td class=\"center s5\" style=\"width: 10%;\" > " . $albvtln['articulo'] .
                                      "</td><td class=\"center s5\" style=\"width: 50%;\" > " . $albvtln['detalle1'] . $albvtln['detalle2'] . $albvtln['descripcion'] .
                                      "</td><td class=\"center s7\" style=\"width: 5%;\" > " . $albvtln['cantidad'] .
                                      "</td><td class=\"center s7\" style=\"width: 10%;\" > " . $albvtln['precio'] .
                                      "</td><td class=\"center s7\" style=\"width: 5%;\" > " . $albvtln['dtoalbvtln'] .
                                      "</td><td class=\"center s7\" style=\"width: 5%;text-align: right;margin-right: 20px; \" > " . $albvtln['importe'] .
                                      "</td><tr>";
                              }
                          }
                          ?>
                      </tbody>
                  </table>
                  <table class="t1"  style="height: 60px">
                    <tbody>
                      <tr>
                        <td style="width: 60%">
                          <table class="t1 border border-success p-2 mb-2" >
                            <thead>
                              <tr>
                                <th style="width: 10px;"></th>
                                <th class="s5" style="padding-right:10px;">  Base Imponible</th>
                                <th class="s5">% IVA</th>
                                <th class="s5">Cuota IVA</th>
                                <th class="s5">% REC</th>
                                <th class="s5">Cuota REC</th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr>
                                <td></td>
                                <td class="s5">{{$contents[0]['base1'] ?? 0}}</td>
                                <td class="s5">{{$contents[0]['porciva1'] ?? 0}}</td>
                                <td class="s5">{{$contents[0]['cuotaiva1'] ?? 0}}</td>
                                <td class="s5">{{$contents[0]['porcre1'] ?? 0}}</td>
                                <td class="s5">{{$contents[0]['cuotarec1'] ?? 0}}</td>
                              </tr>
                              <tr>
                                <td></td>
                                <td class="s5">{{$contents[0]['base2'] ?? ' '}}</td>
                                <td class="s5">{{$contents[0]['porciva2'] ?? ' '}}</td>
                                <td class="s5">{{$contents[0]['cuotaiva2'] ?? ' '}}</td>
                                <td class="s5">{{$contents[0]['porcre2'] ?? ' '}}</td>
                                <td class="s5">{{$contents[0]['cuotarec2'] ?? ' '}}</td>
                              </tr>
                              <tr>
                                <td></td>
                                <td class="s5">{{$contents[0]['base3'] ?? ' '}}</td>
                                <td class="s5">{{$contents[0]['porciva3'] ?? ' '}}</td>
                                <td class="s5">{{$contents[0]['cuotaiva3'] ?? ' '}}</td>
                                <td class="s5">{{$contents[0]['porcre3'] ?? ' '}}</td>
                                <td class="s5">{{$contents[0]['cuotarec3'] ?? ' '}}</td>
                              </tr>
                            </tbody>
                          </table>
                        </td>
                        <td style="width: 40%;">
                          <table class="t1 border border-success p-2 mb-2">
                            <thead>
                              <tr>
                                <th style="width: 10px;"></th>
                                <th class="s6">%</th>
                                <th class="s6">Retencion</th>
                                <th class="s6"><strong>TOTAL FACTURA</strong></th>
                                <th style="width: 10px;"></th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr>
                                <td></td>
                                <td class="s6">{{$contents[0]['retencion'] ?? 0}}</td>
                                <td class="s6">{{$contents[0]['impretencion'] ?? 0}}</td>
                                <td class="s6">{{$contents[0]['totalfra']}} €</td>
                                <td></td>
                              </tr>
                            </tbody>
                          </table>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                  <table class="t1"  style="height: 55px">
                    <tbody>
                      <tr>
                        <td class="s3">F. Pago: {{$contents[0]['fpago']}}</td>
                        <td class="s3" >{{$contents[0]['banco']}}</td>
                        <td class="s3" colspan="4">{{$contents[0]['ccc']}}</td>
                      </tr>
                      <tr>
                        <td class="s5">Vencimientos: {{$contents[0]['numvtos']}}</td>
                        <td class="s5">Plazo al primer vencimiento: {{$contents[0]['diaspri']}} dias</td>
                        <td class="s5" colspan="4">Plazo entre Vencimientos: {{$contents[0]['plazo']}} dias</td>
                      </tr>
                      <tr>
                          <?php
                          foreach ($contents[0]['vtos'] as $vtos) {
                                  echo "<td class=\"center s5\" style=\"max-width: 12.5%;\" > " . $vtos['fechavto'] . ": " . $vtos['impvto'] .
                                      "</td>";
                          }
                          ?>
                      </tr>
                    </tbody>
                  </table>
              </div>
  </div>
</body>

</html>
