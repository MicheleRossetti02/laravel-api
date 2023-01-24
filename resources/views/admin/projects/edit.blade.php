@extends('layouts.admin')

@section('content')
    <section class="py-5">

        <div class="container">
            <form action="{{ route('admin.projects.update', $project->slug) }}" method="post" class="card p-3">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" name="title" id="title" class="form-control" placeholder="insert a title"
                        aria-describedby="helpId" value="{{ old('title', $project) }}">
                    <small id="helpId" class="text-muted">insert a project title</small>
                </div>
                <div class="mb-3">
                    <label for="project_link" class="form-label">project_link</label>
                    <input type="text" name="project_link" id="project_link" class="form-control"
                        placeholder="insert a project_link" aria-describedby="helpId"
                        value="{{ old('project_link', $project) }}">
                    <small id="helpId" class="text-muted">insert a project description</small>
                </div>
                <div class="mb-3">
                    <label for="category_id" class="form-label">Categories</label>
                    <select class="form-select form-select-lg @error('category_id') 'is-invalid' @enderror"
                        name="category_id" id="category_id">
                        <option value="">Uncategorize</option>

                        @forelse ($categories as $category)
                            <!-- Check if the project has a category assigned or not                                    👇 -->
                            <option value="{{ $category->id }}"
                                {{ $category->id == old('category_id', $project->category ? $project->category->id : '') ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @empty
                            <option value="">Sorry, no categories in the system.</option>
                        @endforelse

                    </select>
                </div>
                @error('category_id')
                    <div class="alert alert-danger" role="alert">
                        {{ $message }}
                    </div>
                @enderror

                <div class="mb-3">
                    <label for="technologies" class="form-label">Technologys</label>
                    <select multiple class="form-select form-select-sm" name="technologies[]" id="technologies">
                        <option value="" disabled>Select a technology</option>
                        @forelse ($technologies as $technology)
                            @if ($errors->any())
                                <!-- Pagina con errori di validazione, deve usare old per verificare quale id di technology preselezionare -->
                                <option value="{{ $technology->id }}"
                                    {{ in_array($technology->id, old('technologies', [])) ? 'selected' : '' }}>
                                    {{ $technology->name }}</option>
                            @else
                                <!-- Pagina caricate per la prima volta: deve mostrarare i technology preseleziononati dal db -->
                                <option value="{{ $technology->id }}"
                                    {{ $project->technologies->contains($technology->id) ? 'selected' : '' }}>
                                    {{ $technology->name }}</option>
                            @endif
                        @empty
                            <option value="" disabled>Sorry 😥 no technologies in the system</option>
                        @endforelse

                    </select>
                </div>

                <div class="mb-3">
                    <label for="source_code" class="form-label">source_code</label>
                    <input type="text" name="source_code" id="source_code" class="form-control"
                        placeholder="insert a source_code " aria-describedby="helpId"
                        value="{{ old('source_code', $project) }}">
                    <small id="helpId" class="text-muted">insert a project source_code url</small>
                </div>

                <button type="submit" class="btn btn-primary">Edit</button>
            </form>
        </div>
    </section>
@endsection
