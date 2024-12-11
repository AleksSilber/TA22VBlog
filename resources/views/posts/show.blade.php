@extends('partials.layout')
@section('title', $post->title)
@section('content')
    <div class="container mx-auto">
        <a class="btn btn-primary" href="{{ url()->previous() }}">Back</a>
        <table class="table table-zebra">
            <tbody>
                <tr class="hover">
                    <th>ID</th>
                    <td>{{$post->id}}</td>
                </tr>
                <tr class="hover">
                    <th>Title</th>
                    <td>{{$post->title}}</td>
                </tr>
                <tr class="hover">
                    <th>Content</th>
                    <td>{!! $post->displayBody !!}</td>
                </tr>
                <tr class="hover">
                    <th>Created</th>
                    <td>{{$post->created_at}}</td>
                </tr>
                <tr class="hover">
                    <th>Updated</th>
                    <td>{{$post->updated_at}}</td>
                </tr>
            </tbody>
        </table>
    </div>
@endsection
