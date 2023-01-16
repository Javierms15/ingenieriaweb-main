@extends('layouts.app')

@section('template_title')
    Publicacion
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                    <nav class="navbar float-right">
                                <div class="container-fluid">
                                    <form class="d-flex" role="search">
                                        <input name="filtro" class="form-control me-2" type="search" placeholder="Buscar por descripcion"  aria-label="Search" id="filtro">
                                        <button class="btn btn-outline-success" type="submit">Buscar</button>
                                    </form>
                                </div>
                            </nav>
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Publicacion') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('publicacions.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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
                                        <th>Image</th>
										<th> Id</th>
										<th>Like</th>
										<th>Descripcion</th>
										<th>User</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($publicacions as $publicacion)
                                        
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            <td><img src="/images/{{ $publicacion->url}}" alt="" style="width: 100%;"></td>

											<td>{{ $publicacion->_id }}</td>
											<td>{{ $publicacion->like }}</td>
											<td>{{ $publicacion->descripcion }}</td>
                                            <td>{{ $publicacion->user->name }}</td>

                                            @if (Auth::user()->id == $publicacion->user_id)
                                                <td>
                                                    <form action="{{ route('publicacions.destroy',$publicacion->id) }}" method="POST">
                                                        <a class="btn btn-sm btn-primary " href="{{ route('publicacions.show',$publicacion->id) }}"><i class="fa fa-fw fa-eye"></i> Show</a>
                                                        <a class="btn btn-sm btn-success" href="{{ route('publicacions.edit',$publicacion->id) }}"><i class="fa fa-fw fa-edit"></i> Edit</a>
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> Delete</button>
                                                    </form>
                                                </td>
                                            @else
                                                @foreach ($likes as $like)
                                                    @if ($like->user_id == Auth::user()->id && $like->publicacion_id == $publicacion->id)
                                                        @php
                                                            $aux = true;
                                                        @endphp
                                                    @endif
                                                @endforeach
                                                @if (!$aux)
                                                    <td>
                                                        <form action="{{ route('likes.store',$publicacion->id) }}" method="POST">
                                                            @csrf
                                                            <button type="submit" name="publicacion_id" value="{{$publicacion->id}}" class="btn btn-sm btn-primary"><i class="fa fa-fw fa-trash"></i> Like</button>
                                                        </form>
                                                    </td>
                                                @else
                                                <td>
                                                    <form action="{{ route('likes.destroy',$publicacion->id) }}" method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> Disike</button>
                                                    </form>
                                                </td>
                                                @endif
                                            @endif
                                        </tr>
                                        @php
                                            $aux=false;
                                        @endphp
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $publicacions->links() !!}
            </div>
        </div>
    </div>
@endsection
