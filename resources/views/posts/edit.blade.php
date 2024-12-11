@extends('partials.layout')
@section('title', 'Edit ' . $post->title)
@section('content')
    <div class="container mx-auto">
        <div class="card bg-base-300 shadow-xl w-1/2 mx-auto">
            <div class="card-body">
                <form action="{{ route('posts.update', ['post' => $post]) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <label class="form-control w-full">
                        <div class="label">
                            <span class="label-text">Title</span>
                        </div>
                        <input name="title" type="text" placeholder="Title" value="{{ old('title') ?? $post->title }}"
                            class="input input-bordered @error('title') input-error @enderror w-full" required autofocus/>
                        <div class="label">
                            @error('title')
                                <span class="label-text-alt text-error">{{ $message }}</span>
                            @enderror
                        </div>
                    </label>
                    <label class="form-control w-full">
                        <div class="label">
                            <span class="label-text">Content</span>
                        </div>
                        <textarea
                            name="body"
                            rows="12"
                            class="textarea textarea-bordered @error('body') textarea-error @enderror"
                            required
                            placeholder="Write something cool...">{{ old('body') ?? $post->body }}</textarea>
                        <div class="label">
                            @error('body')
                                <span class="label-text-alt text-error">{{ $message }}</span>
                            @enderror
                        </div>
                    </label>
                    <input type="submit" class="btn btn-primary" value="Update" />
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
