<?php

namespace App\Http\Controllers;

use App\Models\Tweet;
use Illuminate\Http\Request;

class TweetController extends Controller
{
    public function index()
    {
        return view('tweet.index', [
            'tweets' => auth()->user()->timeline()
        ]);
    }


    public function store()
    {
        $attrs = request()->validate([
            'body' => 'required|max:255'
        ]);

        $attrs['user_id'] = auth()->id();

        Tweet::create($attrs);

        return redirect()->back();
    }
}
