<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Hash;
use App\Models\User;
use Illuminate\Support\Facades\Input;
class UserController extends Controller
{
    public function users()
    {
        return view('admin.users.index');
    }

    public function profile()
    {
        // dd(auth()->user());
        $data = auth()->user();
        return view('admin.account.profile',compact('data'));
    }

    public function change_password()
    {
        
        return view('admin.account.change_password');
    }

    public function update_password(Request $request)
    {
        // dd($request->all());
        $this->validate($request,[
            'old_password'=>'required',
            'new_password'=>'required'
        ]);

        $data = User::find(auth()->user()->id);
        // if(! Hash::check($data->password , Input::get('currPassword') ))
        // {
        //     return redirect()->route('change_password')->with('error','Old Password does not match!');
        // }

        // if (! Hash::check($request->old_password, $data->password)) {
        //     return redirect()->route('change_password')->with('error','Old Password does not match!');
        // }

        $hash_old = Hash::make($request->old_password);
        
        dd($request->old_password);

        if ($hash_old != $data->password) {
            return redirect()->route('change_password')->with('error','Old Password does not match!');
        }


        $data = $data->update([
            'password'=>Hash::make($request->new_password)
        ]);
        return redirect()->route('change_password')->with('success','Password update success');

        // $correct_hash = Hash::make($request->old_password);
        // dd($correct_hash, Hash::check($request->old_password, $correct_hash));
    }
}
