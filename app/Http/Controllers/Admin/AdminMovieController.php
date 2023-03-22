<?php

namespace App\Http\Controllers\Admin;

use App\Models\Actor;
use App\Models\Genre;
use App\Models\Movie;
use App\Models\Country;
use App\Models\Language;
use App\Models\MovieImage;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreMovieRequest;
use App\Http\Requests\UpdateMovieRequest;

class AdminMovieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $movies = Movie::get();
        return view('admin.movies.index', compact('movies'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $genres = Genre::get();
        return view('admin.movies.create', compact('genres'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreMovieRequest $request)
    {
        Movie::create($request->all());
        return to_route('admin.movies.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Movie $movie)
    {
         //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Movie $movie)
    {
        $genres = Genre::get();
        $languages = Language::get();
        $countries = Country::get();
        $actors = Actor::get();

        return view('admin.movies.edit', compact('movie','genres','languages','countries','actors'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMovieRequest $request, Movie $movie)
    {
        $movie->customUpdate($request);
        return to_route('admin.movies.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Movie $movie)
    {
        $movie->delete();
        return response()->json(['success'=>true]);
    }
}
