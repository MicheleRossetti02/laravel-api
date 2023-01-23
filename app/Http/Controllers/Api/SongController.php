<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Song;
use Illuminate\Http\Request;

class SongController extends Controller
{
    public function index()
    {
        return response()->json([
            'succes' => true,
            'response' => Song::with(['category', 'technologies'])->orderBy('id')->paginate(6)
        ]);
    }
    public function show($slug)
    {
        $song = Song::with(['category', 'technologies'])->where( 'slug',$slug)->first();
        // dd($song);
        if ($song) {
            return response()->json([
                'success' => true,
                'results' => $song
            ]);
        } else {
            return response()->json([
                'success' => false,
                'results' => 'song not found'
            ]);
        }
    }



}
