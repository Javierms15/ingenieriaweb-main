@extends('layouts.app')

@section('template_title')
    Maps
@endsection


@section('content')
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="container">
                        <div class="card">
                            <div class="card-header">
                                <div style="display: flex; justify-content: space-between; align-items: center;">
        
                                    <span id="card_title">
                                        {{ __('Map') }}
                                    </span>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <input id="address" type="text" placeholder="Enter address here" size="100">
                                </div>
                                <div>
                                    <input type="hidden" id="latitude" value="{{$parada->lat}}" readonly />
                                    <input type="hidden" id="longitude" value="{{$parada->lon}}" readonly />
                                </div>
                            </div>
                        </div>
                        <br>

                        <div class="card">
                            <div class="card-body" style="padding:10px">
                                <div id="map" style="width:100%;height:600px;"></div>
                            </div>
                        </div>


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
                                    lat: {{$parada->lat}},
                                    lng: {{$parada->lon}}
                                }


                                map = new google.maps.Map(document.getElementById('map'), {
                                    center: myLatLng,
                                    zoom: 25
                                });


                                const marker = new google.maps.Marker({
                                    position: myLatLng,
                                    map: map,
                                });

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
            </div>
        </div>
    </body>

    </html>
@endsection
