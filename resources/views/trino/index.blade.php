@extends('layouts.app')

@section('template_title')
    Trino
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Trino') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('trinos.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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
                                        
										<th> Id</th>
										<th>Autor</th>
										<th>Post</th>
										<th>Lat</th>
										<th>Long</th>
										<th>Stamp</th>
										<th>Reports</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($trinos as $trino)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $trino->_id }}</td>
											<td>{{ $trino->autor }}</td>
											<td>{{ $trino->post }}</td>
											<td>{{ $trino->lat }}</td>
											<td>{{ $trino->long }}</td>
											<td>{{ $trino->stamp }}</td>
											<td>{{ $trino->reports }}</td>

                                            <td>
                                                <form action="{{ route('trinos.destroy',$trino->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('trinos.show',$trino->id) }}"><i class="fa fa-fw fa-eye"></i> Show</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('trinos.edit',$trino->id) }}"><i class="fa fa-fw fa-edit"></i> Edit</a>
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
                {!! $trinos->links() !!}
            </div>
        </div>
    </div>
@endsection
