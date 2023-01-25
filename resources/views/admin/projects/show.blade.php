@extends('layouts.admin')
@section('content')
    @if ($project->cover_image)
        <img class="img-fluid" style="width:150px" src="{{ asset('storage/' . $project->cover_image) }}" alt="">
    @else
        <div class="placeholder p-5 bg-secondary" style="width:100px">Placeholder</div>
    @endif
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
