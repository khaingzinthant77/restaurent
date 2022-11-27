<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $reservations = new Reservation();
        $count = $reservations->get()->count();

        $reservations = $reservations->orderBy('created_at', 'desc')->paginate(10);

        return view('admin.reservation.index', compact('count', 'reservations'))->with('i', (request()->input('page', 1) - 1) * 10);

        return view('admin.reservation.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.reservation.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $reservation = Reservation::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'phone_no'=>$request->phone,
            'num_of_guest'=>$request->number_guests,
            'date'=>date('Y-m-d',strtotime($request->date)),
            'time'=>$request->time,
            'message'=>$request->message
        ]);


        return redirect()->route('reservations.index')->with('success','Success');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $reservation = Reservation::find($id);
        return view('admin.reservation.show',compact('reservation'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $reservation = Reservation::find($id);
        return view('admin.reservation.edit',compact('reservation'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $reservation = Reservation::find($id)->update([
            'name'=>$request->name,
            'email'=>$request->email,
            'phone_no'=>$request->phone,
            'num_of_guest'=>$request->number_guests,
            'date'=>date('Y-m-d',strtotime($request->date)),
            'time'=>$request->time,
            'message'=>$request->message
        ]);

        return redirect()->route('reservations.index')->with('success','Success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $reservation = Reservation::find($id)->delete();
        return redirect()->route('reservations.index')->with('success','Success');
    }
}
