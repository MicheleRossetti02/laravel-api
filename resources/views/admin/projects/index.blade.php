@extends('layouts.admin')
@section('content')
    <h1>Projects</h1>
    <a name="" id="" class="btn btn-primary position-fixed bottom-0 end-0 "
        href="{{ route('admin.projects.create') }}" role="button">New Project
        <i class="fa fa-plus-circle" aria-hidden="true"></i>
    </a>
    @include('partials.message')

    <div class="table-responsive">
        <table class="table table-striped
    table-hover	
    table-borderless
    table-primary
    align-middle">
            <thead class="table-light">

                <tr>
                    <th>ID</th>
                    <th>Cover</th>
                    <th>Title </th>
                    <th>Source Code</th>
                    <th>Project Link</th>
                    <th>Actions</th>

                </tr>
            </thead>
            <tbody class="table-group-divider">
                @forelse($projects as $project)
                    <tr class="table-primary">
                        <td scope="row">{{ $project->id }}</td>
                        <td scope="row">

                            @if ($project->cover_image)
                                <img width="100" class="img-fluid" src="{{ asset('storage/' . $project->cover_image) }}"
                                    alt="">
                            @else
                                <div class="placeholder p-5 bg-secondary d-flex align-items-center justify-content-center"
                                    style="width:100px">Placeholder</div>
                            @endif

                        </td>

                        <td>{{ $project->title }}</td>
                        <td>{{ $project->source_code }}</td>
                        <td>{{ $project->project_link }}</td>
                        <td>
                            <!-- show -->
                            <a href="{{ route('admin.projects.show', $project->slug) }}">
                                <i class="fas fa-eye fa-sm fa-fw"></i>
                            </a>
                            <!-- edit -->
                            <a href="{{ route('admin.projects.edit', $project->slug) }}">
                                <i class="fas fa-pencil fa-sm fa-fw"></i>
                            </a>
                            <!-- delete -->
                            <!-- <a href="{{ route('admin.projects.destroy', $project->slug) }}">
                                                         @method('DELETE')
                                                        <i class="fas fa-trash fa-sm fa-fw"></i>

                                                    </a>  -->

                            <form action="{{ route('admin.projects.destroy', $project->slug) }}" method="post">
                                @csrf
                                @method('DELETE')



                                <!-- Modal trigger button -->
                                <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal"
                                    data-bs-target="#delete_project_{{ $project->slug }}">
                                    Delete
                                </button>

                                <!-- Modal Body -->
                                <!-- if you want to close by clicking outside the modal, delete the last endpoint:data-bs-backdrop and data-bs-keyboard -->
                                <div class="modal fade" id="delete_project_{{ $project->slug }}" tabindex="-1"
                                    data-bs-backdrop="static" data-bs-keyboard="false" role="dialog"
                                    aria-labelledby="modalTitleId_{{ $project->slug }}" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-sm"
                                        role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="modalTitleId_{{ $project->slug }}">Delete
                                                    {{ $project->title }}</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                Are you sure?
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary btn-sm"
                                                    data-bs-dismiss="modal">Close</button>
                                                <form action="{{ route('admin.projects.destroy', $project->slug) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('DELETE')

                                                    <input class="btn btn-danger btn-sm" type="submit" value="Delete">

                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </form>

                        </td>

                    </tr>


                @empty

                    <tr>
                        <td>No Projects</td>
                    </tr>
                @endforelse
            </tbody>
            <tfoot>

            </tfoot>
        </table>


    </div>
@endsection
