@extends('partials.layout')
@section('title', 'Home')
@section('content')
    <div class="container mx-auto">
        <div class="my-2 flex justify-center">
            {{ $posts->links() }}
        </div>
        <div class="grid grid-cols-4 gap-4">
            @foreach($posts as $post)
                <div>
                    <div class="card bg-base-300 shadow-xl min-h-full">
                        <figure>
                            <img src="https://img.daisyui.com/images/stock/photo-1606107557195-0e29a4b5b4aa.webp"
                                alt="Shoes" />
                        </figure>
                        <div class="card-body">
                            <h2 class="card-title">{{ $post->title }}</h2>
                            <p>{{ $post->snippet }}</p>
                            <p class="text-neutral-content">{{ $post->created_at->diffForHumans() }}</p>
                            <div class="card-actions justify-end">
                                <a href="{{ route('post', ['post' => $post]) }}" class="btn btn-primary">Read more</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
