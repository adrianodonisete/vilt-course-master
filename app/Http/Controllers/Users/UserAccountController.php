<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class UserAccountController extends Controller
{
    public function create()
    {
        return inertia('UserAccount/Create');
    }

    public function store(Request $request)
    {
        $inputValidated = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users', #,column,except,id
            'password' => 'required|min:8|confirmed',
        ]);

        $user = User::make($inputValidated);
        $user->save();

        Auth::login($user);

        return redirect()->route('listing.index')
            ->with('success', 'Account created!');
    }
}
