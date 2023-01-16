@extends('layouts.app')

@section('template_title')
    Advertisement
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="container">
                    <div class="card">
                        <div class="card-header">
                            <nav class="navbar float-right">
                                <div class="container-fluid">
                                    <form class="d-flex" role="search">
                                        <input name="buscarpor" class="form-control me-2" type="search" placeholder="Buscar por dirección"  aria-label="Search" id="buscarpor">
                                        <input name="buscarporPrecio" class="form-control me-2" type="search" placeholder="Buscar por precio" aria-label="Search" id="buscarporPrecio">
                                        <input name="buscarporCapacidad" class="form-control me-2" type="search" placeholder="Buscar por capacidad" aria-label="Search" id="buscarporCapacidad">
                                        <button class="btn btn-outline-success" type="submit">Buscar</button>
                                    </form>
                                </div>
                            </nav>
                            <div class="float-left">
                                <a href="{{ route('advertisement.create') }}" class="btn btn-primary btn-sm float-left"  data-placement="left">
                                    {{ __('Nuevo Anuncio') }}
                                </a>
                            </div>
                        </div>
                        @if ($message = Session::get('success'))
                            <div class="card-body">
                                    <div class="alert alert-success">
                                        <p>{{ $message }}</p>
                                    </div>
                            </div>
                        @endif
                    </div>
                    <br>
                    @foreach ($advertisements as $advertisement)
                    @if(\Auth::user()->id != $advertisement->user->id)
                        <div class="card">
                            <div class="card-header">
                                {{ ++$i }}
                                <td>{{ $advertisement->address }}</td>
                                <td class="float-right">   -    {{ $advertisement->user->name ?? 'Empty'}}</td>
                            </div>
                            <div class="card-body">
                                @if(substr($advertisement->images, 0, 4) == "http")
                                    <img src="{{ $advertisement->images }}" alt="" style="width: 100%;">
                                @else
                                    <img src="/images/{{ $advertisement->images}}" alt="" style="width: 100%;">
                                @endif
                                <ul>
                                    <li>{{ $advertisement->capacity }}</li>
                                    <li>{{ $advertisement->date }}</li>
                                    <li>{{ $advertisement->features }}</li>
                                    <li>{{ $advertisement->other }}</li>
                                    <li>{{ $advertisement->price }}</li>
                                    
                                </ul>
                            </div>
                            <div class="card-footer">
                                <form action="{{ route('booking.create',$advertisement->id) }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="id" value="{{$advertisement->id}}">
                                    <button type="submit" class="btn btn-secondary"><i class="fa-solid fa-bookmark"></i> Reservar</button>
                                </form>
                            </div>
                        </div>
                        <br>
                        <div class="container">
                            <div class="card">
                                <div class="card-header">
                                    Comments
                                </div>
                                <div class="card-body">
                                    @if(!empty($comments))
                                        @foreach($comments as $comment)
                                            @if($comment->advertisement_id == $advertisement->id)
                                            <label for="comment">{{$comment->user->name}}</label>
                                                <p id="comment">
                                                    <ul>
                                                        <li>{{$comment->comment}}</li>
                                                    </ul>
                                                    @if($comment->user_id == \Auth::user()->id)
                                                        <form action="{{ route('posts.destroy',$comment->id) }}" method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> Delete</button>
                                                        </form>
                                                    @endif
                                                </p>
                                            @endif
                                            <br>
                                        @endforeach
                                    @endif
                                </div>
                                <div class="card-footer">
                                    <form action="{{ route('posts.store') }}" method="POST" >
                                        @csrf
                                        <input type="text" name="comment" id="" placeholder="Leave a comment..." size="100%">
                                        <button type="submit" class="btn btn-success" name="advertisement" value="{{$advertisement->id}}">Send</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endif
                    <br><br>
                    @endforeach
                </div>
                {!! $advertisements->links() !!}
            </div>
        </div>
    </div>
@endsection
