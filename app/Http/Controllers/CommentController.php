<?php

namespace App\Http\Controllers;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Comment;
use App\Http\Requests\StoreCommentRequest;
use App\Http\Requests\UpdateCommentRequest;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $comments = Comment::with(['user', 'post'])->paginate(10);
        return view('comments.index', compact('comments'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $posts = Post::all();
        return view('comments.create', compact('posts'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'body' => 'required|string|max:255',
            'post_id' => 'required|exists:posts,id',
        ]);
        Comment::create([
            'body' => $validated['body'],
            'post_id' => $validated['post_id'],
            'user_id' => Auth::id(),
        ]);
        return redirect()->route('comments.index')->with('success', 'Comment added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Comment $comment)
    {
        return view('comments.show', compact('comment'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Comment $comment)
    {
        $posts = Post::all();
        return view('comments.edit', compact('comment', 'posts'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Comment $comment)
    {
        $validated = $request->validate([
            'body' => 'required|string|max:255',
            'post_id' => 'required|exists:posts,id',
        ]);
        $comment->update($validated);
        return redirect()->route('comments.index')->with('success', 'Comment updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Comment $comment)
    {
        $comment->delete();
        return redirect()->route('comments.index')->with('success', 'Comment deleted successfully.');
    }
}
