<?php

namespace App\Http\Controllers;

use App\Models\comment;
use Dom\Comment as DomComment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $comments = comment::with(['user','post'])->latest()->get();
        return response() -> json($comments);
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
            'post_id' => 'required|integer|exists:posts,id',
        ]);

        $data['user_id'] = $request->user()->id;
        \App\Models\comment::create($data);

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(comment $comment) {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(comment $comment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, comment $comment)
    {
        $data = $request->validate([
            'content' => 'required|string',
        ]);

        $comment->update($data);
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(comment $comment)
    {
        //
    }
}
