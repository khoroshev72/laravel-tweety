<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ExpolreController extends Controller
{
    public function index()
    {
      $users = User::where('id', '!=', auth()->user()->id)->paginate(10);
      return view('explore.index', compact('users'));
    }
}
