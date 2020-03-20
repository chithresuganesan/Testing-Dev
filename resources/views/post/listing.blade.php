@extends('layouts.app')

@section('content')
<div class="pt-5 text-center">
    <h2>Your Post</h2>
</div>
<div class="container p-3">
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Title</th>
                <th scope="col">Description</th>
                <th scope="col">Settings</th>
            </tr>
        </thead>
        @forelse($Post as $post)
        @if(Auth::User()->id == $post->created_by)
            <tbody>
                <tr>
                    <th scope="row"></th>
                    <td>{{$post->title}}</td>
                    <td>{{substr($post->description, 0,100)}}...</td>
                    <td><a href="#" class="btn btn-outline-primary" data-toggle="modal" data-target="#updateModal{{ $post->id }}">Update</a></td>
                </tr>
            </tbody>
            @endif
            @empty
            <tbody>
                <tr>
                    <td>No data Found</td>
                </tr>
            </tbody>
            @endforelse
    </table>
</div>
<!-- Modal For Update -->
@foreach($Post as $post)
<!-- Modal -->
<div class="modal fade" id="updateModal{{ $post->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Update Post</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ url('update/post/'.$post->id) }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Title</label>
                        <input type="name" name="title" class="form-control" id="exampleFormControlInput1" value="{{ $post->title }}">
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Description</label>
                        <textarea class="form-control" name="description" id="exampleFormControlTextarea1" rows="3">{!! $post->description !!}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlInput1">Image</label>
                        <input type="file" name="iamge" class="form-control" id="exampleFormControlInput1">
                    </div>

                    <div class="form-group col-md-6">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
@endforeach

@endsection
