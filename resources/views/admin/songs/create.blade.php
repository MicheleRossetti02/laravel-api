@extends('layouts.app')
@section('content')


<h1>Add a new Song</h1>
@if($errors->any())
<div class="alert alert-success" role="alert">
    <ul>
        @foreach($errors->any() as $error)
        <li>{{$error}}</li>
        @endforeach
    </ul>
</div>
@endif

<form action="{{route('admin.songs.store')}}" method="post" enctype="multipart/form-data">
    @csrf

    <div class="m-3">
        <label for="title" class="form-label">Title</label>
        <input type="text" name="title" id="title" class="form-control" placeholder="Title">
        <small id="titleHelper " class="text-muted"> Add a title for the current song, max 100 characters</small>
    </div>
    <div class="form-group">
        <label for="cover">Cover Image</label>
        <input type="file" class="form-control-file" name="cover" id="cover" placeholder="Add a cover image" aria-describedby="coverImgHelper">
        <small id="coverImgHelper" class="form-text text-muted">Add a cover image</small>
    </div>
    @error('cover')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror

    <div class="mb-3">
        <label for="category_id" class="form-label">Categories</label>
        <select class="form-select form-select-lg @error('category_id') 'is-invalid' @enderror" name="category_id" id="category_id">
            <option selected>Select one</option>

            @foreach ($categories as $category )
            <option value="{{$category->name}}" {{ old('category_name') ? 'selected' : '' }}>{{$category->name}}</option>
            @endforeach

        </select>
    </div>
    @error('category_id')
    <div class="alert alert-danger" role="alert">
        {{$message}}
    </div>
    @enderror
    <!-- show all technologies  -->
    <div class="form-group">
        <label for="technologies">Technologies</label>
        <select multiple class="custom-select" name="technologies[]" id="technologies">
            <option value="" disabled>Select Technology</option>
            @forelse($technologies as $technology)

            @if($errors->any())
            <option value="{{$technology->id}}" {{in_array($technology->id,old('technology',[])) ? 'selected' : ''}}>{{$technology->name}}</option>
            @else
            <option value="{{$technology->id}}">{{$technology->name}}</option>
            @endif
            @empty
            <option value="" disabled>Sorry no Technologies in the system</option>
            @endforelse

        </select>
    </div>
    <div class="m-3">
        <label for="artist" class="form-label">Artist</label>
        <input type="text" name="artist" id="title" class="form-control" placeholder="Artist">
        <small id="titleHelper " class="text-muted"> Add the main artist
        </small>

    </div>
    <div class="m-3">
        <label for="album" class="form-label">Album</label>
        <input type="text" name="album" id="album" class="form-control" placeholder="Album">
        <small id="titleHelper " class="text-muted"> Add the name of the Album</small>
    </div>
    <button type="submit" class=" m-3 btn btn-primary">Create</button>
</form>
@endsection