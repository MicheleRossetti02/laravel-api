<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use App\Models\Category;
use App\Models\Project;
use App\Models\Technology;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use illuminate\Support\Str;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = Project::orderBy('id')->get();
        // $project = Project::orderByCres('id')->get();
        // dd($project);
        return view('admin.projects.index', compact('projects'));
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
        // dd(request());
        return view('admin.projects.create', compact('categories', 'technologies'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreProjectRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProjectRequest $request)
    {
        // dd($request->all());
        //validazione dati
        $val_data = $request->validated();
        // dd($val_data);
        if ($request->hasFile('cover')) {
            $cover = Storage::disk('public')->put('projects_img', $request->cover);
            $val_data['cover'] = $cover;
        }
        //generate project slug
        // $project_slug = Str::slug($val_data['title']);
        // dd($project_slug);

        $project_slug = Project::generateSlag($val_data['title']);
        // dd($project_slug);
        $val_data['slug'] = $project_slug;
        //add project
        // dd($val_data);
        // dd($val_data);
        // dd($val_data->$cover);

        $val_data['user_id'] = Auth::id();

        // dd($val_data->$cover);

        $project = Project::create($val_data);
        // dd($val_data);
        if ($request->has('technologies')) {
            $project->technologies()->attach($val_data['technologies']);
        }

        //redirect
        return to_route('admin.projects.index')->with('message', " $project->title. You add a great Project!");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        return view('admin.projects.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        $categories = Category::all(); //👈 get all categories

        return view('admin.projects.edit', compact('project', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProjectRequest  $request
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProjectRequest $request, Project $project)
    {
        // dd($request->all());
        //validazione dati
        $val_data = $request->validated();
        // dd($val_data);

        //generate project slug
        // $project_slug = Str::slug($val_data['title']);
        // dd($project_slug);

        $project_slug = Project::generateSlag($val_data['title']);
        // dd($project_slug);
        $val_data['slug'] = $project_slug;
        //add project
        // dd($val_data);

        // dd($val_data->all());

        $project->update($val_data);
        return to_route('admin.projects.index')->with('message', "$project->title. You edit a great Project!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        $project->delete();
        return to_route('admin.projects.index')->with('message', "you just delete this beautiful project successefully: $project->title");
    }
}
