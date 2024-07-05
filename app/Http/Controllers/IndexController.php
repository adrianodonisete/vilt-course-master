<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{
    public function index()
    {
        // dd(Auth::user());
        return inertia(
            'Index/Index',
            [
                'message' => 'Home - Laravel 11'
            ]
        );
    }

    public function show()
    {
        return inertia('Index/Show');
    }
}
