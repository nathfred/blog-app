<?php

namespace App\Http\Controllers;

use App\Models\Post_Comment;
use App\Http\Requests\StorePost_CommentRequest;
use App\Http\Requests\UpdatePost_CommentRequest;

class PostCommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePost_CommentRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePost_CommentRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post_Comment  $post_Comment
     * @return \Illuminate\Http\Response
     */
    public function show(Post_Comment $post_Comment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post_Comment  $post_Comment
     * @return \Illuminate\Http\Response
     */
    public function edit(Post_Comment $post_Comment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePost_CommentRequest  $request
     * @param  \App\Models\Post_Comment  $post_Comment
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePost_CommentRequest $request, Post_Comment $post_Comment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post_Comment  $post_Comment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post_Comment $post_Comment)
    {
        //
    }
}
