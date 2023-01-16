@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <table>
            <tr>
                <th>Nombre</th>
                <th>Posición</th>
                <th>Calle</th>
            </tr>
            @foreach($sortedContent as $lugar)  
            <tr>
                <td>{{ $lugar['name'] }}</td>
                <td>Lat:{{ $lugar['location']['lat'] }}, Long: {{ $lugar['location']['lng'] }}</td>
                <td>{{ $lugar['street'] }}</td>
            </tr>
            @endforeach
        </table>
    </div>
</div>
<style>
    .table, tr, th, td{
        border: 1px solid black;
        border-collapse: collapse;
    }
</style>
@endsection
