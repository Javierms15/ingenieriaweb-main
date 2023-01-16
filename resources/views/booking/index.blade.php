@extends('layouts.app')

@section('template_title')
    Booking
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Booking') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('booking.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Create New') }}
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
                                        <th>No</th>
                                        
										<th>Owner</th>
										<th>Advertisement</th>
										<th>Date In</th>
										<th>Date Out</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    
                                    @foreach ($bookings as $booking)
                                        @if(\Auth::user()->id == $booking->user_id)
                                            <tr>
                                                <td>{{ ++$i }}</td>
                                                
                                                <td>{{ $booking->advertisement->user->name }}</td>
                                                <td>{{ $booking->advertisement->address }}</td>
                                                <td>{{ $booking->date_in }}</td>
                                                <td>{{ $booking->date_out }}</td>

                                                <td>
                                                    <form action="{{ route('booking.destroy',$booking->id) }}" method="POST">
                                                        <a class="btn btn-sm btn-primary " href="{{ route('booking.show',$booking->id) }}"><i class="fa fa-fw fa-eye"></i> Show</a>
                                                        <a class="btn btn-sm btn-success" href="{{ route('booking.edit',$booking->id) }}"><i class="fa fa-fw fa-edit"></i> Edit</a>
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> Delete</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endif
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $bookings->links() !!}
            </div>
        </div>
    </div>
@endsection