<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index()
    {
        return response()->json([
            'succes' => true,
            'response' => Project::with(['category', 'technologies'])->orderBy('id')->paginate(6)
        ]);
    }
    public function show($slug)
    {
        $project = Project::with(['category', 'technologies'])->where( 'slug',$slug)->first();
        // dd($project);
        if ($project) {
            return response()->json([
                'success' => true,
                'results' => $project
            ]);
        } else {
            return response()->json([
                'success' => false,
                'results' => 'project not found'
            ]);
        }
    }



}
