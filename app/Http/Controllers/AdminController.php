<?php

namespace App\Http\Controllers;

use App\Models\Cast;
use App\Models\Movie;
use App\Models\Serie;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AdminController extends Controller
{
    /**
     * @return View
     */
    public function index(): View
    {
        $users = User::all();
        $movies = Movie::all();
        $series = Serie::all();
        $casts = Cast::all();
        return view('admin.index', compact('users', 'movies', 'series', 'casts'));
    }
}
