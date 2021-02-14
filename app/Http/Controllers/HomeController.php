<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
//        $tweets = auth()->user()->tweets()->latest()->get();
        return view('home.index', [
            'tweets' => auth()->user()->timeline()
        ]);
    }
}
