<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

use App\Models\Listing;
use App\Handlers\ListingHandler;

class ListingController extends Controller implements HasMiddleware
{
    public function __construct()
    {
        // dd(Gate::any(['view'], [User::class, Listing::class]));

        // $response = Gate::inspect('view');
        // dd($response);
    }

    public static function middleware(): array
    {
        return [
            new Middleware('auth', except: ['index', 'show']),
            new Middleware('valid.option', only: ['index', 'show']),
        ];
    }

    public function index()
    {
        return inertia(
            'Listing/Index',
            [
                'listings' => Listing::orderByDesc('created_at')
                    ->paginate(10),
            ]
        );
    }

    public function create()
    {
        return inertia('Listing/Create');
    }

    public function store(Request $request)
    {
        $validate = $request->validate(
            ListingHandler::validateRules()
        );

        // Listing::create($validate);
        $request->user()->listings()->create($validate);

        return redirect()->route('listing.index')
            ->with('success', 'Listing was created!');
    }

    public function show(Listing $listing)
    {
        // if (Auth::user()->cannot('view', $listing)) {
        //     abort(403);
        // }
        if (! Gate::allows('view', $listing)) {
            abort(403);
        }

        return inertia(
            'Listing/Show',
            [
                'listing' => $listing,
            ]
        );
    }

    public function edit(Listing $listing)
    {
        if (! Gate::allows('update', $listing)) {
            abort(403);
        }

        return inertia(
            'Listing/Edit',
            [
                'listing' => $listing,
            ]
        );
    }

    public function update(Request $request, Listing $listing)
    {
        if (! Gate::allows('update', $listing)) {
            abort(403);
        }

        $listing->update(
            $request->validate(
                ListingHandler::validateRules()
            )
        );

        return redirect()->route('listing.index')
            ->with('success', 'Listing was updated!');
    }

    public function destroy(Listing $listing)
    {
        if (! Gate::allows('delete', $listing)) {
            abort(403);
        }

        $listing->delete();

        return redirect()->back()
            ->with('success', 'Listing was deleted!');
    }
}
