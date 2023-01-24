@extends('layouts.admin')
@section('content')
    <h1>
        {{ $project->title }}
    </h1>
    <div class="content">
        l'source_code che stai ascoltando è di
        {{ $project->project_link }}
        è prende il nome di
        {{ $project->source_code }}

        <div class="category">
            <strong>Category:</strong>
            {{ $project->category ? $project->category->name : 'Uncategorized' }}
        </div>


    </div>
@endsection
