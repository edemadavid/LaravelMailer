<?php

namespace App\Http\Controllers;

use App\Models\EmailLists;
use Illuminate\Http\Request;
use Throwable;

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
        try {
            $emails = EmailLists::all();

            return view('home', compact('emails'));
        } catch (Throwable $error) {
            return response()->json($error->getMessage(), 500);
        }

        // return view('home');
    }
}
