<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    //
    public function profile(){
        return view('profile.profile')->with(array('user'=>Auth::user()));
    }
    
    public function change_password(Request $request){
        $user = Auth::user();
        $user->password = bcrypt($request->input('new_password'));
        $user->save();
        return redirect('/profile');
    }
}
