<?php

namespace App\Http\Controllers\Front;

use App\Models\Movie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use App\Http\Controllers\Controller;

class FrontMovieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $movies = Movie::get();
        return view('front.movies.index', compact('movies'));
    }

    public function show(Movie $movie)
    {
        return view('front.movies.show', compact('movie'));
    }
}
