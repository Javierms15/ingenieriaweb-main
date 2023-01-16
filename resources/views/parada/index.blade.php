@extends('layouts.app')

@section('template_title')
    Parada
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <div class="card-body" style="padding:10px">
                            <div id="map" style="width:100%;height:600px;"></div>
                        </div>
                        
                        <nav class="navbar float-right">
                            <div class="container-fluid">
                                <div class="form-group">
                                    <input id="address" type="text" placeholder="Enter address here" size="100">
                                </div>
                                <form class="d-flex" role="search" id="busqueda">
                                    <div>
                                        <input name="latitude" type="hidden" id="latitude" form="busqueda"/>
                                        <input name="longitude" type="hidden" id="longitude" form="busqueda"/>
                                    </div>
                                    <button class="btn btn-outline-success" type="submit" value="1" name="buscarporradio">Buscar en la Zona</button>
                                </form>
                            </div>
                        </nav>
                        <script type="text/javascript">
                            var map;

                            function testConsole(){
                                lat = map.center.lat();
                                lng = map.center.lng();
                                zoom = map.zoom;

                                height = parseInt(document.getElementById('map').style.height, 10);
                                metersPerPx = 156543.03392 * Math.cos(lat * Math.PI / 180) / Math.pow(2, zoom);
                                radius = metersPerPx*height/2;

                                var result;
                                
                                $.ajax({
                                    url: '/AdvertisementMap',
                                    type: 'GET',
                                    data: {
                                        latitude: lat,
                                        longitude: lng,
                                        radius: radius,
                                    },
                                    success: function (data) {
                                        console.log(data);
                                        result = data;
                                    }
                                });
                                console.log(result);
                            }

                            var myVar = setTimeout(testConsole, 2000);


                            function resetTimer(){
                                clearTimeout(myVar);
                                myVar = setTimeout(testConsole, 2000);
                            }

                            function initMap() {
                                var latitude = parseFloat(document.getElementById("latitude").value); // YOUR LATITUDE VALUE
                                var longitude = parseFloat(document.getElementById("longitude").value); // YOUR LONGITUDE VALUE

                                var myLatLng = {
                                    lat: 36.72016,
                                    lng: -4.42034
                                }


                                map = new google.maps.Map(document.getElementById('map'), {
                                    center: myLatLng,
                                    zoom: 14
                                });

                                @if(!empty($paradas) && $ctrl == 0)
                                    @foreach($paradas as $parada)
                                        var marker = new google.maps.Marker({
                                            position: {
                                                lat: {{$parada->lat}},
                                                lng: {{$parada->lon}}
                                            },
                                            map: map,
                                            title: '{{$parada->nombreParada}}',
                                            icon: {
                                                url: "https://maps.google.com/mapfiles/ms/icons/red-dot.png"
                                            }
                                        });
                                    @endforeach
                                    @endif

                                map.addListener('dragend', () => {
                                    resetTimer();
                                });

                                map.addListener('zoom_changed', () => {
                                    resetTimer();
                                });
                                
                                
                            }
                        </script>

                        <!-- Add the this google map apis to webpage -->
                        <script
                            src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false&key=AIzaSyCipl8K3XpcoH8n2fBvGaDUymcjuK6AE2I&libraries=places">
                        </script>

                        <script>
                            google.maps.event.addDomListener(window, 'load', initialize);
                            
                            
                            function initialize() {
                                var input = document.getElementById('address');
                                
                                var geocoder = new google.maps.Geocoder(); // initialize google map object
                                var address = "Madrid, España";
                                geocoder.geocode({'address': address}, function(results, status) {
                                    if (status === 'OK') {
                                        document.getElementById("latitude").value = results[0].geometry['location'].lat();
                                        document.getElementById("longitude").value = results[0].geometry['location'].lng();
                                        initMap();
                                    }
                                })

                                var autocomplete = new google.maps.places.Autocomplete(input);
                                autocomplete.addListener('place_changed', function() {
                                    var place = autocomplete.getPlace();
                                    // place variable will have all the information you are looking for.

                                    document.getElementById("latitude").value = place.geometry['location'].lat();
                                    document.getElementById("longitude").value = place.geometry['location'].lng();
                                    initMap();
                                });
                            }
                        </script>
                    </div>
                </div>
                <div class="card">

                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">
                            
                            <span id="card_title">
                                {{ __('Parada') }}
                            </span>
                            <nav class="navbar float-right">
                                <div class="container-fluid">
                                    <form class="d-flex" role="search">
                                        <input name="buscarpor" class="form-control me-2" type="search" placeholder="Buscar por direccion"  aria-label="Search" id="buscarpor">
                                        <button class="btn btn-outline-success" type="submit">Buscar</button>
                                    </form>
                                </div>
                            </nav>

                             <div class="float-right">
                                <a href="{{ route('paradas.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Buscar Parada') }}
                                </a>
                              </div>
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
                                <thead class="thead">
                                    <tr>
                                        
										<th> Id</th>
										<th>Codlinea</th>
										<th>Nombrelinea</th>
										<th>Sentido</th>
										<th>Orden</th>
										<th>Codparada</th>
										<th>Nombreparada</th>
										<th>Direccion</th>
										<th>Lon</th>
										<th>Lat</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($paradas as $parada)
                                        <tr>
                                            
											<td>{{ $parada->_id }}</td>
											<td>{{ $parada->codLinea }}</td>
											<td>{{ $parada->nombreLinea }}</td>
											<td>{{ $parada->sentido }}</td>
											<td>{{ $parada->orden }}</td>
											<td>{{ $parada->codParada }}</td>
											<td>{{ $parada->nombreParada }}</td>
											<td>{{ $parada->direccion }}</td>
											<td>{{ $parada->lon }}</td>
											<td>{{ $parada->lat }}</td>

                                            <td>
                                                <form action="{{ route('paradas.destroy',$parada->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('paradas.show',$parada->id) }}"><i class="fa fa-fw fa-eye"></i> Show</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('paradas.edit',$parada->id) }}"><i class="fa fa-fw fa-edit"></i> Edit</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
