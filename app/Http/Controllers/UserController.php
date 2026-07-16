<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\User;

class UserController extends Controller
{
    /**
     * Display the authenticated pilot's own profile dashboard.
     */
    public function index()
    {
        $user = Auth::user();
        return view('user.index', compact('user'));
    }

    /**
     * Display any specific pilot's public showroom.
     */
    public function show(User $user)
    {

        return view('user.show', compact('user'));
    }
    public function userDelete()
    {
        foreach (Auth::user()->cars as $car) {
            $car->user()->dissociate();                      ;
            $car->save();
        }
        Auth::user()->delete();
        Auth::logout();
        return redirect()->route('home')->with('success', 'Your account has been deleted successfully!');
    }


}
