<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Song;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        return response()->json([
            'succes' => true,
            'response' => Song::with(['category', 'technologies'])->orderBy('id')->paginate(6)
        ]);
    }
    public function show($song_slug)
    {
        $song = Song::with(['category', 'technologies'])->where( 'song_slug',$song_slug);
        if ($song) {
            return response()->json([
                'success' => true,
                'results' => $song
            ]);
        } else {
            return response()->json([
                'success' => false,
                'results' => '$song not found'
            ]);
        }
    }



}
