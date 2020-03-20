@extends('layouts.app')

@section('content')

<section class="container">
    <div class="pt-5 text-center">
        <h2>Add Post</h2>
    </div>
    <div class="container p-5">
        <form method="POST" action="{{ route('storeData') }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group col-md-6">
                <label for="exampleFormControlInput1">Title</label>
                <input type="name" name="title" class="form-control" id="exampleFormControlInput1" placeholder="Enter Title">
            </div>

            <div class="form-group col-md-6">
                <label for="exampleFormControlTextarea1">Description</label>
                <textarea class="form-control" name="description" id="exampleFormControlTextarea1" rows="3"></textarea>
            </div>

            <div class="form-group col-md-6">
                <label for="exampleFormControlInput1">Image</label>
                <input type="file" name="iamge" class="form-control" id="exampleFormControlInput1">
            </div>

            <div class="form-group col-md-6">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>

        </form>
    </div>

</section>
@endsection
