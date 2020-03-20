@extends('layouts.app')

@section('content')

<section class="container">

@forelse ($posts as $key => $post)
<div class="row card" style="width: 18rem;">
  <img class="card-img-top" src="{{ asset('storage/images/'.$post->url) }}" alt="Card image cap">
  <div class="card-body">
    <h5 class="card-title">{{ $post->title }}</h5>
    <p class="card-text">{{ substr($post->description, 0, 100) }}</p>
    <a href="{{ route('detailsPage', ['id' => $post->id]) }}" class="btn btn-primary">Read More</a>
  </div>
</div>
@empty
  <div class="card p-2">
    <h2 class="card-title">No Data Available</h2>
  </div>
@endforelse

  {{-- @forelse ($posts as $key => $post)
    <div class="card p-2">
        <h2 class="card-title">{{ $post->title }}</h2>
        <img class="card-img-top w-50" src="{{ asset('storage/images/'.$post->url) }}" alt="Card image cap" >
        <div class="card-body">
            <p class="card-text">{{ substr($post->description, 0,150) }}</p>
        </div>
        <a href="{{ url('details/page/'.$post->id) }}" class="text-right">Read More</a>
    </div>
  @empty
    <div class="card p-2">
      <h2 class="card-title">No Data Available</h2>
    </div>
  @endforelse --}}

</section>
@endsection
