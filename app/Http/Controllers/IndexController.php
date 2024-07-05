<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Route;

// use Illuminate\Support\Facades\Auth;

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

    public function routes()
    {
        $routeCollection = Route::getRoutes();

        $routes = [];
        foreach ($routeCollection as $key => $value) {
            $method = collect($value->methods())->first();
            $routes[$key]['method'] = $method;
            $routes[$key]['uri'] = $value->uri();
            $routes[$key]['name'] = $value->getName();
            $routes[$key]['action'] = $value->getActionName();
        }
        return view('routes.show', ['routes' => $routes]);
    }
}
