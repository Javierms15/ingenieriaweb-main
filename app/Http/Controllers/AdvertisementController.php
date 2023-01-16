<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Advertisement;
use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

/**
 * Class AdvertisementController
 * @package App\Http\Controllers
 */
class AdvertisementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $address=$request->get('buscarpor');
        $price=$request->get('buscarporPrecio');
        $capacity=$request->get('buscarporCapacidad');
        if($address!=null & $price==null  & $capacity==null) {
            //$advertisements = Advertisement::direccion($address)->precio($price)->paginate();
            $advertisements = Advertisement::where('address','LIKE',"%{$address}%")->paginate();
        }else if($address==null & $price!=null & $capacity==null) {
            $advertisements = Advertisement::where('price','LIKE',"%{$price}%")->paginate();
        }else if($address==null & $price==null & $capacity!=null) {
            $advertisements = Advertisement::where('capacity','LIKE',"%{$capacity}%")->paginate();
        }else{
            $advertisements= Advertisement::paginate();
            /*$advertisements = DB::connection('mongodb')->collection('adversitements')
            ->join('users', 'advertisements.user_id', '=', 'users._id')
            ->select('advertisements.*','users.name as name')
            ->paginate();*/
        }

        $comments = Post::all();


        return view('advertisement.index', compact('advertisements','comments'))
            ->with('i', (request()->input('page', 1) - 1) * $advertisements->perPage());
    }


    public function rest()
    {
        $anuncios = json_encode(Advertisement::all());
        return  $anuncios;
    }

    public function myadvs()
    {
        $advertisements= Advertisement::paginate();
        $comments = Post::all();
        return view('advertisement.myadvs', compact('advertisements','comments'))
            ->with('i', (request()->input('page', 1) - 1) * $advertisements->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $advertisement = new Advertisement();
        return view('advertisement.create', compact('advertisement'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->user_id = Auth::id();
        request()->validate(Advertisement::$rules);
        $advertisement = Advertisement::create($request->all());
        $advertisement->images = time().'.'.$request->images->getClientOriginalExtension();
        $request->images->move(public_path('images'), $advertisement->images);
        $advertisement->save();

        return redirect()->route('advertisement.index')
            ->with('success', 'Advertisement created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $advertisement = Advertisement::find($id);
        $bookings = Booking::where('advertisement_id','LIKE',"%{$advertisement->id}%")->paginate();

        return view('advertisement.show', compact('advertisement','bookings'))
            ->with('i', (request()->input('page', 1) - 1) * $bookings->perPage());
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $advertisement = Advertisement::find($id);

        return view('advertisement.edit', compact('advertisement'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Advertisement $advertisement
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Advertisement $advertisement)
    {
        request()->validate(Advertisement::$rules);

        $advertisement->update($request->all());
        $advertisement->images = time().'.'.$request->images->getClientOriginalExtension();
        $request->images->move(public_path('images'), $advertisement->images);
        $advertisement->save();

        return redirect()->route('advertisement.myadvs')
            ->with('success', 'Advertisement updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $advertisement = Advertisement::find($id)->delete();

        return redirect()->route('advertisement.myadvs')
            ->with('success', 'Advertisement deleted successfully');
    }
}
