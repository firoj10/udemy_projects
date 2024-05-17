@extends('layouts.master')
@section('content')
    <div class="container">
        <h3 class="pt-5">Udemy Crud Opraction</h3>
        <div class="p-4 border">

            <a type="button" href="{{ route('post.create') }}" class="btn btn-primary">Create Post</a>
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Image</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($posts as $post)
                        <tr>
                            <th scope="row">{{ $post->id }}</th>
                            <td>
                                <img src="{{ asset($post->image) }}" width="50" alt="">
                            </td>
                            <td>Otto</td>
                            <td>@mdo</td>
                            <td>
                                <button type="button" class="btn btn-primary">Edit</button>
                                <a href="{{route('post.edit', $post->id )}}" type="button" class="btn btn-primary">Edit</a>
                                <form action="{{route('post.destroy', $post->id )}}" method="post"  enctype="multipart/form-data">
                                @csrf
                                @method("DELETE")
                                <button type="submit" class="btn btn-danger">Delete</button>

                                </form>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>

    </div>
@endsection
