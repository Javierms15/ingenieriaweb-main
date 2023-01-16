@extends('layouts.app')

@section('template_title')
    {{ $advertisement->name ?? 'Show Advertisement' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Advertisement</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('advertisement.index') }}"> Back</a>
                        </div>
                    </div>
                </div>
                <br>
                <div class="card">
                    <div class="card">
                        <div class="card-header">
                            {{ ++$i }}
                            <td>{{ $advertisement->address }}</td>
                            <td class="float-right"> - {{ $advertisement->user->name ?? 'Empty' }}</td>
                        </div>
                        <div class="card-body">
                            <img src="{{ $advertisement->images }}" alt="" style="width: 100%;">
                            <ul>
                                <li>{{ $advertisement->capacity }}</li>
                                <li>{{ $advertisement->date }}</li>
                                <li>{{ $advertisement->features }}</li>
                                <li>{{ $advertisement->other }}</li>
                                <li>{{ $advertisement->price }}</li>
                            </ul>
                        </div>
                        <div class="card-footer">
                            <form action="{{ route('advertisement.destroy', $advertisement->id) }}" method="POST">
                                <a class="btn btn-sm btn-primary "
                                    href="{{ route('advertisement.show', $advertisement->id) }}"><i
                                        class="fa fa-fw fa-eye"></i> Show</a>
                                <a class="btn btn-sm btn-success"
                                    href="{{ route('advertisement.edit', $advertisement->id) }}"><i
                                        class="fa fa-fw fa-edit"></i> Edit</a>
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i>
                                    Delete</button>
                            </form>
                            <form action="{{ route('booking.create', $advertisement->id) }}" method="POST">
                                @csrf
                                <input type="hidden" name="id" value="{{ $advertisement->id }}">
                                <button type="submit" class="btn btn-secondary btn-sm"><i class="fa-solid fa-bookmark"></i>
                                    Reservar</button>
                            </form>
                        </div>
                    </div>
                </div>
                <br>
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Bookings</span>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>

                                        <th>User</th>
                                        <th>Date In</th>
                                        <th>Date Out</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($bookings as $booking)
                                        <tr>
                                            <td>{{ ++$i }}</td>

                                            <td>{{ $booking->user->name }}</td>
                                            <td>{{ $booking->date_in }}</td>
                                            <td>{{ $booking->date_out }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
