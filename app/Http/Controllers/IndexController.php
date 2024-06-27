<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
    {
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
