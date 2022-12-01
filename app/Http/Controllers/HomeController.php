<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Reservation;
class HomeController extends Controller
{
    public function index()
    {
        return view('home');
    }

    public function redirects()
    {
        $today_reservation = Reservation::where('date',date('Y-m-d'))->get()->count();
        // dd($today_reservation);
        $monthly_reservation = Reservation::whereMonth('date',date('m'))->get()->count();
        $total_reservation = Reservation::get()->count();
        return view('admin.dashboard',compact('today_reservation','monthly_reservation','total_reservation'));
    }

    public function dashboard()
    {
        $today_reservation = Reservation::where('date',date('Y-m-d'))->get()->count();
        // dd($today_reservation);
        $monthly_reservation = Reservation::whereMonth('date',date('m'))->get()->count();
        $total_reservation = Reservation::get()->count();
        return view('admin.dashboard',compact('today_reservation','monthly_reservation','total_reservation'));
    }

    public function reservation_create(Request $request)
    {
        // dd("Hefre");
        $reservation = Reservation::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'phone_no'=>$request->phone,
            'num_of_guest'=>$request->number_guests,
            'date'=>date('Y-m-d',strtotime($request->date)),
            'time'=>$request->time,
            'message'=>$request->message
        ]);


        return redirect()->route('home_index')->with('success','Success');
    }
}
