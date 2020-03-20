@extends('layouts.app')

@section('content')

<section>
    <div class="container mt-5">
        <div class="row">
            <h2 class="word">{{$post->title}}</h2>
            @auth
            <div class="mr-auto">
                <a href="{{ route('likeStore', ['post' => $post, 'like_count' => $post->user_count->like == 1 ? 0 : 1]) }}" class="btn btn-primary">
                    Like {{ $post->like_count }}
                </a>
            </div>
            @else
            @endauth
            <div class="box mt-3">
                <p class="text-justify">{{ $post->description }}</p>
            </div>
            <div>
                <p class="mt-3"><b>Posted On:</b> <span>{{ date('F d, Y', strtotime($post->created_at)) }}</span></p>
            </div>
        </div>
    </div>
</section>
<!-- Hidden Form For Storing Likes -->
<div>

</div>
<!-- End Form -->
</div>
<section class="mb-5">
    @auth
    <div class="row cbox">
        <div class="col-md-6 outline">
            <form method="POST" action="{{ route('storeComments') }}" class="p-3">
                @csrf
                <div class="form-group">
                    <input type="text" name="comment" class="form-control" placeholder="Add Comment" required>
                    <input type="hidden" name="post_id" value="{{ $post->id }}">
                    <input type="hidden" name="author_id" value="{{ $post->created_by }}">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-warning">Add Comment</button>
                </div>
            </form>
        </div>
    </div>
    @else
    <div>
        <p class="text-justify"> <a href="{{ route('login') }}">Login To Comment</a></p>
    </div>
    @endauth



    @forelse ($post->comments as $key => $comment)
    <div class="row dbox">
        <div class="col-md-6 outline p-3">
            <h6> {{ $comment->user->name }}</h6>
            <h6> {{ $comment->comment }}</h6>
        </div>
    </div>
    @empty
    <p class="text-center">No Comments. </p>

    @endforelse


</section>
@endsection
