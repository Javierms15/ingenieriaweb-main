@extends('layouts.app')

@section('template_title')
    {{ $booking->name ?? 'Show Booking' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Booking</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('booking.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Advertisement Id:</strong>
                            {{ $booking->advertisement->address }}
                        </div>
                        <div class="form-group">
                            <strong>Date In:</strong>
                            {{ $booking->date_in }}
                        </div>
                        <div class="form-group">
                            <strong>Date Out:</strong>
                            {{ $booking->date_out }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
