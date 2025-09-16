<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Inertia\Inertia;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::latest()->get();
        return Inertia::render(
            'blog/blogList/BlogList',
            [
                'posts' => $posts
            ]
        );
    }


    public function author($id = null)
    {
        // if no id provided, show posts for the authenticated user
        $user = auth()->user();
        $id = $id ?? ($user?->id);

        $author = User::findOrFail($id);
        $posts = Post::where('user_id', $id)
            ->with(['user', 'comment'])
            ->latest()->get();

        return Inertia::render('Author', [
            'author' => $author,
            'posts' => $posts,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'content' => 'required|string',
            'title' => 'required|string',
            'status' => 'nullable|string',
        ]);

        $data['user_id'] = $request->user()->id;
        $data['status'] = $data['status'] ?? 'Pending';
        $data['publishedAt'] = $data['publishedAt'] ?? now();

        Post::create($data);

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {

        $post = Post::with('user', 'comment')->findOrFail($id);
        return Inertia::render('blog/BlogRead/PostRead', [
            'post' => $post,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {


    $data = $request->validate([
        'title' => 'required|string|max:255',
        'content' => 'required|string',
        'status' => 'nullable|string',
    ]);

    $post->update($data);

    return back();
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        $post->delete();
        return redirect()->back();
    }
}
