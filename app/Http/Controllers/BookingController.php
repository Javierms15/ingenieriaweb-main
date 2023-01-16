<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;

/**
 * Class BookingController
 * @package App\Http\Controllers
 */
class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bookings = Booking::paginate();

        return view('booking.index', compact('bookings'))
            ->with('i', (request()->input('page', 1) - 1) * $bookings->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $booking = new Booking();
        $user_id = User::find(Auth::id())->id;
        $advertisement_id = $request->id;
        return view('booking.create', compact('booking','user_id','advertisement_id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Booking::$rules);

        $booking = Booking::create($request->all());

        //return redirect()->route('booking.index')->with('success', 'Booking created successfully.');
         return view('pagar');

    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $booking = Booking::find($id);
        return view('booking.show', compact('booking'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $booking = Booking::find($id);
        $user_id = User::find(Auth::id())->id;
        $advertisement_id = $booking->advertisement_id;
        return view('booking.edit', compact('booking','user_id','advertisement_id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Booking $booking
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Booking $booking)
    {
        request()->validate(Booking::$rules);

        $booking->update($request->all());

        return redirect()->route('booking.index')
            ->with('success', 'Booking updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $booking = Booking::find($id)->delete();

        return redirect()->route('booking.index')
            ->with('success', 'Booking deleted successfully');
    }
}
