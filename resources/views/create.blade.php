@extends('layouts.master')
@section('content')
    <div class="container">
        <h3 class="pt-5">Udemy Crud Opraction</h3>

        @if ($errors->any())
        @foreach ($errors->all() as $error)
            <div class="alert alert-danger">
{{$error}}
            </div>
        @endforeach
            
        @endif
        <div class="p-4 border">
            <button type="button" class="btn btn-primary my-5">Create Post</button>

        
        <form method="post" action="{{route('post.store')}}" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Image</label>
                <input name="image" type="file" class="form-control"  >
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Title</label>
                <input name="title" type="text" class="form-control" id="exampleInputPassword1">
            </div>
            <div class="form-floating">
                <textarea class="form-control" name="description" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px"></textarea>
                <label  for="floatingTextarea2">Comments</label>
              </div>
          
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
    </div>
@endsection
