<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSongRequest;
use App\Http\Requests\UpdateSongRequest;
use App\Models\Category;
use App\Models\Song;
use App\Models\Technology;
use Illuminate\Support\Facades\Storage;
use illuminate\Support\Str;

class SongController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $song = Song::orderBy('id')->get();
        // $song = Song::orderByCres('id')->get();
        // dd($song);
        return view('admin.songs.index', compact('song'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all(); //👈 get all categories
        $technologies = Technology::all();
        return view('admin.songs.create', compact('categories', 'technologies'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreSongRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSongRequest $request)
    {
        // dd($request->all());
        //validazione dati
        $val_data = $request->validated();
        // dd($val_data);

        //generate song slug
        // $song_slug = Str::slug($val_data['title']);
        // dd($song_slug);

        $song_slug = Song::generateSlag($val_data['title']);
        // dd($song_slug);
        $val_data['slug'] = $song_slug;
        //add song
        // dd($val_data);
        // dd($val_data);

        $cover = Storage::disk('public')->put('songs_img', $request->cover);
        $val_data['cover'] = $cover;

        // dd($val_data);

        Song::create($val_data);

        $val_data->technologies()->attach($request->technologies);
        //redirect
        return to_route('admin.songs.index')->with('message', 'You add a great Song!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Song  $song
     * @return \Illuminate\Http\Response
     */
    public function show(Song $song)
    {
        return view('admin.songs.show', compact('song'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Song  $song
     * @return \Illuminate\Http\Response
     */
    public function edit(Song $song)
    {
        $categories = Category::all(); //👈 get all categories

        return view('admin.songs.edit', compact('song', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSongRequest  $request
     * @param  \App\Models\Song  $song
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSongRequest $request, Song $song)
    {
        // dd($request->all());
        //validazione dati
        $val_data = $request->validated();
        // dd($val_data);

        //generate song slug
        // $song_slug = Str::slug($val_data['title']);
        // dd($song_slug);

        $song_slug = Song::generateSlag($val_data['title']);
        // dd($song_slug);
        $val_data['slug'] = $song_slug;
        //add song
        // dd($val_data);

        // dd($val_data->all());

        $song->update($val_data);
        return to_route('admin.songs.index')->with('message', 'You edit a great Song!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Song  $song
     * @return \Illuminate\Http\Response
     */
    public function destroy(Song $song)
    {
        $song->delete();
        return to_route('admin.songs.index')->with('message', "you just delete this beautiful song successefully: $song->title");
    }
}
