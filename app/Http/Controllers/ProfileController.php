<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\User;
class ProfileController extends Controller
{
    public function edit(Request $request)
    {
        $user = Auth::user();
        return view('auth.editprofil', compact('user'));
    }
    public function update(User $user){
        $user->name = request('name');
        $user->email = request('email');
        $user->password = bcrypt(request('password'));

        $user->save();

        return back();
    }
}
