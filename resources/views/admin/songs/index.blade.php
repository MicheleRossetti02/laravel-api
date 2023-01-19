@extends('layouts.app')
@section('content')
<h1>Songs</h1>
<a name="" id="" class="btn btn-primary position-fixed bottom-0 end-0 " href="{{route('admin.songs.create')}}" role="button">New Song
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
                <th>Album</th>
                <th>Artist</th>
                <th>Actions</th>

            </tr>
        </thead>
        <tbody class="table-group-divider">
            @forelse($song as $song)
            <tr class="table-primary">
                <td scope="row">{{$song->id}}</td>
                <td scope="row">

                    @if($song->cover)
                    <img src="{{asset('storage/' . $song->cover )}}" alt="">
                    @endif
                </td>

                <td>{{$song->title}}</td>
                <td>{{$song->album}}</td>
                <td>{{$song->artist}}</td>
                <td>
                    <!-- show -->
                    <a href="{{route('admin.songs.show', $song->slug)}}">
                        <i class="fas fa-eye fa-sm fa-fw"></i>
                    </a>
                    <!-- edit -->
                    <a href="{{route('admin.songs.edit', $song->slug)}}">
                        <i class="fas fa-pencil fa-sm fa-fw"></i>
                    </a>
                    <!-- delete -->
                    <!-- <a href="{{route('admin.songs.destroy', $song->slug)}}">
                         @method('DELETE')
                        <i class="fas fa-trash fa-sm fa-fw"></i>

                    </a>  -->

                    <form action="{{route('admin.songs.destroy',$song->slug)}}" method="post">
                        @csrf
                        @method('DELETE')



                        <!-- Modal trigger button -->
                        <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#delete_song_{{$song->slug}}">
                            Delete
                        </button>

                        <!-- Modal Body -->
                        <!-- if you want to close by clicking outside the modal, delete the last endpoint:data-bs-backdrop and data-bs-keyboard -->
                        <div class="modal fade" id="delete_song_{{$song->slug}}" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog" aria-labelledby="modalTitleId_{{$song->slug}}" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-sm" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="modalTitleId_{{$song->slug}}">Delete {{$song->title}}</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        Are you sure?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Close</button>
                                        <form action="{{route('admin.songs.destroy', $song->slug)}}" method="POST">
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
                <td>No Songs</td>
            </tr>
            @endforelse
        </tbody>
        <tfoot>

        </tfoot>
    </table>
</div>
@endsection