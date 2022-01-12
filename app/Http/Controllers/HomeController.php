<?php

namespace App\Http\Controllers;

use App\Models\StreamPoint;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $collection = StreamPoint::byActive()
        ->byPriority()
        ->get()
        ->toArray();

        $collection = array_chunk($collection, 2);

        return view('home')
            ->with(['collection' => $collection]);
    }
}
