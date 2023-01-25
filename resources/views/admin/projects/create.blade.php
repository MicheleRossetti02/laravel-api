@extends('layouts.admin')
@section('content')


    <h1>Add a new Song</h1>
    <form action="{{ route('admin.projects.store') }}" method="post" enctype="multipart/form-data">
        <!-- @if ($errors->any())
    <div class="alert alert-success" role="alert">
                                            <ul>
                                                @foreach ($errors->all() as $error)
    <li>{{ $error }}</li>
    @endforeach
                                            </ul>
                                        </div>
    @endif -->


        @csrf

        <div class="m-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" name="title" id="title" class="form-control" placeholder="Title">
            <small id="titleHelper " class="text-muted"> Add a title for the current project, max 100 characters</small>
        </div>

        <!-- ################# -->
        <div class="mb-3">
            <label for="cover_image" class="form-label">Cover Image</label>
            <input type="file" name="cover_image" id="cover_image"
                class="form-control  @error('cover_image') is-invalid @enderror" placeholder=""
                aria-describedby="coverImageHelper" value="{{ old('cover_image') }}">
            <small id="coverImageHelper" class="text-muted">Add your cover image</small>
        </div>
        <!-- ################# -->

        <div class="mb-3">
            <label for="category_id" class="form-label">Categories</label>
            <select class="form-select form-select-lg @error('category_id') 'is-invalid' @enderror" name="category_id"
                id="category_id">
                <option selected>Select one</option>

                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" {{ $category->id == old('category_id') ? 'selected' : '' }}>
                        {{ $category->name }}</option>
                @endforeach

            </select>
        </div>
        @error('category_id')
            <div class="alert alert-danger" role="alert">
                {{ $message }}
            </div>
        @enderror
        <!-- show all technologies  -->
        <div class="form-group">
            <label for="technologies">Technologies</label>
            <select multiple class="custom-select" name="technologies[]" id="technologies">
                <option value="" disabled>Select Technology</option>

                @forelse($technologies as $technology)
                    <option value="{{ $technology->id }}"
                        {{ in_array($technology->id, old('technology', [])) ? 'selected' : '' }}>{{ $technology->name }}
                    </option>
                @empty
                    <option value="" disabled>Sorry no Technologies in the system</option>
                @endforelse

            </select>
            @error('technologies')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="m-3">
            <label for="project_link" class="form-label">Project Link</label>
            <input type="text" name="project_link" id="title" class="form-control" placeholder="Project Link">
            <small id="titleHelper " class="text-muted"> Add the main Project Link
            </small>

        </div>
        <div class="m-3">
            <label for="source_code" class="form-label">Source Code</label>
            <input type="text" name="source_code" id="source_code" class="form-control" placeholder="Source Code">
            <small id="titleHelper " class="text-muted"> Add the name of the Source Code</small>
        </div>
        <button type="submit" class=" m-3 btn btn-primary">Create</button>
    </form>
@endsection
