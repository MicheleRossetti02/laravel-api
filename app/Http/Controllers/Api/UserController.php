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
}
