@extends('partials.layout')
@section('title', 'Posts')
@section('content')
    <div class="container mx-auto">
        <a class="btn btn-primary" href="{{route('posts.create')}}">Add Post</a>
        <div class="text-center my-2">
            {{ $posts->links() }}
        </div>
        <table class="table table-zebra">
            <thead>
                <th>ID</th>
                <th>Title</th>
                <th>Created</th>
                <th>Updated</th>
                <th>Actions</th>
            </thead>
            <tbody>
                @foreach ($posts as $post)
                    <tr class="hover">
                        <td>{{$post->id}}</td>
                        <td>{{$post->title}}</td>
                        <td>{{$post->created_at}}</td>
                        <td>{{$post->updated_at}}</td>
                        <td>
                            <div class="join">
                                <a href="{{route('posts.show', ['post' => $post])}}" class="btn join-item btn-info">View</a>
                                <a href="{{route('posts.edit', ['post' => $post])}}" class="btn join-item btn-warning">Edit</a>
                                <button form="post-delete-{{$post->id}}" class="btn join-item btn-error">Delete</button>
                            </div>
                            <form id="post-delete-{{$post->id}}" action="{{route('posts.destroy', ['post' => $post])}}" method="POST">
                                @csrf
                                @method('DELETE')
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
            <tfoot>
                <th>ID</th>
                <th>Title</th>
                <th>Created</th>
                <th>Updated</th>
                <th>Actions</th>
            </tfoot>
        </table>
    </div>
@endsection
