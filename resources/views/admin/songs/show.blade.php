@extends('layouts.app')
@section('content')

<h1>
    {{$song->title}}
</h1>
<div class="content">
    l'album che stai ascoltando è di
    {{$song->artist}}
    è prende il nome di
    {{$song->album}}

    <div class="category">
        <strong>Category:</strong>
        {{ $song->category ? $song->category->name : 'Uncategorized'}}
    </div>


</div>
@endsection